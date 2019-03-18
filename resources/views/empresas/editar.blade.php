@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

	<?php $id_usr = Auth::user()->tipo_user; ?>
        
        <?php if ($id_usr==2) { ?>

        <div class="col-md-12">
            <div class="panel panel-default">

            <div class="">
					
					@if(session()->has('message'))

						<div class="alert alert-success">

							
							{{ session()->get('message') }}

						</div>

					@endif	

					@if(Session::has('errormsj'))

                        <div class="alert alert-danger">
                            <p>{{Session::get('errormsj')}}</p>
                        </div>

                    @endif

                    @if(Session::has('actualizado'))

                        <div class="alert alert-success">
                            <p>{{Session::get('actualizado')}}</p>
                        </div>

                    @endif
					
				</div>
               
               <h1>Edición De Empresa</h1>

               <form method="POST" action="{{ route('update_empresa', $empresa->id) }}">								

           		<input type="hidden" name="_method" value="PUT">
        
       		    <input type="hidden" name="_token" value="{{ csrf_token() }}" required>


								<div class="col-md-10">
									<label>Nombre</label>
									<input type="text" name="nombre" class="form-control" value="{{$empresa->nombre}}" class="form-control">
									
									@if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                	@endif

								</div>

								<div class="col-md-10">
									<label>NIT</label>
									<input type="text" name="nit" onkeypress="return justNumbers(event);" class="form-control" value="{{$empresa->nit}}" class="form-control">
									
									@if ($errors->has('nit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nit') }}</strong>
                                    </span>
                                	@endif

								</div>	

								
								<hr>

								<div class="row">
									
									<div class="col-lg-12" style="margin: 15px;">
										<button class="btn btn-success" class="form-control" type="submit">Actualizar Empresa</button>
									</div>
								</div>
							</form>

            </div>
        </div>

		<?php }else{ ?>

            <div class="error-data">
                Lo sentimos no tiene permisos para acceder a esta sección.
            </div>

        <?php } ?>

    </div>
</div>

	<!--Validar solo ingreso de números-->
     <script type="text/javascript" charset="utf-8">
          function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
          if ((keynum == 8) || (keynum == 46))
            return true;

              return /\d/.test(String.fromCharCode(keynum));
              }
    </script>

@endsection
