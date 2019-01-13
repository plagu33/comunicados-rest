<?php

namespace App\Http\Controllers;

use App\Finanza;
use App\MtAlumno;
use App\MtCtaDoc;
use App\Nota;
use App\Persona;
use App\RaActevalNotadet;
use App\RaActEvalSecciondet;
use App\Ramo;
use App\RaNota;
use App\NotaTemp;
use App\NotaTemp1;
use App\NotaTemp2;
use App\Usuario;
use App\UsuarioPerfiles;
use App\UsuarioFirebase;
use Carbon\Carbon;
use DB;
use App\Documento;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobsController extends Controller
{

    public function GenerateUsers(Persona $p) 
    {

        $personas = $p::with('user');

        Usuario::truncate();

        foreach ($personas->get() as $persona) {

            $perfil = UsuarioPerfiles::where('id_usuario',$persona->user->id_usuario)->first();

            $usuario = New Usuario();
            $usuario->nombre = $persona->pe_nombres;
            $usuario->apellido = $persona->pe_appaterno;
            $usuario->rut = $persona->pe_rut;
            $usuario->id_usuario = $persona->user->id_usuario;
            $usuario->id_persona = $persona->id_persona;
            $usuario->id_perfil = ( @$perfil->id_perfil ) ? $perfil->id_perfil : 0;
            $usuario->usuario = $persona->user->us_consuser;
            $usuario->contrasena = $persona->user->us_password;
            $usuario->save();

        }

        echo now();

    }

    public function GenerateFinanzas() 
    {

        /*
            $new_date = Carbon::createFromFormat("Y-m-d","2018-09-30");
            echo $new_date->format("m");
        */

        $finanzas = MtCtaDoc::select("usuario","ano","cuota","monto","saldo","fecven","estado")->where("estado",2)->get();

        Finanza::truncate();

        foreach ($finanzas as $f) {
            $finanza = new Finanza();
            $finanza->id_usuario = $f->usuario;
            $finanza->ano = $f->ano;
            $finanza->cuota = $f->cuota;
            $finanza->monto = $f->monto;
            $finanza->saldo = $f->saldo;
            $finanza->fecha_vencimiento = $f->fecven;
            $finanza->estado = $f->estado;
            $finanza->save();
        }

        echo now();

    }

    public function GenerateNotas()
    {

        #para que se ejecute, deben haber menos notas en la tabla nota, que las que vienen 
        #del sistema umas

        $this->createTableNotasTemp();

        $alumnos = MtAlumno::select("CODCLI","USUARIO","CODCARPR")->where("ESTACAD","VIGENTE")->get();

        foreach ($alumnos as $alumno)
        {

            $notas = RaNota::select("*")->where("CODCLI",$alumno->CODCLI)->where("CODCARR",$alumno->CODCARPR)->get();

            foreach ($notas as $nota)
            {

                $ramo = Ramo::where("CODRAMO",$nota->RAMOEQUIV)->first();

                $lineas = RaActevalNotadet::where("CodCLi",$nota->CODCLI)->where("CodRamo",$nota->RAMOEQUIV)->get();

                foreach ($lineas as $linea)
                {

                    $ll = RaActEvalSecciondet::where("Codcarr",$linea->Codcarr)
                        ->where("CodRamo",$linea->CodRamo)
                        ->where("CodSecc",$linea->CodSecc)
                        ->where("actividad",$linea->actividad)
                        ->where("Linea",$linea->Linea)->get();

                    foreach ($ll as $l)
                    {

                        $ranota = new NotaTemp();                       
                        $ranota->usuario_id = $alumno->USUARIO;
                        $ranota->nombre_ramo = $ramo->NOMBRE;
                        $ranota->codigo_ramo = $l->CodRamo;
                        $ranota->codigo_carrera = $l->Codcarr;
                        $ranota->tipo_nota = $l->actividad;
                        $ranota->porcentaje = $l->Porcentaje;
                        $ranota->nota = $linea->Nota;
                        $ranota->save();
                        
                        $ranota2 = json_decode($ranota->replicate(),true);
                        NotaTemp2::create($ranota2);
                    }

                }

            }

        }

        Schema::dropIfExists('notaTemp1');
        Schema::rename("nota","notaTemp1"); //respaldo original
        Schema::rename("notaTemp","nota"); //tabla actualizada

        // todo queda en tempNota1 y tempNota2    
        $this->checkNuevasNotas();     

        echo now();

    }

    public function checkNuevasNotas()
    {

        $notasIDS = NotaTemp1::select("usuario_id","codigo_ramo","nombre_ramo")->groupBy("usuario_id")->get();

        foreach( $notasIDS as $n )
        {

            $id_usuario = $n["usuario_id"];
            $codigo_ramo = $n["codigo_ramo"];
            $nombre_ramo = $n["nombre_ramo"];

            $notasOriginal = NotaTemp1::where("usuario_id",$id_usuario)
                                        ->where("codigo_ramo",$codigo_ramo)->count();
            $notasNueva = NotaTemp2::where("usuario_id",$id_usuario)
                                     ->where("codigo_ramo",$codigo_ramo)->count();
            
            if ($notasOriginal<$notasNueva) 
            {

                $user = UsuarioFirebase::where("usuario_id",$id_usuario)->first();
                $token = $user["token"];

                FcmNotification("Nueva calificación",$nombre_ramo,$token,"cl.mmerino.comunicados.notas");                

            }

        }

    }

    public function createTableNotasTemp()
    {

        Schema::dropIfExists('notaTemp');
        Schema::create('notaTemp', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('usuario_id',150)->comment("código de usuario");
            $table->string('nombre_ramo',150)->comment("nombre de ramo");
            $table->string('codigo_ramo',150)->comment("código de ramo");
            $table->string('codigo_carrera',150)->comment("código de carrera");
            $table->string('tipo_nota',50)->comment("tipo de nota, si es ejercicio o solemne1, solemne2, solemne3");
            $table->string('porcentaje',50)->comment("porcentaje que vale la nota");
            $table->double('nota',7,1)->comment("nota");
        });   
        
        Schema::dropIfExists('notaTemp2');
        Schema::create('notaTemp2', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('usuario_id',150)->comment("código de usuario");
            $table->string('nombre_ramo',150)->comment("nombre de ramo");
            $table->string('codigo_ramo',150)->comment("código de ramo");
            $table->string('codigo_carrera',150)->comment("código de carrera");
            $table->string('tipo_nota',50)->comment("tipo de nota, si es ejercicio o solemne1, solemne2, solemne3");
            $table->string('porcentaje',50)->comment("porcentaje que vale la nota");
            $table->double('nota',7,1)->comment("nota");
        });          

    }

    public function generateDocumentos ()
    {

        $sql_users = "SELECT
            c.id AS courseid, 
            c.fullname, 
            u.username, 
            u.firstname, 
            u.lastname, 
            u.email
                                            
            FROM mdl_role_assignments ra 

            JOIN mdl_user u ON u.id = ra.userid
            JOIN mdl_role r ON r.id = ra.roleid
            JOIN mdl_context cxt ON cxt.id = ra.contextid
            JOIN mdl_course c ON c.id = cxt.instanceid
            
            WHERE ra.userid = u.id
                                            
            AND ra.contextid = cxt.id
            AND cxt.contextlevel = 50
            AND cxt.instanceid = c.id";

        $users = DB::connection('aula')->select($sql_users);

        foreach( $users as $user )
        {

            $username = str_replace("-","",$user->username);
            $curso_id = $user->courseid;
            $nombre_curso = $user->fullname;
            //echo $user->firstname."<br>";
            //echo $user->lastname."<br>";

            $sql_files = "SELECT cm.id, cm.course, cm.module, mdl.name AS type,
                    CASE
                        WHEN mf.name IS NOT NULL THEN mf.name
                        WHEN mb.name IS NOT NULL THEN mb.name
                        WHEN mr.name IS NOT NULL THEN mr.name
                        WHEN mu.name IS NOT NULL THEN mu.name
                        WHEN mq.name IS NOT NULL THEN mq.name
                        WHEN mp.name IS NOT NULL THEN mp.name
                        WHEN ml.name IS NOT NULL THEN ml.name
                        ELSE NULL
                    END AS activityname,
                    CASE
                        WHEN mf.name IS NOT NULL THEN CONCAT('/mod/forum/view.php?id=', cm.id)
                        WHEN mb.name IS NOT NULL THEN CONCAT('/mod/book/view.php?id=', cm.id)
                        WHEN mr.name IS NOT NULL THEN CONCAT('/mod/resource/view.php?id=', cm.id)
                        WHEN mu.name IS NOT NULL THEN CONCAT('/mod/url/view.php?id=', cm.id)
                        WHEN mq.name IS NOT NULL THEN CONCAT('/mod/quiz/view.php?id=', cm.id)
                        WHEN mp.name IS NOT NULL THEN CONCAT('/mod/page/view.php?id=', cm.id)
                        WHEN ml.name IS NOT NULL THEN CONCAT('/mod/lesson/view.php?id=', cm.id)
                        ELSE NULL
                    END AS linkurl, f.id AS fileid, f.filepath, f.filename, CONCAT('/filedir/', SUBSTRING(f.contenthash, 1, 2), '/', SUBSTRING(f.contenthash, 3, 2), '/', f.contenthash) AS filesystempath, f.userid AS fileuserid, f.filesize, f.mimetype, f.author AS fileauthor, f.timecreated, f.timemodified
                    FROM mdl_course_modules AS cm
                    INNER JOIN mdl_context AS ctx ON ctx.contextlevel = 70 AND ctx.instanceid = cm.id
                    INNER JOIN mdl_modules AS mdl ON cm.module = mdl.id
                    LEFT JOIN mdl_forum AS mf ON mdl.name = 'forum' AND cm.instance = mf.id
                    LEFT JOIN mdl_book AS mb ON mdl.name = 'book' AND cm.instance = mb.id
                    LEFT JOIN mdl_resource AS mr ON mdl.name = 'resource' AND cm.instance = mr.id
                    LEFT JOIN mdl_url AS mu ON mdl.name = 'url' AND cm.instance = mu.id
                    LEFT JOIN mdl_quiz AS mq ON mdl.name = 'quiz' AND cm.instance = mq.id
                    LEFT JOIN mdl_page AS mp ON mdl.name = 'page' AND cm.instance = mp.id
                    LEFT JOIN mdl_lesson AS ml ON mdl.name = 'lesson' AND cm.instance = ml.id
                    LEFT JOIN mdl_files AS f ON f.contextid = ctx.id
                    WHERE cm.course = $user->courseid
                    AND mdl.name = 'resource'";

            $files = DB::connection('aula')->select($sql_files);    
            
            foreach($files as $file)
            {

                if ($file->filename!=".") 
                {
                    
                    $nombre_actividad = $file->activityname;
                    //echo $file->linkurl."<br>";
                    //echo $file->fileid."<br>";
                    //echo $file->filepath."<br>";
                    $nombre_archivo = $file->filename;
                    $path = $file->filesystempath;
                    //echo $file->fileuserid."<br>";
                    $tipo = $file->mimetype;

                    $documento = new Documento();
                    $documento->username = $username;
                    $documento->curso_id = $curso_id;
                    $documento->nombre_curso = $nombre_curso;
                    $documento->nombre_actividad = $nombre_actividad;
                    $documento->nombre_archivo = $nombre_archivo;
                    $documento->path = $path;
                    $documento->tipo = $tipo;
                    $documento->save();

                }

                echo "-----end file------<br>";

            }

            echo "-----end course------<br>";

        }

    }

}
