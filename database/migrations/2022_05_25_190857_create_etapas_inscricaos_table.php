<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapas_inscricoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inscricao_id');
            $table->foreign('inscricao_id')->references('id')->on('inscricoes')->onDelete('cascade');
            $table->unsignedInteger('etapa_id');
            $table->foreign('etapa_id')->references('id')->on('etapas_processos')->onDelete('cascade');
            $table->boolean('concluida')->default(0);
            $table->boolean('aprovada')->default(0);
            $table->boolean('reprovada')->default(0);
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
        Schema::dropIfExists('etapas_inscricoes');
    }
}
