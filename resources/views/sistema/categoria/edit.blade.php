@extends ('layouts.admin')
@section ('contenido')
	@if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
	<div class="row">
		<div class="col-md-3 ">
		</div>
	<div class="col-md-6 ">
			<h3>Editar Registro del usuario: {{$categoria->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($categoria,['method'=>'PATCH','route'=>['sistema.categoria.update',$categoria->numero]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="oficio">Oficio</label>
            	<input type="text" name="oficio" class="form-control" value="{{$categoria->oficio}}" placeholder="Oficio...">
            </div>
            <div class="form-group">
            	<label for="documentos">Documentos</label>
              <textarea class="form-control"  name="documentos"  rows="3">{{$categoria->documentos}}</textarea>

            </div>

            <div class="form-group">
            	<label for="observaciones">Observaciones</label>
            	<input type="text" name="observaciones" class="form-control" value="{{$categoria->observaciones}}" placeholder="Observaciones...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn btn-danger" href="{{url('/sistema/categoria')}}" role="button">Cancelar</a>
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
	</div>
	<a class="btn btn btn-danger" href="{{url('/sistema/categoria')}}" role="button">Volver</a>
@endif
@endsection
