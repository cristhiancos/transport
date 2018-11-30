@extends ('layouts.admin')
@section ('contenido')
</div>
@if ((Auth::user()->role ==1 && Auth::user()->oficina =="3") || (Auth::user()->name =="administrador")|| (Auth::user()->oficina =="sin oficina"))
<h4 class="text-center">Direccion Departamental de Circulacion Terrestre de Ayacucho</h4>
<h2 class="text-center">UNIDAD DE LICENCIAS DE CONDUCIR </h4>
<h4 class="text-center">Padrón General de Licencias de Conducir por Orden Numerico     </h4>
<div class="table-responsive-sm">
@if ((Auth::user()->role ==1 && Auth::user()->oficina =="3") || (Auth::user()->name =="administrador"))
<div class="row">
  <div class="col-md-12 col-md-offset-2"><a
          onclick="return abrir_modal('','Registro de conductor nuevo')"
          class="btn btn-success btn-sm float-right" href="{{URL::action('Ingreso4Controller@create')}}">Registro Nuevo</a></div>
</div>
@endif
<div class="">
  <div class="col-lg-12">
      <table id="tabla" class="table table-condensed table-bordered dt-responsive table-hover" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr align="center" valign="middle">
              <th class="text-center" rowspan="2"><FONT SIZE=1>N° de Licencia</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Tipo de Licencia</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Apellidos y Nombres</font></th>
              <th class="text-center" colspan="2"><FONT SIZE=1>CLASIFICACION</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Fecha de Expedicion</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Fecha de Vencimiento</font></th>
              <th class="text-center" colspan="3"><FONT SIZE=1>EXAMEN MEDICO</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Registro de Conductor N° Tarjeta</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>N° Anterior y Lugar de Expedicion</font></th>


              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="3") || (Auth::user()->name =="administrador"))
              <th class="text-center" rowspan="2"><FONT SIZE=1>Acciones</font></th>
                @endif
            </tr>
              <tr  align="center" valign="middle">
                <th><FONT SIZE=1>Clase</font></th>
                <th><FONT SIZE=1>Categoria</font></th>
                <th><FONT SIZE=1>N° Ficha</font></th>
                <th><FONT SIZE=1>Fecha</font></th>
                <th><FONT SIZE=1>Restricciones</font></th>

              </tr>

          </thead>
          <tbody>
            @foreach ($ingresos4 as $ing4)


          <tr>


              <td ><FONT SIZE=3>{{ $ing4->numlicencia}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->tipolicencia}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->nombre}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->clase}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->categoria}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->fechaexpe}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->fechavenc}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->numfichamed}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->fechamed}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->restriccionesmed}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->registrodeconduc}}</font></td>
              <td ><FONT SIZE=3>{{ $ing4->numanterior}}</font></td>





              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="3") || (Auth::user()->name =="administrador"))
              <td width="5%">

                   <a href="{{URL::action('Ingreso4Controller@edit', $ing4->numlicencia)}}"><i class="fas fa-edit" title="Editar"></i></a>
                  <a href="" data-target = "#modal-delete-{{$ing4->numlicencia}}" data-toggle="modal" > <i class="far fa-trash-alt" title="Eliminar"></i> </a>
             </td>
              @endif

          </tr>
          @include ('sistema.ingreso4.modal')
          @endforeach
          </tbody>

          <tfoot>
            <tr>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="15%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>

              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></th></td>


                  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="3") || (Auth::user()->name =="administrador"))
                  <td class="text-center"  width="5%"></td>
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

        $(document).ready(function() {

                    $('#tabla tfoot th').each( function () {
                             var title = $(this).text();
                    $(this).html( '<FONT SIZE=1><input type="text" size="10" placeholder="Buscar '+title+'" />' );
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

             dom: 'Bfrtip',

             buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copiar',
                exportOptions: {
                columns: [ 0, ':visible' ]
                }

            },
            {
                extend: 'excelHtml5',
                text: 'Exportar en Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Exportar en PDF',
                orientation: 'landscape',

                'title': 'RELACION DE ACTAS DE CONTROL',
                exportOptions: {
                columns: [ 1, 2, 3, 4,5, 6, 7,8,9,10,11,12]
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
	<a class="btn btn-danger" href="{{url('/sistema/categoria')}}" role="button">Volver</a>
	</div>
	@endif
</div>
</body>


@endsection
