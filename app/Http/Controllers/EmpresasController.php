<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresas;

class EmpresasController extends Controller
{
    //
    public function index()
    {

      $empresas = Empresas::orderBy('id', 'desc')->paginate(5);

      return view('empresas.home')->with(['empresas' => $empresas]);

    }

    public function create()
    {

      return view('empresas.create');

    }

    public function store(Request $request)
    {

      $this->validate($request, [
    	  'nombre' => 'required',
          'nit' => 'required|unique:empresas|max:255'

        ]);


      	  $empresa = new Empresas;

    	  $empresa->nombre = $request->get('nombre'); 

    	  $empresa->nit = $request->get('nit');

    	  $empresa->save(); 

	      session()->flash('message', 'Empresa Creada!'); //Mensajes temporales

	      return redirect()->route('create_empresa');

    }

    public function edit($id)
    {
        //
        $empresa = Empresas::find($id);

        return view('empresas.editar',  ['empresa' => $empresa]);
    }

    public function update(Request $request, $id)
    {

    	$this->validate($request, [
            'nombre' => 'required',
            'nit' => 'required'
        ]);

        $empresa = Empresas::find($id);

        $empresa->nombre = $request->nombre;
        $empresa->nit = $request->nit;

        if ($empresa->save()) {
        
            return back()->with('actualizado', 'Los datos han sido actualizados!!'); 

        }else{

           return back()->with('errormsj', 'Error De Datos'); 

        } 

    }

    public function delete($id)
    {
        //
        Empresas::destroy($id);
        return back()->with('eliminado', 'El registro ha sido eliminado!!'); 
    }

}
