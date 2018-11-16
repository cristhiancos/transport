@extends ('layouts.admin')

@section ('contenido')
	 @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
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

			{!!Form::open(array('url'=>'sistema/ingreso2','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Apellidos y Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="numlicencia">Número Licencia</label>
            	<input type="text" name="numlicencia" class="form-control" placeholder="Numero de Licencia...">
            </div>
						<div class="form-group">
            	<label for="tipoinfraccion">Tipo de infraccion</label>
            	<input type="text" name="tipoinfraccion" class="form-control" placeholder="Tipo de infraccion...">
            </div>

            <div class="form-group">
            	<label for="sancion">Inhabilitacion</label>
            	<input type="text" name="sancion" class="form-control" placeholder="Sancion...">
            </div>
						<div class="form-group">
            	<label for="multa">Multa</label>
            	<input type="text" name="multa" class="form-control" placeholder="Multa...">
            </div>
						<div class="form-group">
            	<label for="rdrnumero">R.D.R. Numero</label>
            	<input type="text" name="rdrnumero" class="form-control" placeholder="R.D.R. Numero...">
            </div>
						<div class="form-group">
            	<label for="rdrfecha">R.D.R. Fecha</label>
            	<input type="date" value="04/08/2018" name="rdrfecha" class="form-control" placeholder="R.D.R. Fecha...">
            </div>
						<div class="form-group">
            	<label for="puntoacum">Puntos Acumulados</label>
            	<input type="text" name="puntoacum" class="form-control" placeholder="Puntos Acumulados...">
            </div>
						<div class="form-group">
            	<label for="levoficio">Levantamiento de Sancion Numero OF/EXP/INF</label>
            	<input type="text" name="levoficio" class="form-control" placeholder="Levantamiento de Sancion Numero OF/EXP/INF...">
            </div>
						<div class="form-group">
            	<label for="levfecha">Levantamiento de Sancion Fecha</label>
            	<input type="text" name="levfecha" class="form-control" placeholder="Levantamiento de Sancion Numero Fecha">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>

            	<button class="btn btn-warning" type="reset">Limpiar</button>
              <a class="btn btn-danger" href="{{url('/sistema/ingreso2')}}" role="button">Cancelar</a>
            </div>

			{!!Form::close()!!}

		</div>
	</div>
@elseif (Auth::user()->oficina ==2)
	<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	<a class="btn btn-danger" href="{{url('/sistema/ingreso3')}}" role="button">Volver</a>
	</div>
@else
	<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para realizar esta operación</h3>
	<a class="btn btn-danger" href="{{url('/sistema/ingreso2')}}" role="button">Volver</a>
	</div>
@endif

@endsection
