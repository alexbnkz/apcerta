<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Megasena extends Model
{
	public static function store($form){
		$tabela = new Megasena;
		
		$tabela->numeroConcurso =			$form->numeroConcurso;
		$tabela->resultado =				$form->resultado;

		$tabela->save();

		return $tabela->id;
	}
	public static function update($form){
		$tabela = Megasena::find($form->megasenaId);
		
		$tabela->numeroConcurso =			$form->numeroConcurso;
		$tabela->resultado =				$form->resultado;

		$tabela->save();
	}
	public static function storeOrUpdate($form){
		if($form->megasenaId == '') 
			return Megasena::store($form);
		else {
			Megasena::update($form); 
			return $form->megasenaId; 
		}
	}
}
