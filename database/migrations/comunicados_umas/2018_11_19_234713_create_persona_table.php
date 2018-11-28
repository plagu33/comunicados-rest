<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('persona', function (Blueprint $table) {
            $table->integer('id_persona')->nullable();
            $table->string('pe_nombrecompleto',500)->nullable();
            $table->string('pe_nombres',70)->nullable();
            $table->string('pe_appaterno',25)->nullable();
            $table->string('pe_apmaterno',20)->nullable();
            $table->string('pe_rut',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('persona');
    }
}
