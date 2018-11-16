@extends ('layouts.admin')
@section ('contenido')
</div>
@if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador")|| (Auth::user()->oficina =="sin oficina"))

<h4 class="text-center">CONDUCTORES EN PROCESO DE SANCIÓN</h4><h4
  class="text-center">RELACIÓN DE EXPEDIENTES REMITIDOS A LA MUNICIPALIDAD PROVINCIAL DE HUAMANGA Y OTROS </h4>
<div class="table-responsive-sm">

@if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))



<div class="row col-lg-12">
    <div class="col-md-12 col-md-offset-1">
        <a onclick="return abrir_modal('','Registro de conductor nuevo')"
            type="button"
           
            class="btn btn-success float-right" 
            href="{{URL::action('IngresoController@create')}}">
            <span class="far fa-plus-square"></span> Registro Nuevo
        </a>
    </div>
</div>


@endif
<div class="">
  <div class="col-lg-12">
      <table id="tabla" class="table table-condensed table-bordered dt-responsive table-hover" cellspacing="0" width="100%">
          <thead class="thead-dark display compact">
          <tr>
              <th class="text-center" width="1%">N°</th>
              <th class="text-center">Nombres</th>
              <th class="text-center">Oficio</th>
              <th class="text-center">Documentos</th>
              <th class="text-center">Observaciones</th>
              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
              <th class="text-center">Acciones</th>
              @endif
          </tr>
          </thead>
          <tbody>
            @foreach ($categorias as $cat)


          <tr>
              <td width="5%">{{ $cat->numero}}</td>
              <td width="15%">{{ $cat->nombre}}</td>
              <td width="20%">{{ $cat->oficio}}</td>
              <td align="justify">{{ $cat->documentos}}</td>
              <td width="5%">{{ $cat->observaciones}}</td>


              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
              <td width="5%">
                  <div class="container">
                  <div class="btn-group-vertical">
                   <a type="button" href="{{URL::action('IngresoController@edit', $cat->numero)}}" class="btn btn-info">
                     <span class="fas fa-edit" title="Editar"></span> Editar
                   </a>
                  
                  <a href="" data-target = "#modal-delete-{{$cat->numero}}" data-toggle="modal" class="btn btn-danger" > 
                    <span class="far fa-trash-alt" title="Eliminar"></span> Eliminar
                  </a>
                     </div>
                  </div>
              </td>
              @endif

          </tr>
          @include ('sistema.categoria.modal')
          @endforeach
          </tbody>

          <tfoot>
              <tr>
                  <td width="1%"></td>
                  <th width="15%">Nombre</th>
                  <th width="20%">Oficio</th>
                  <th >Documentos</td>
                  <td align="justify" width="15%">Observaciones</td>

                  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
                  <td class="text-center">Acciones</td>
                  @endif
                  </tr>
  </tfoot>
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
$("#tabla_filter").attr("placeholder", "New Value");

$(document).ready(function() {
  $('#tabla tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );

  var table = $('#tabla').dataTable( {
    processing: true,
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





    dom: 'Bfrtip',

    buttons: [
      {
        extend: 'copyHtml5',
        text: 'Copiar',
        exportOptions: {
          columns: [ 0,1, 2, 3, 4 ]
        }
      },
      {
        extend: 'excelHtml5',
        text: 'Exportar en Excel',
        exportOptions: {

          columns: [ 0,1, 2, 3, 4 ]
        }
      },
      {
        extend: 'pdfHtml5',

        text: 'Exportar en PDF',
        exportOptions: {
          columns: [ 1, 2, 3, 4 ]
        }
      }

    ]

  } );
  table.api().columns().every( function () {
    var that = this;

    $( 'input', this.footer() ).on( 'keyup change', function () {
      if ( that.search() !== this.value ) {
        that
        .search( this.value )
        .draw();
      }
    } );
  } );

});


</script>
 @else
    
    	<div class="alert alert-danger" role="alert">
	<h3>Usted no cuenta con los permisos necesarios para acceder a esta vista</h3>
	<a class="btn btn-danger" href="{{url('/sistema/ingreso3')}}" role="button">Volver</a>
	</div>
	@endif
</div>
</body>

@endsection
