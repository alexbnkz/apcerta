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
		return view('aposta.list');
	}

	public function create()
	{
		return view('aposta.record');
	}

	public function save(Request $request)
	{
		# store/uptade
		return view('aposta.list');
	}

	public function find($id)
	{
		# show/edit
		return view('aposta.record');
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
}