<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cargos;

class CargosController extends Controller
{
    //
    public function index()
    {

      $cargos = Cargos::orderBy('id', 'desc')->paginate(5);

      return view('cargos.home')->with(['cargos' => $cargos]);

    }

    public function create()
    {

      return view('cargos.create');

    }

    public function store(Request $request)
    {

      $this->validate($request, [
    	  'nombre' => 'required'
        ]);

      	  $cargo = new Cargos;

    	  $cargo->nombre = $request->get('nombre'); 

    	  $cargo->save(); 

	      session()->flash('message', 'Empresa Creada!'); //Mensajes temporales

	      return redirect()->route('create_cargo');

    }

    public function edit($id)
    {
        //
        $cargo = Cargos::find($id);

        return view('cargos.editar',  ['cargo' => $cargo]);
    }

    public function update(Request $request, $id)
    {

    	$this->validate($request, [
            'nombre' => 'required'
        ]);

        $cargo = Cargos::find($id);

        $cargo->nombre = $request->nombre;

        if ($cargo->save()) {
        
            return back()->with('actualizado', 'Los datos han sido actualizados!!'); 

        }else{

           return back()->with('errormsj', 'Error De Datos'); 

        } 

    }

    public function delete($id)
    {
        //
        Cargos::destroy($id);
        return back()->with('eliminado', 'El registro ha sido eliminado!!'); 
    }

}
