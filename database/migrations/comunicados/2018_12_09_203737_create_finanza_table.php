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
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('ano');
            $table->integer('cuota');
            $table->integer('monto');
            $table->integer('saldo');
            $table->date('fecha_vencimiento');
            $table->string('estado',10)->nullable();
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
