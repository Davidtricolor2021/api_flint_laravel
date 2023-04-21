<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmToTbUnidadeNegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_unidade_negocio', function (Blueprint $table) {
            $table->string('nome_plano',45)->default('DEV');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_unidade_negocio', function (Blueprint $table) {
            $table->dropColumn('nome_plano');
        });
    }
}
