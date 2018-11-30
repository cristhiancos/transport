@extends ('layouts.admin')
@section ('contenido')
		@if (Auth::user()->name =='administrador')
	<div class="row">
		<div class="col-md-3 ">
		</div>
	<div class="col-md-6 ">
			<h3>Editar Usuario: {{$usuario->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.usuario.update',$usuario->id]])!!}
            {{Form::token()}}
					@if ($usuario->id != 1)
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name" class="col-md-4 control-label">Nombre</label>

								<div class="col-md-12">
										<input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name  }}">

										@if ($errors->has('name'))
												<span class="help-block">
														<strong>{{ $errors->first('name') }}</strong>
												</span>
										@endif
								</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-12">
										<input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email  }}">

										@if ($errors->has('email'))
												<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
												</span>
										@endif
								</div>
						</div>

						<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
								<label for="role" class="col-md-4 control-label">Rol</label>

								<div class="col-md-12">

										<select class="form-control" id="role" name="role" value="{{ $usuario->role  }}">
      								<option value="0">Usuario Normal</option>
      								<option value="1">Usuario administrador </option>
											</select>
										@if ($errors->has('role'))
												<span class="help-block">
														<strong>{{ $errors->first('role') }}</strong>
												</span>
										@endif
								</div>
						</div>
						<div class="form-group{{ $errors->has('oficina') ? ' has-error' : '' }}">
								<label for="oficina" class="col-md-12 control-label">Seleccion a la oficina que pertenece</label>

								<div class="col-md-12">

										<select class="form-control" id="oficina" name="oficina" value="{{ $usuario->oficina  }}">
											<option value=""> </option>
											<option value="sin oficina">Sin oficina </option>
											<option value="1">Oficina 1</option>
      								<option value="2">Oficina 2 </option>
											<option value="3">Oficina 3 </option>

											</select>
										@if ($errors->has('ofina'))
												<span class="help-block">
														<strong>{{ $errors->first('oficina') }}</strong>
												</span>
										@endif
								</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-md-4 control-label">Password</label>

								<div class="col-md-12">
										<input id="password" type="password" class="form-control" name="password">

										@if ($errors->has('password'))
												<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
												</span>
										@endif
								</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

								<div class="col-md-12">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

										@if ($errors->has('password_confirmation'))
												<span class="help-block">
														<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
										@endif
								</div>
						</div>

            <div class="form-group col-md-12">
            	<button class="btn btn-primary" type="submit">Guardar</button>


              <a class="btn btn-danger" href="/seguridad/usuario" role="button">Cancelar</a>
            </div>
					@else
						<div class="alert alert-danger" role="alert">

						<h4>No es posible editar la cuenta de:  {{ Auth::user()->name }}</h4>
						</div>
						<a class="btn btn-danger" href="/seguridad/usuario" role="button">Volver</a>
					</div>
					@endif
			{!!Form::close()!!}

		</div>
	</div>
@else
	<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	</div>
	<a class="btn btn-danger" href="/seguridad/usuario" role="button">Volver</a>

</div>
@endif
@endsection
