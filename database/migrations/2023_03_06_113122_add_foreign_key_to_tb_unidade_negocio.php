<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToTbUnidadeNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_unidade_negocio', function(Blueprint $table)
		{
			$table->foreign('nome_plano', 'tb_unidade_negocio_ibfk_2')->references('nome')->on('tb_planos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_usuario_unidade_negocio', function(Blueprint $table)
		{
			$table->dropForeign('tb_unidade_negocio_ibfk_2');
		});
    }
}
