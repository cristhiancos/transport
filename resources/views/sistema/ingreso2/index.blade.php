@extends ('layouts.admin')
@section ('contenido')
</div>
@if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador")|| (Auth::user()->oficina =="sin oficina"))

<h4 class="text-center">RECORD DE SANCIONES</h4><h4
        class="text-center">CONDUCTORES SANCIONADOS POR INFRACCION AL REGLAMENTO DE TRANSITO </h4>
<div class="table-responsive-sm">
  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
<div class="row">
  <div class="col-md-12 col-md-offset-2"><a onclick="return abrir_modal('','Registro de conductor nuevo')"
          class="btn btn-success btn-sm float-right" href="{{URL::action('Ingreso2Controller@create')}}">Registro Nuevo</a></div>
</div>
@endif
<div class="">
  <div class="col-lg-12">
      <table id="tabla" class="table table-condensed table-bordered dt-responsive table-hover" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr align="center" valign="middle">
              <th class="text-center" rowspan="2" width="1%"><FONT SIZE=1>N°</font></th>
              <th class="text-center" rowspan="2" ><FONT SIZE=2>Apellidos y Nombre</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=2>Número Licencia</font></th>
              <th class="text-center" rowspan="2" width="1%"><FONT SIZE=2>Tipo de infraccion</font></th>
              <th class="text-center" colspan="2"><FONT SIZE=1>Sancion</font></th>
              <th class="text-center" colspan="2"><FONT SIZE=1>R.D.R.</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=2>Puntos Acumulados</font></th>
              <th class="text-center" colspan="2"><FONT SIZE=1>Levantamiento De Sancion Y/O Observ</font></th>
              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
              <th class="text-center" rowspan="2"><FONT SIZE=2>Acciones</font></th>
                @endif
            </tr>
              <tr  align="center" valign="middle">
                <th><FONT SIZE=2>Inhabilitacion</font></th>
                <th><FONT SIZE=2>Multa</font></th>
                <th><FONT SIZE=2 width="1%">Número</font></th>
                <th><FONT SIZE=2 width="1%">Fecha</font></th>
                <th><FONT SIZE=2>Número OF/EXP/INF</font></th>
                <th><FONT SIZE=2 width="1%">Fecha</font></th>
              </tr>

          </thead>
          <tbody>
            @foreach ($ingresos2 as $ing2)


          <tr>

              <td ><FONT SIZE=2  width="1%">{{ $ing2->numeroa}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->nombre}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->numlicencia}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->tipoinfraccion}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->sancion}}</font></td>
              <td ><FONT SIZE=2  width="1%">{{ $ing2->multa}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->rdrnumero}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->rdrfecha}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->puntoacum}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->levoficio}}</font></td>
              <td ><FONT SIZE=2>{{ $ing2->levfecha}}</font></td>




              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
              <td width="5%">
                  
                  <a href="{{URL::action('Ingreso2Controller@edit', $ing2->numeroa)}}"><i class="fas fa-edit" title="Editar"></i> </a>
                  <a href="" data-target = "#modal-delete-{{$ing2->numeroa}}" data-toggle="modal" > <i class="far fa-trash-alt" title="Eliminar"></i></a>
               </td>
              @endif

          </tr>
          @include ('sistema.ingreso2.modal')
          @endforeach
          </tbody>

          <tfoot>
            <tr>
              <td class="text-center" width="1%"></td>
              <td class="text-center" width="10%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%" ></td>
              <th class="text-center" width="5%">Fecha</th>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></td>
              <th class="text-center" width="5%">Fecha</th></td>

                  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="1") || (Auth::user()->name =="administrador"))
                  <td class="text-center" width="5%">Acciones</td>
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
            "processing": true,

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
                
                'title': 'RECORD DE SANCIONES',
                exportOptions: {
                columns: [ 1, 2, 3, 4, 5, 6, 7, 9,10]
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
