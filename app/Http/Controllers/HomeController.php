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

	public function index()
	{
		$args = [
			'megasena' => Megasena::orderBy('numeroConcurso', 'desc')->take(20)->get()
		];
		return view('home')->with($args);
	}
}
