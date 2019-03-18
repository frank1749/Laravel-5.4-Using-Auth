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
               
               <h1>Creación De Empleado</h1>

               <form method="POST" action="{{ route('new_empleado') }}">
								{{ csrf_field() }}

								<div class="col-md-10">
									<label>Nombre Completo</label>
									<input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" class="form-control">
									
									@if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                	@endif

								</div>

								<div class="col-md-10">
									<label>Cédula</label>
									<input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}" class="form-control">
									
									@if ($errors->has('cedula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                	@endif

								</div>

								<div class="col-md-10">
									<label>Cargo</label>
									<select class="form-control" name="id_cargo">

										@foreach($cargos as $car)
											<option value="{{ $car->id }}">{{ $car->nombre }}</option>
										@endforeach

									</select>
									
									@if ($errors->has('id_cargo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_cargo') }}</strong>
                                    </span>
                                	@endif

								</div>

								<div class="col-md-10">
									<label>Empresa</label>
									<select class="form-control" name="id_empresa">

										@foreach($empresas as $empre)
											<option value="{{ $empre->id }}">{{ $empre->nombre }}</option>
										@endforeach

									</select>
									
									@if ($errors->has('id_empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_empresa') }}</strong>
                                    </span>
                                	@endif

								</div>
							
								<hr>

								<div class="form-group">
									<div class="row">
										
										<div class="col-lg-10" style="margin: 15px;">
											<button class="btn btn-success" class="form-control" type="submit">Crear Empleado</button>
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
