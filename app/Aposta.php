<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aposta extends Model
{
	public static function store($form){
		$tabela = new Aposta;
		
		$tabela->usuarioId =			$form->usuarioId;
		$tabela->jogoId =				$form->jogoId; 
		$tabela->numero_concurso =		$form->numero_concurso;
		$tabela->acertos =				$form->acertos;

		$tabela->save();

		return $tabela->id;
	}
	public static function update($form){
		$tabela = Aposta::find($form->apostaId);
		
		$tabela->usuarioId =			$form->usuarioId;
		$tabela->jogoId =				$form->jogoId; 
		$tabela->numero_concurso =		$form->numero_concurso;
		$tabela->acertos =				$form->acertos;

		$tabela->save();
	}
	public static function storeOrUpdate($form){
		if($form->apostaId == '') 
			return Aposta::store($form);
		else {
			Aposta::update($form); 
			return $form->apostaId; 
		}
	}
}