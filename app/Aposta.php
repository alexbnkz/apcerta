<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aposta extends Model
{
	public static function store($dados){
		$obj = new Aposta;
		
		$obj->usuarioId =			$dados->usuarioId;
		$obj->jogoId =				$dados->jogoId; 
		$obj->numero_concurso =		$dados->numero_concurso;
		$obj->acertos =				$dados->acertos;

		$obj->save();

		return $obj->id;
	}
	public static function update($dados){
		$obj = Aposta::find($dados->apostaId);
		
		$obj->usuarioId =			$dados->usuarioId;
		$obj->jogoId =				$dados->jogoId; 
		$obj->numero_concurso =		$dados->numero_concurso;
		$obj->acertos =				$dados->acertos;

		$obj->save();
	}
	public static function storeOrUpdate($dados){
		if($dados->apostaId == '') 
			return Aposta::store($dados);
		else {
			Aposta::update($dados); 
			return $dados->apostaId; 
		}
	}
}