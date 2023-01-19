<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('site')->nullable();
            $table->foreignId('endereco_id')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('missao')->nullable();
            $table->string('visao')->nullable();
            $table->string('valores')->nullable();
            $table->string('objetivos')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('instituicoes');
    }
}
