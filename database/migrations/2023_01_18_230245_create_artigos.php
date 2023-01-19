<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->foreignId('revista_id')->nullable();
            $table->string('ano')->nullable();
            $table->string('volume')->nullable();
            $table->string('doi')->nullable();
            $table->string('arquivo')->nullable();
            $table->string('link_externo')->nullable();
            $table->string('palavra_chave')->nullable();
            $table->string('numero')->nullable();
            $table->text('resumo_portugues')->nullable();
            $table->text('resumo_espanhol')->nullable();
            $table->text('resumo_ingles')->nullable();
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
        Schema::dropIfExists('artigos');
    }
}
