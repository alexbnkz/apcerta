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
		$obj = Pagamento::find($dados->pagamentoId);
		
		$obj->usuarioId =			$dados->usuarioId;
		$obj->jogoId =				$dados->jogoId; 
		$obj->numero_concurso =		$dados->numero_concurso;
		$obj->acertos =				$dados->acertos;

		$obj->save();
	}
	public static function storeOrUpdate($dados){
		if($dados->apostaId == '') 
			return Pagamento::store($dados);
		else {
			Pagamento::update($dados); 
			return $dados->apostaId; 
		}
	}
}