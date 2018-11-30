
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$ing4->numlicencia}}">
	{{Form::Open(array('action'=>array('Ingreso4Controller@destroy',$ing4->numlicencia),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
				<p>Confirme si desea Eliminar el Registro de: {{$ing4->numlicencia}}</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-danger">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
