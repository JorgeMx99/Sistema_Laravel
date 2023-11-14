<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('folio');
            $table->date('fecha_recepcion');
            $table->time('hora_recepcion');
            $table->bigInteger('idtipodocumento')->unsigned();
            $table->string('num_documento');
            $table->string('dependencia');
            $table->string('signado');
            $table->string('cargo');
            $table->string('asunto');
            $table->bigInteger('iddirigido')->unsigned();
            $table->bigInteger('anexo_id')->unsigned();
            $table->string('seguimiento');
            $table->string('resguardo');
            $table->string('hipervinculo');
            $table->string('nombre_expediente');
            $table->string('seccion');
            $table->string('ubicacion_fisica');
            $table->string('observaciones');
            $table->foreign('idtipodocumento')->references('id')->on('documentos');
            $table->foreign('iddirigido')->references('id')->on('dirigidos');
            $table->foreign('anexo_id')->references('id')->on('anexos');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
};
