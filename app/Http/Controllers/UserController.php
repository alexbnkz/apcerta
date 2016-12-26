<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware(['auth']);
	}

	public function index()
	{
		return view('usuario.list');
	}

	public function create()
	{
		return view('usuario.record');
	}

	public function save(Request $request)
	{
		# store/uptade
		User::storeOrUpdate($request);
		return view('usuario.list');
	}

	public function find($id)
	{
		# show/edit
		return view('usuario.record')->with([ 'usuario' => User::find($id) ]);
	}

	public function json(Request $request)
	{
		$pesquisa = new User;

		$records = $pesquisa->count();

		$pesquisa = $pesquisa->orderBy('privilegio', 'asc')->orderBy($request->sidx, $request->sord);
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
