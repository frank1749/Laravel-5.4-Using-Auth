@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <?php $id_usr = Auth::user()->tipo_user; ?>
        
        <?php if ($id_usr==2) {
                # code...
        ?>

        <div class="col-md-10">
            <div class="panel panel-default">

                     @if(Session::has('eliminado'))

                        <div class="alert alert-success">
                            <p>{{Session::get('eliminado')}}</p>
                        </div>

                    @endif          

                              
                   <h1>Gestión De Empresas</h1>

                   <table class="table">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Nit</th>
                        <th>Creación</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($empresas as $emp)
                          <tr>
                            <td>{{ $emp->nombre }}</td>
                            <td>{{ $emp->nit }}</td>
                            <td>{{ $emp->created_at }}</td>
                            <td><a href="/empre/{{ $emp -> id }}/edit">Editar</a> 
                                 <form action="{{ route('delete_empresa', $emp -> id) }}" method="post">
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

                    {{ $empresas -> render() }}

                 

            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ route('create_empresa') }}" class="btn btn-primary">Crear Empresa</a>
        </div>
        
        <?php }else{ ?>

            <div class="error-data">
                Lo sentimos no tiene permisos para acceder a esta sección.
            </div>

        <?php } ?>

    </div>
</div>
@endsection
