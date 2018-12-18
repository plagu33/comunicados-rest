<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finanza', function (Blueprint $table) {
            $table->increments('id')->comment("id autoincrementable");
            $table->integer('id_usuario')->comment("id identificador del usuario del sistema umas");
            $table->integer('ano')->comment("año del cuál es la deuda");
            $table->integer('cuota')->comment("Número de cuota");
            $table->integer('monto')->comment("monto a pagar");
            $table->integer('saldo')->comment("saldo restante a pagar");
            $table->date('fecha_vencimiento')->comment("fecha de vencimiento de la cuota");
            $table->string('estado',10)->nullable()->comment("Estado de la cuota, si esta se encuentra pagada o no");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finanza');
    }
}
