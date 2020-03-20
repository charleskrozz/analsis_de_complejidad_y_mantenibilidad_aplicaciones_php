<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_app');
            $table->longText('descripcion_app');
            $table->string('lenguaje_app');
            $table->timestamps();
        });
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('path');
            $table->string('extension');
            $table->string('analisis');
            $table->string('folder');
            $table->string('version');
            $table->integer('estado');
            $table->integer('aplicacion_id')->unsigned();
            $table->foreign('aplicacion_id')->references('id')->on('aplicacion');
            $table->timestamps();
        });
        Schema::create('mantenibilidad', function(Blueprint $table){
            $table->bigIncrements('id');      
            $table->float('imOriginal');
            $table->float('imSei');
            $table->float('imMicrosoft');
            $table->integer('proyectos_id')->unsigned();
            $table->foreign('proyectos_id')->references('id')->on('proyectos');
            $table->timestamps();
        });
        Schema::create('indice',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->float('wmc');
            $table->float('ccn');
            $table->float('bugs');
           // $table->float('kanDefect');
           // $table->float('relativeSystemComplexity');
           // $table->float('relativeDataComplexity');
           // $table->float('relativeStructuralComplexity');
            $table->float('volume');
            $table->float('commentWeight');
           // $table->float('intelligentContent');
            $table->float('lcom');
            $table->float('instability');
            $table->float('afferentCoupling');
            $table->float('efferentCoupling');
            $table->float('difficulty');
            $table->float('mi');
            //$table->float('distance');
           // $table->float('incomingCDep');
            //$table->float('incomingPDep');
            //$table->float('outgoingCDep');
            //$table->float('outgoingPDep');
            $table->float('classesPerPackage');
            $table->float('loc');
            $table->float('cloc');
            $table->float('lloc');
            $table->float('nbMethods');
            $table->float('nbClasses');
            //$table->float('nbInterfaces');
            $table->float('nbPackages');
            $table->integer('proyectos_id')->unsigned();
            $table->foreign('proyectos_id')->references('id')->on('proyectos');
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
        Schema::dropIfExists('indice');
        Schema::dropIfExists('proyectos');
        Schema::dropIfExists('aplicacion');
        
    }
}
