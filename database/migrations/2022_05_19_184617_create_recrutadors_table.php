<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecrutadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recrutadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('password')->nullable();
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->boolean('ativo')->default(0);
            $table->boolean('confirmado')->default(0);
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
        Schema::dropIfExists('recrutadores');
    }
}
