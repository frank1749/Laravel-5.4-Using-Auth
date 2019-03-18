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
               
               <h1>Edición De Empleado</h1>

               <form method="POST" action="{{ route('update_empleado', $empleado->id) }}">								

           		<input type="hidden" name="_method" value="PUT">
        
       		    <input type="hidden" name="_token" value="{{ csrf_token() }}" required>


								<div class="col-md-10">
									<label>Nombre Completo</label>
									<input type="text" name="nombre" class="form-control" value="{{$empleado->fullname}}" class="form-control">
									
									   @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                      @endif

								</div>

                <div class="col-md-10">
                  <label>Cédula</label>
                  <input type="text" name="cedula" class="form-control" value="{{$empleado->cedula}}" class="form-control">
                  
                     @if ($errors->has('cedula'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cedula') }}</strong>
                            </span>
                      @endif

                </div>

                <div class="col-md-10">
                  <label>Cambiar Cargo</label>
                  <select class="form-control" name="id_cargo">

                    @foreach($cargos as $car)
                      <option value="{{ $car->id }}" <?php if($empleado->id_cargo == $car->id){echo "selected";} ?>>
                        {{ $car->nombre }}
                      </option>
                    @endforeach

                  </select>
                  
                  @if ($errors->has('id_cargo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id_cargo') }}</strong>
                        </span>
                  @endif

                </div>

                <div class="col-md-10">
                  <label>Cambiar Empresa</label>
                  <select class="form-control" name="id_empresa">

                    @foreach($empresas as $em)
                      <option value="{{ $em->id }}" <?php if($em->id == $empleado->id_empresa){echo "selected";} ?>>
                        {{ $em->nombre }}
                      </option>
                    @endforeach

                  </select>
                  
                  @if ($errors->has('id_cargo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id_cargo') }}</strong>
                        </span>
                  @endif

                </div>
																
								<hr>

								<div class="row">
									
									<div class="col-lg-12" style="margin: 15px;">
										<button class="btn btn-success" class="form-control" type="submit">Actualizar Empleado</button>
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
