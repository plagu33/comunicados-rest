<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('usuarios', function (Blueprint $table) {
            $table->integer('id_usuario')->nullable();
            $table->integer('id_persona')->nullable();
            $table->string('us_consuser',20)->nullable();
            $table->string('us_password',8000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('usuarios');
    }
}
