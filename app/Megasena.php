<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Megasena extends Model
{
	protected $table = 'megasenas';

	protected $fillable = [ 'id', 'numeroConcurso', 'resultado' ];

	public static function cadastra($form){
		$tabela = new Megasena;
		
		$tabela->numeroConcurso =			$form->numeroConcurso;
		$tabela->resultado =				$form->resultado;

		$tabela->save();

		return $tabela->id;
	}
	public static function atualiza($form){
		$tabela = Megasena::find($form->megasenaId);
		
		$tabela->numeroConcurso =			$form->numeroConcurso;
		$tabela->resultado =				$form->resultado;

		$tabela->save();
	}
	public static function storeOrUpdate($form){
		if($form->megasenaId == '') 
			return Megasena::cadastra($form);
		else {
			Megasena::atualiza($form); 
			return $form->megasenaId; 
		}
	}
}
