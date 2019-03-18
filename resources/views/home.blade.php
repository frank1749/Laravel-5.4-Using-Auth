@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de usuario</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Bienvenido(a): <?php $name = Auth::user()->fullname; echo $name; ?> </h2>
                    <h2>
                        Tipo de usuario: <?php $id = Auth::user()->tipo_user; ?>
                        <?php if ($id==1) {
                            # code...
                            echo "Usuario Normal";
                        }else { echo "Usuario Administrador"; } ?> 
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
