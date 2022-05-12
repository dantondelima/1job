<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj')->unique();
            $table->string('razao_social');
            $table->string('nome_fantasia');
            // $table->string('inscricao_estadual');
            $table->string('email')->unique();
            $table->string('password');
            // $table->unsignedInteger('endereco_id');
            // $table->foreign('endereco_id')->references('id')->on('enderecos');
            // $table->string('telefone');
            // $table->string('nome_responsavel');
            // $table->string('email_responsavel');
            // $table->string('celular');
            $table->boolean('ativo')->default(1);
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
        Schema::dropIfExists('empresas');
    }
}
