<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Megasena;

class MegasenaController extends Controller
{
	public function __construct(){
		$this->middleware(['auth']);
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
		Megasena::storeOrUpdate($request);
		return view('megasena.list');
	}

	public function find($id)
	{
		# show/edit
		return view('megasena.record');
	}

	public function json(Request $request)
	{
		$pesquisa = new Megasena;

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

	public function resultado()
	{

		$res = json_decode(file_get_contents('http://wsloterias.azurewebsites.net/api/sorteio/getresultado/1'), true);
		$numeroConcurso = intval($res['NumeroConcurso']);

		/*for ($i = $numeroConcurso - 19; $i <= $numeroConcurso; $i++) {
			$json = json_decode(file_get_contents('http://wsloterias.azurewebsites.net/api/sorteio/getresultado/1/'.$i), true);

			$resultado = str_pad($json['Sorteios'][0]['Numeros'][0],  2, "00",STR_PAD_LEFT).'-'
				.str_pad($json['Sorteios'][0]['Numeros'][1],  2, "00",STR_PAD_LEFT).'-'
				.str_pad($json['Sorteios'][0]['Numeros'][2],  2, "00",STR_PAD_LEFT).'-'
				.str_pad($json['Sorteios'][0]['Numeros'][3],  2, "00",STR_PAD_LEFT).'-'
				.str_pad($json['Sorteios'][0]['Numeros'][4],  2, "00",STR_PAD_LEFT).'-'
				.str_pad($json['Sorteios'][0]['Numeros'][5],  2, "00",STR_PAD_LEFT);
		}*/

		$mega = new Megasena;

		$mega['numeroConcurso'] = $numeroConcurso;
		$mega['resultado'] = $resultado;
		$mega['id'] = '';

		dd($mega);

		Megasena::storeOrUpdate($mega);

		return 'funfou';
	}
}
