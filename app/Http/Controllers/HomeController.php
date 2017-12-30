<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Megasena;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public function index(Request $request)
	{
		if (isset($request['buscar'])) {
			$args['megasena'] = Megasena::whereIn('numeroConcurso', explode(',', $request['buscar']))->orderBy('numeroConcurso', 'desc')->take(20)->get();
		}
		else {
			$args['megasena'] = Megasena::orderBy('numeroConcurso', 'desc')->take(20)->get();
		}
		return view('home')->with($args);
	}
}
