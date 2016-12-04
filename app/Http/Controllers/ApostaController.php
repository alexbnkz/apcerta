<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aposta;

class ApostaController extends Controller
{
	public function __construct(){
		//$this->middleware(['auth', 'acesso']);
	}

	public function index()
	{
		return "hubi";
		/*$parcelas = null;
		$pagamento = Pagamento::where('projetoId', $id)->get();
		if($pagamento->count() > 0) {
			$parcelas = Parcela::where('pagamentoId', $pagamento[0]->id)->orderBy('id', 'desc')->get();
			if($pagamento->count() <= 0) $parcelas = null;
		}
		else {
			$pagamento = null;
		}
		return view('parcelaLista')->with(['pagamentos' => $pagamento, 'parcelas' => $parcelas]);*/
	}

  /*public function atualizaProjetoDataPagamento($dilig){
	$projeto = Projeto::find($dilig->projetoId);
		$projeto->dt_pagamento = $dilig->dt_pagamento; 
		$projeto->save();
	}*/

	public function store(Request $request)
	{
		$request->valor_pagamento = str_replace(',', '.', str_replace('.', '',   $request->valor_pagamento)); 
		if($request->tipo_pagamento != 'PARCELADO') $request->numero_parcelas = 1;
		$pagamentoId = Pagamento::cadastrarPagamento($request);
	//$this->atualizaProjetoDataPagamento(Pagamento::where('projetoId', $request->projetoId)->orderBy('dt_pagamento', 'desc')->get()[0]);

		Parcela::where('pagamentoId', '=', $pagamentoId)->delete();
		for ($i=0; $i < $request->numero_parcelas; $i++) { 
			Parcela::cadastrarParcela($request);
		}

		$parcelas = null;
		$pagamento = Pagamento::where('projetoId', $request->projetoId)->get();
		if($pagamento->count() > 0) {
			$parcelas = Parcela::where('pagamentoId', $pagamento[0]->id)->orderBy('id', 'desc')->get();
			if($pagamento->count() <= 0) $parcelas = null;
		}
		else {
			$pagamento = null;
		}
		return view('parcelaLista')->with(['pagamentos' => $pagamento, 'parcelas' => $parcelas]);
	}

	public function update(Request $request)
	{
		$request->valor_pagamento = str_replace(',', '.', str_replace('.', '',   $request->valor_pagamento));
		if($request->tipo_pagamento != 'PARCELADO') $request->numero_parcelas = 1;
		Pagamento::alterarPagamento($request);

		Parcela::where('pagamentoId', '=', $request->pagamentoId)->delete();
		for ($i=0; $i < $request->numero_parcelas; $i++) { 
			Parcela::cadastrarParcela($request);
		}

	//$this->atualizaProjetoDataPagamento(Pagamento::where('projetoId', $request->projetoId)->orderBy('dt_pagamento', 'desc')->get()[0]);

		$parcelas = null;
		$pagamento = Pagamento::where('projetoId', $request->projetoId)->get();
		if($pagamento->count() > 0) {
			$parcelas = Parcela::where('pagamentoId', $pagamento[0]->id)->orderBy('id', 'desc')->get();
			if($pagamento->count() <= 0) $parcelas = null;
		}
		else {
			$pagamento = null;
		}
		return view('parcelaLista')->with(['pagamentos' => $pagamento, 'parcelas' => $parcelas]);
	}

	public function json(Request $request, $id)
	{
		$pesquisa = Parcela::where('pagamentoId', '=', $id);

		$records = $pesquisa->count();

		$pesquisa = $pesquisa->orderBy($request->sidx, $request->sord);
		$pesquisa = $pesquisa->skip(($request->page * $request->rows) - $request->rows)->take($request->rows);

		$total = round($records / $request->rows);

		if($records - ($total * $request->rows) >= 1){
			$total = $total + 1;
		}

		return '{ ' .
		'"page" : ' . $request->page . ', ' .
		'"total" : ' . $total . ', ' .
		'"records" : ' . $records . ', ' .
		'"rows" : ' . $pesquisa->get() . '}';
	}

	public function parcela(Request $request)
	{
		$request['idParcela'] = $request->id;
		$request->valor_parcela = str_replace('.', '',   $request->valor_parcela);
		$request->dt_parcela = $request->dt_parcela;
		Parcela::alterarParcela($request);

	//$this->atualizaProjetoDataPagamento(Pagamento::where('projetoId'
		return redirect('projetos/' . $request->projetoId . 'pagamentos');
	}
}