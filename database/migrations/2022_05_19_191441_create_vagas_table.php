<?php

use App\Models\Vaga;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->int('regime_contratual');
            $table->unsignedInteger('quantidade');
            $table->string('remuneracao');
            $table->string('modalidade');
            $table->text('descricao');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->unsignedInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedInteger('recrutador_id')->nullable();
            $table->foreign('recrutador_id')->references('id')->on('recrutadores');
            $table->boolean('ativa')->default(Vaga::STATUS_ATIVO);
            $table->boolean('encerrada')->default(Vaga::STATUS_INATIVO);
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
        Schema::dropIfExists('vagas');
    }
}
