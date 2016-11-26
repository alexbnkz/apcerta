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
			$table->int('usuarioId'); 
			$table->int('jogoId'); 
			$table->string('numero_concurso'); 
			$table->int('acertos'); 
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
