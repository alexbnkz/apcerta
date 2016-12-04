<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApostasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apostas', function (Blueprint $table) {
			$table->increments('id'); 
			$table->integer('usuarioId'); 
			$table->integer('jogoId'); 
			$table->string('numero_concurso'); 
			$table->integer('acertos'); 
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
		Schema::dropIfExists('apostas');
	}
}
