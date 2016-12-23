<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Megasena;

class MegasenaController extends Controller
{
	public function __construct(){
		//$this->middleware(['auth', 'acesso']);
	}

	public function index()
	{
		return view('megasena.list');
	}

	public function create()
	{
		return view('megasena.record');
	}

	public function save(Request $request)
	{
		# store/uptade
		return view('megasena.list');
	}

	public function find($id)
	{
		# show/edit
		return view('megasena.record');
	}

	public function json(Request $request, $id)
	{
		$pesquisa = Megasena::where('megasenaId', '=', $id);

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
