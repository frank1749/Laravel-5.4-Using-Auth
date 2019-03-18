<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empleados;
use App\Cargos;
use App\Empresas;

use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    //
     public function index()
    {

      $empleados = Empleados::orderBy('id', 'desc')->paginate(5);

      //$electivas = DB::table('electivas')->where('numero_cupos', '>', 0)->paginate(5);

      return view('empleados.home')->with(['empleados' => $empleados]);

    }

    public function create()
    {

      $cargos = Cargos::all();
      $empresas = Empresas::all();

      return view('empleados.create', ['cargos' => $cargos, 'empresas' => $empresas]);

    }

    public function store(Request $request)
    {

      $this->validate($request, [
        'nombre' => 'required',
        'cedula' => 'required',
        'id_cargo' => 'required',
        'id_empresa' => 'required'
        ]);

        $empleados = new Empleados;

        $empleados->fullname = $request->get('nombre'); 

        $empleados->cedula = $request->get('cedula'); 

        $empleados->id_cargo = $request->get('id_cargo'); 

        $empleados->id_empresa = $request->get('id_empresa'); 

        $empleados->save(); 

        session()->flash('message', 'Empleado Creado!'); //Mensajes temporales

        return redirect()->route('create_empleado');

    }

    public function edit($id)
    {
        //
        $empleado = Empleados::find($id);

        $cargos = Cargos::all(); 

        $empresas = empresas::all();        

        return view('empleados.editar',  ['empleado' => $empleado, 'cargos' => $cargos, 'empresas' => $empresas]);
    }

    public function update(Request $request, $id)
    {

      $this->validate($request, [
            'nombre' => 'required',
            'cedula' => 'required',
            'id_cargo' => 'required',
            'id_empresa' => 'required'
        ]);

        $empleados = Empleados::find($id);

        $empleados->fullname = $request->nombre;
        $empleados->cedula = $request->cedula;
        $empleados->id_cargo = $request->id_cargo;
        $empleados->id_empresa = $request->id_empresa;

        if ($empleados->save()) {
        
            return back()->with('actualizado', 'Los datos han sido actualizados!!'); 

        }else{

           return back()->with('errormsj', 'Error De Datos'); 

        } 

    }


    public function delete($id)
    {
        //
        Empleados::destroy($id);
        return back()->with('eliminado', 'El registro ha sido eliminado!!'); 
    }

}
