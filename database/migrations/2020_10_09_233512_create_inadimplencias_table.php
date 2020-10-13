<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInadimplenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inadimplencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loja_id')->constrained('lojas');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('user_id')->constrained('users');
            $table->string('num_doc')->nullable();
            $table->string('cod_venda')->nullable();
            $table->date('dt_compra')->nullable();
            $table->date('dt_vencimento')->nullable();
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('inadimplencias');
    }
}
