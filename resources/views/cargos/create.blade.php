@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <?php $id_usr = Auth::user()->tipo_user; ?>
        
        <?php if ($id_usr==2 || $id_usr==1) { ?>

        <div class="col-md-12">
            <div class="panel panel-default">

            <div class="">
					
					@if(session()->has('message'))

						<div class="alert alert-success">

							
							{{ session()->get('message') }}

						</div>

					@endif	
					
				</div>
               
               <h1>Creación De Cargos</h1>

               <form method="POST" action="{{ route('new_cargo') }}">
								{{ csrf_field() }}

								<div class="col-md-10">
									<label>Nombre Del Cargo</label>
									<input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" class="form-control">
									
									@if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                	@endif

								</div>

							
								<hr>

								<div class="form-group">
									<div class="row">
										
										<div class="col-lg-10" style="margin: 15px;">
											<button class="btn btn-success" class="form-control" type="submit">Crear Cargo</button>
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

@endsection
