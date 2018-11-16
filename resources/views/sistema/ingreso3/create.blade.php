@extends ('layouts.admin')

@section ('contenido')
  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador"))
	<div class="row">
		<div class="col-md-3 ">
		</div>
	<div class="col-md-6 ">
			<h3>Nuevo Registro</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'sistema/ingreso3','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="numacta">N° Acta</label>
            	<input type="text" name="numacta" class="form-control" placeholder="N° Acta...">
            </div>
            <div class="form-group">
            	<label for="fecha">Fecha</label>
            	<input type="date" name="fecha" class="form-control" placeholder="Fecha...">
            </div>
						<div class="form-group">
            	<label for="placavehiculo">Placa del Vehiculo</label>
            	<input type="text" name="placavehiculo" class="form-control" placeholder="Placa del Vehiculo...">
            </div>

            <div class="form-group">
            	<label for="servicio">Servicio</label>
            	<input type="text" name="servicio" class="form-control" placeholder="Servicio...">
            </div>
						<div class="form-group">
            	<label for="lugar">Lugar</label>
            	<input type="text" name="lugar" class="form-control" placeholder="Lugar...">
            </div>
						<div class="form-group">
            	<label for="razonsocial">Nombre o Razon Social</label>
            	<input type="text" name="razonsocial" class="form-control" placeholder="Nombre o Razon Social...">
            </div>
						<div class="form-group">
            	<label for="nombre">Apellidos y Nombres del Conductor</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Apellidos y Nombres del Conductor...">
            </div>
						<div class="form-group">
            	<label for="domicilio">Domicilio</label>
            	<input type="text" name="domicilio" class="form-control" placeholder="Domicilio...">
            </div>
						<div class="form-group">
            	<label for="motivo">Motivo</label>
            	<input type="text" name="motivo" class="form-control" placeholder="Motivo...">
            </div>
						<div class="form-group">
            	<label for="codigo">Código</label>
            	<input type="text" name="codigo" class="form-control" placeholder="Código...">
            </div>
						<div class="form-group">
            	<label for="documentoret">Documento Retenido</label>
            	<input type="text" name="documentoret" class="form-control" placeholder="Documento Retenido...">
            </div>
						<div class="form-group">
            	<label for="inspector">INSPECTOR</label>
            	<input type="text" name="inspector" class="form-control" placeholder="Inspector...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>

            	<button class="btn btn-warning" type="reset">Limpiar</button>
              <a class="btn btn-danger" href="{{url('/sistema/ingreso3')}}" role="button">Cancelar</a>
            </div>

			{!!Form::close()!!}

		</div>
	</div>
@elseif (Auth::user()->oficina ==1)
  <div class="alert alert-danger" role="alert">
  <h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
  <a class="btn btn-danger" href="{{url('/sistema/categoria')}}" role="button">Volver</a>
  </div>
@else
	<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	<a class="btn btn-danger" href="{{url('/sistema/ingreso3')}}" role="button">Volver</a>
	</div>
@endif

@endsection
