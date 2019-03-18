@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <?php $id_usr = Auth::user()->tipo_user; ?>
        
        <?php if ($id_usr==2 || $id_usr==1) {
                # code...
        ?>

        <div class="col-md-10">
            <div class="panel panel-default">

                     @if(Session::has('eliminado'))

                        <div class="alert alert-success">
                            <p>{{Session::get('eliminado')}}</p>
                        </div>

                    @endif          

                              
                   <h1>Gestión De Cargos</h1>

                   <table class="table">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Creación</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($cargos as $cg)
                          <tr>
                            <td>{{ $cg->nombre }}</td>
                            <td>{{ $cg->created_at }}</td>
                            <td><a href="/cargo/{{ $cg -> id }}/edit">Editar</a> 
                                 <form action="{{ route('delete_cargo', $cg -> id) }}" method="post">
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

                    {{ $cargos -> render() }}
                 

            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ route('create_cargo') }}" class="btn btn-primary">Crear Cargo</a>
        </div>
        
        <?php }else{ ?>

            <div class="error-data">
                Lo sentimos no tiene permisos para acceder a esta sección.
            </div>

        <?php } ?>

    </div>
</div>
@endsection
