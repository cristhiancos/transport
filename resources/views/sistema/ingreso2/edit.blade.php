@extends ('layouts.admin')
@section ('contenido')
	  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
	<div class="row">
		<div class="col-md-3 ">
		</div>
	<div class="col-md-6 ">
			<h3>Editar Registro del usuario: {{$ingreso2->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($ingreso2,['method'=>'PATCH','route'=>['sistema.ingreso2.update',$ingreso2->numeroa]])!!}
            {{Form::token()}}
          	<div class="form-group">
            	<label for="nombre">Apellidos y Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$ingreso2->nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="numlicencia">Número Licencia</label>
            	<input type="text" name="numlicencia" class="form-control" value="{{$ingreso2->numlicencia}}" placeholder="Numero de Licencia...">
            </div>
						<div class="form-group">
            	<label for="tipoinfraccion">Tipo de infraccion</label>
            	<input type="text" name="tipoinfraccion" class="form-control"  value="{{$ingreso2->tipoinfraccion}}" placeholder="Tipo de infraccion...">
            </div>

            <div class="form-group">
            	<label for="sancion">Inhabilitacion</label>
            	<input type="text" name="sancion" class="form-control" value="{{$ingreso2->sancion}}" placeholder="Sancion...">
            </div>
						<div class="form-group">
            	<label for="multa">Multa</label>
            	<input type="text" name="multa" class="form-control" value="{{$ingreso2->multa}}" placeholder="Multa...">
            </div>
						<div class="form-group">
            	<label for="rdrnumero">R.D.R. Numero</label>
            	<input type="text" name="rdrnumero" class="form-control" value="{{$ingreso2->rdrnumero}}" placeholder="R.D.R. Numero...">
            </div>
						<div class="form-group">
            	<label for="rdrfecha">R.D.R. Fecha</label>
            	<input type="date"  name="rdrfecha" value="{{$ingreso2->rdrfecha}}" class="form-control" placeholder="R.D.R. Fecha...">
            </div>
						<div class="form-group">
            	<label for="puntoacum">Puntos Acumulados</label>
            	<input type="text" name="puntoacum" class="form-control" value="{{$ingreso2->puntoacum}}" placeholder="Puntos Acumulados...">
            </div>
						<div class="form-group">
            	<label for="levoficio">Levantamiento de Sancion Numero OF/EXP/INF</label>
            	<input type="text" name="levoficio" class="form-control" value="{{$ingreso2->levoficio}}" placeholder="Levantamiento de Sancion Numero OF/EXP/INF...">
            </div>
						<div class="form-group">
            	<label for="levfecha">Levantamiento de Sancion Fecha</label>
            	<input type="text" name="levfecha" class="form-control" value="{{$ingreso2->levfecha}}" placeholder="Levantamiento de Sancion Numero Fecha">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn btn-danger" href="{{url('/sistema/ingreso2')}}" role="button">Cancelar</a>
            </div>

			{!!Form::close()!!}

		</div>
	</div
@elseif (Auth::user()->oficina ==2)
	<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	<a class="btn btn-danger" href="{{url('/sistema/ingreso3')}}" role="button">Volver</a>
	</div>
@else
		<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	</div>
	<a class="btn btn btn-danger" href="{{url('/sistema/ingreso2')}}" role="button">Volver</a>
@endif
@endsection
