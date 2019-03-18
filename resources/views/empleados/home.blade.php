@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

       

        <div class="col-md-10">
            <div class="panel panel-default">

                     @if(Session::has('inscrito'))

                        <div class="alert alert-success">
                            <p>{{Session::get('inscrito')}}</p>
                        </div>

                    @endif          

                              
                   <h1>Listado De Empleados</h1>

                   <table class="table">
                    <thead>
                      <tr>
                        <th>Nombre Completo</th>
                        <th>Cédula</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($empleados as $emp)
                          <tr>
                            <td>{{ $emp->fullname }}</td>
                            <td>{{ $emp->cedula }}</td>
                            <td>
                                <a href="/emp/{{ $emp -> id }}/edit">Editar</a> 
                                 <form action="{{ route('delete_empleado', $emp -> id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">

                                                {{ csrf_field() }}

                                            <input class="btn btn-danger btn-xs" value="Eliminar" type="submit"/>
                                 </form>
                            </td>
                          </tr>
                      @endforeach                     

                    </tbody>
                  </table>

                    <!-- Poner paginador -->

                     {{ $empleados -> render() }}

                 

            </div>
        </div>

        <div class="col-md-2">
            <a href="{{ route('create_empleado') }}" class="btn btn-primary">Crear Empleado</a>
        </div>
             

    </div>
</div>
@endsection
