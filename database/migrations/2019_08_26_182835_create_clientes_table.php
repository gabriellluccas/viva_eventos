<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('cpf')->primary()->unique();
            $table->string('nome');
            $table->integer('cod_endereco')->foreign()->references('codigo')->on('enderecos')->onDelete('Cascade')->nullable();
            $table->integer('cod_telefone')->foreign()->references('codigo')->on('telefones')->onDelete('Cascade')->nullable();
            $table->enum('status', ['ativo', 'excluído', 'inativo'])->default('ativo');
            $table->date('data_nascimento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
