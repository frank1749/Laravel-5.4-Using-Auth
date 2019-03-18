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
					
				</div>
               
               <h1>Creación De Empresas</h1>

               <form method="POST" action="{{ route('new_empresa') }}">
								{{ csrf_field() }}

								<div class="col-md-10">
									<label>Nombre</label>
									<input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" class="form-control">
									
									@if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                	@endif

								</div>

								<div class="col-md-10">
									<label>Nit</label>
									<input type="text" name="nit" onkeypress="return justNumbers(event);" class="form-control" value="{{ old('nit') }}" class="form-control">
									
									@if ($errors->has('nit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nit') }}</strong>
                                    </span>
                                	@endif

								</div>


								<hr>

								<div class="form-group">
									<div class="row">
										
										<div class="col-lg-10" style="margin-top: 12px;">
											<button class="btn btn-success" class="form-control" type="submit">Crear Empresa</button>
										</div>
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
