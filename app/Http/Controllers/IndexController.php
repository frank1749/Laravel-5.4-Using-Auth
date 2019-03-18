<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Estudiantes;

class IndexController extends Controller
{
    //
    public function index()
    {

      //$estudiantes = Estudiantes::orderBy('id', 'desc')->paginate(5);

      //return view('welcome')->with(['estudiantes' => $estudiantes]);
      return view('welcome');

    }
    

}
