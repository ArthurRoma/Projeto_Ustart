<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocadoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locadora', function (Blueprint $table) {
            //colunas:
            $table->id();
            $table->string('filme');
            $table->string('genero');
            $table->string('descricao');
            $table->date('data_de_lancamento');
            
            $table->unsignedBigInteger('usuario');
            $table->foreign('usuario')
                ->references('id')
                    ->on('users');

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
        Schema::dropIfExists('locadora');
    }
}
