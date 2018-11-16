@extends ('layouts.admin')
@section ('contenido')
  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador"))
	<div class="row">
		<div class="col-md-3 ">
		</div>
	<div class="col-md-6 ">
			<h3>Editar Registro del usuario: {{$ingreso3->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($ingreso3,['method'=>'PATCH','route'=>['sistema.ingreso3.update',$ingreso3->numero]])!!}
            {{Form::token()}}
          	<div class="form-group">
            	<label for="numacta">N° Acta</label>
            	<input type="text" name="numacta" class="form-control" value="{{$ingreso3->numacta}}" placeholder="N° Acta...">
            </div>
            <div class="form-group">
            	<label for="fecha">Fecha</label>
            	<input type="date" name="fecha" class="form-control" value="{{$ingreso3->fecha}}"placeholder="Fecha...">
            </div>
						<div class="form-group">
            	<label for="placavehiculo">Placa del Vehiculo</label>
            	<input type="text" name="placavehiculo" class="form-control" value="{{$ingreso3->placavehiculo}}" placeholder="Placa del Vehiculo...">
            </div>

            <div class="form-group">
            	<label for="servicio">Servicio</label>
            	<input type="text" name="servicio" class="form-control" value="{{$ingreso3->servicio}}"placeholder="Servicio...">
            </div>
						<div class="form-group">
            	<label for="lugar">Lugar</label>
            	<input type="text" name="lugar" class="form-control" value="{{$ingreso3->lugar}}"placeholder="Lugar...">
            </div>
						<div class="form-group">
            	<label for="razonsocial">Nombre o Razon Social</label>
            	<input type="text" name="razonsocial" class="form-control" value="{{$ingreso3->razonsocial}}" placeholder="Nombre o Razon Social...">
            </div>
						<div class="form-group">
            	<label for="nombre">Apellidos y Nombres del Conductor</label>
            	<input type="text" name="nombre" class="form-control" value="{{$ingreso3->nombre}}" placeholder="Apellidos y Nombres del Conductor...">
            </div>
						<div class="form-group">
            	<label for="domicilio">Domicilio</label>
            	<input type="text" name="domicilio" class="form-control" value="{{$ingreso3->domicilio}}" placeholder="Domicilio...">
            </div>
						<div class="form-group">
            	<label for="motivo">Motivo</label>
            	<input type="text" name="motivo" class="form-control" value="{{$ingreso3->motivo}}" placeholder="Motivo...">
            </div>
						<div class="form-group">
            	<label for="codigo">Código</label>
            	<input type="text" name="codigo" class="form-control" value="{{$ingreso3->codigo}}" placeholder="Código...">
            </div>
						<div class="form-group">
            	<label for="documentoret">Documento Retenido</label>
            	<input type="text" name="documentoret" class="form-control" value="{{$ingreso3->documentoret}}" placeholder="Documento Retenido...">
            </div>
						<div class="form-group">
            	<label for="inspector">INSPECTOR</label>
            	<input type="text" name="inspector" class="form-control" value="{{$ingreso3->inspector}}"placeholder="Inspector...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn btn-danger" href="/sistema/ingreso3" role="button">Cancelar</a>
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
	</div>
	<a class="btn btn btn-danger" href="/sistema/ingreso3" role="button">Volver</a>
@endif
@endsection
