@extends ('layouts.admin')
@section ('contenido')
</div>
<h4 class="text-center">USUARIOS</h4><h4
  class="text-center"> </h4>
<div class="table-responsive-sm">
@if (Auth::user()->id ==1)
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-md-10 "><a
          onclick="return abrir_modal('','Registro de conductor nuevo')"
          class="btn btn-success btn-sm float-left" href="{{URL::action('UsuarioController@create')}}">Usuario Nuevo</a></div>
  <div class="col-sm-1"></div>
</div>
@endif
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
      <table id="tabla" class="table table-condensed table-bordered dt-responsive table-hover" cellspacing="0" width="100%">
          <thead class="thead-darkdisplay compact">
          <tr>

              <th class="text-center">Nombre</th>
              <th class="text-center">Email</th>
              <th class="text-center">Rol de Usuario (Administrador =1)</th>
              <th class="text-center">Oficina</th>
              @if (Auth::user()->name =='administrador')
              <th class=>Acciones</th>
                @endif
          </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $usu)
             


          <tr>

              <td >{{ $usu->name}}</td>
              <td >{{ $usu->email}}</td>
              <td align="justify">{{ $usu->role}}</td>
              <td align="justify">{{ $usu->oficina}}</td>



              @if (Auth::user()->name =='administrador')
              <td >
                 
                <a href="{{URL::action('UsuarioController@edit', $usu->id)}}"> <i class="fas fa-edit" title="Editar"> </i></a>
                <a href="" data-target = "#modal-delete-{{$usu->id}}" data-toggle="modal" > <i class="far fa-trash-alt" title="Eliminar"> </i></a>

              </td>
              @endif

          </tr>
          @include ('seguridad.usuario.modal')
          @endforeach
          </tbody>

         
</table>
      </table>
  </div>
</div>
<div id="popup"></div>
<script type="text/javascript">
  var modal;
  function abrir_modal(url, titulo) {
   modal = $('#popup').dialog( {
      title: titulo,
      modal: true,
      width: 800,
      resizable: true
  }).dialog('open').load(url)
  } function cerrar_modal(){
  modal.dialog("close");
      }

  $(document).ready(function() {
              $('#tabla tfoot th').each( function () {
                       var title = $(this).text();
              $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
                   } );

      var table = $('#tabla').dataTable( {

        language: {
          "emptyTable":			"No hay datos disponibles en la tabla.",
          "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
          "infoEmpty":			"No existen Registros",
          "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
          "infoPostFix":			"",
          "lengthMenu":			"Mostrar _MENU_ registros",
          "loadingRecords":		"Cargando...",
          "processing":			"Procesando...",
          "search":			"Buscar:",
          "searchPlaceholder":		"Busqueda General",
          "zeroRecords":			"No se han encontrado coincidencias.",
          "paginate": {
            "first":			"Primera",
            "last":				"Última",
            "next":				"Siguiente",
            "previous":			"Anterior"
          },
          "aria": {
            "sortAscending":	"Ordenación ascendente",
            "sortDescending":	"Ordenación descendente"
          }

        },

       } );
 

  });


</script>
</div>
</body>

@endsection
