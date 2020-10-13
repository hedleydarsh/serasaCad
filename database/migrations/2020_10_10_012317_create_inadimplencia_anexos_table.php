<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInadimplenciaAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inadimplencia_anexos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inadimplencia_id')->constrained('inadimplencias');
            $table->string('anexo')->nullable();
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
        Schema::dropIfExists('inadimplencia_anexos');
    }
}
