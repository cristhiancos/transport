
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$usu->id}}">
	{{Form::Open(array('action'=>array('UsuarioController@destroy',$usu->id),'method'=>'DELETE'))}}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					@if ($usu->id != 1)
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>


        </div>
        <div class="modal-body">
				<p>Confirme si desea Eliminar el Usuario: {{$usu->name}}</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-danger">Confirmar</button>
			</div>
				@else
					<h5 class="modal-title" id="exampleModalLabel">Error</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>


	        </div>
	        <div class="modal-body">
					<p>No se puede eliminar el usuario: {{$usu->name}}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

				</div>
				@endif
		</div>
	</div>
	{{Form::Close()}}

</div>
