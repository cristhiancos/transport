@extends ('layouts.admin')
@section ('contenido')
  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="3") || (Auth::user()->name =="administrador"))
	<div class="row">
		<div class="col-md-3 ">
		</div>
	<div class="col-md-6 ">
			<h3>Editar Registro del usuario: {{$ingreso4->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($ingreso4,['method'=>'PATCH','route'=>['sistema.ingreso4.update',$ingreso4->numlicencia]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="numlicencia">N° de Licencia</label>
            	<input type="text" name="numlicencia" class="form-control" value="{{$ingreso4->numlicencia}}" placeholder="N° de Licencia...">
            </div>
            <div class="form-group">
            	<label for="tipolicencia">Tipo de Licencia</label>
            	<input type="text" name="tipolicencia" class="form-control" value="{{$ingreso4->tipolicencia}}" placeholder="Tipo de Licencia...">
            </div>
            <div class="form-group">
            	<label for="nombre">Apellidos y Nombres</label>
            	<input type="text" name="nombre" class="form-control" value="{{$ingreso4->nombre}}" placeholder="Apellidos y Nombres...">
            </div>
            <div class="form-group">
            	<label for="clase">Clase</label>
            	<input type="text" name="clase" class="form-control" value="{{$ingreso4->clase}}" placeholder="Clase...">
            </div>
						<div class="form-group">
            	<label for="categoria">Categoria</label>
            	<input type="text" name="categoria" class="form-control" value="{{$ingreso4->categoria}}" placeholder="Categoria...">
            </div>
						<div class="form-group">
            	<label for="fechaexpe">Fecha de Expedicion</label>
            	<input type="date" name="fechaexpe" class="form-control" value="{{$ingreso4->fechaexpe}}" placeholder="Fecha de Expedicion...">
            </div>
						<div class="form-group">
            	<label for="fechavenc">Fecha de Vencimiento</label>
            	<input type="text" name="fechavenc" class="form-control" value="{{$ingreso4->fechavenc}}" placeholder="Fecha de Vencimiento...">
            </div>
						<div class="form-group">
            	<label for="numfichamed">Numero de Ficha Medica</label>
            	<input type="text" name="numfichamed" class="form-control" value="{{$ingreso4->numfichamed}}" placeholder="Numero de Ficha Medica...">
            </div>
						<div class="form-group">
            	<label for="fechamed">Fecha del Examen Medico</label>
            	<input type="date" name="fechamed" class="form-control" value="{{$ingreso4->fechamed}}" placeholder="Motivo...">
            </div>
						<div class="form-group">
            	<label for="restriccionesmed">Restricciones Medicas</label>
            	<input type="text" name="restriccionesmed" class="form-control"  value="{{$ingreso4->restriccionesmed}}" placeholder="Restricciones Medicas...">
            </div>
						<div class="form-group">
            	<label for="registrodeconduc">Registro de Conductor N° Tarjeta</label>
            	<input type="text" name="registrodeconduc" class="form-control"  value="{{$ingreso4->registrodeconduc}}" placeholder="Registro de Conductor N° Tarjeta...">
            </div>
						<div class="form-group">
            	<label for="numanterior">N° Anterior y Lugar de Expedicion</label>
            	<input type="text" name="numanterior" class="form-control" value="{{$ingreso4->numanterior}}" placeholder="N° Anterior y Lugar de Expedicion...">
            </div>



            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn btn-danger" href="/sistema/ingreso4  " role="button">Cancelar</a>
            </div>

			{!!Form::close()!!}

		</div>
	</div>
@elseif (Auth::user()->oficina ==1)
  <div class="alert alert-danger" role="alert">
  <h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
  <a class="btn btn-danger" href="{{url('/sistema/categoria')}}" role="button">Volver</a>
  </div>
@elseif (Auth::user()->oficina ==2)
  <div class="alert alert-danger" role="alert">
  <h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
  <a class="btn btn-danger" href="{{url('/sistema/ingreso2')}}" role="button">Volver</a>
  </div>
@else
		<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	</div>
	<a class="btn btn btn-danger" href="/sistema/ingreso4" role="button">Volver</a>
@endif
@endsection
