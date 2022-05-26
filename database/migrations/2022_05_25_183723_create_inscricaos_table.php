<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vaga_id');
            $table->foreign('vaga_id')->references('id')->on('vagas')->onDelete('cascade');
            $table->unsignedInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->boolean('ativa')->default(1);
            $table->boolean('cancelada')->default(0);
            $table->boolean('aprovada')->default(0);
            $table->boolean('reprovada')->default(0);
            $table->boolean('encerrada')->default(0);
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
        Schema::dropIfExists('inscricoes');
    }
}
