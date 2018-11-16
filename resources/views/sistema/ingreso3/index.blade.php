@extends ('layouts.admin')
@section ('contenido')
</div>
@if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador")|| (Auth::user()->oficina =="sin oficina"))
<h4 class="text-center">ANEXO-3</h4><h4
        class="text-center">RELACION DE ACTAS DE CONTROL IMPUESTAS EN OPERATIVOS INOPINADOS </h4>
<div class="table-responsive-sm">
@if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador"))
<div class="row">
  <div class="col-md-12 col-md-offset-2"><a
          onclick="return abrir_modal('','Registro de conductor nuevo')"
          class="btn btn-success btn-sm float-right" href="{{URL::action('Ingreso3Controller@create')}}">Registro Nuevo</a></div>
</div>
@endif
<div class="">
  <div class="col-lg-12">
      <table id="tabla" class="table table-condensed table-bordered dt-responsive table-hover" cellspacing="0" width="100%">
          <thead class="thead-dark">
            <tr align="center" valign="middle">
              <th class="text-center" width="1%" rowspan="2"><FONT SIZE=1>N°</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>N°Acta</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Fecha</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Placa del Vehiculo</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Servicio que presta</font></th>
              <th class="text-center" rowspan="2" width="1%"><FONT SIZE=1>Lugar</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Nombre o Razon Social</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Apellidos y Nombre del Conductor</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Domicilio</font></th>
              <th class="text-center" colspan="2"><FONT SIZE=1>Infraccion</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Documento Retenido</font></th>
              <th class="text-center" rowspan="2"><FONT SIZE=1>Inspector</font></th>

              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador"))
              <th class="text-center" rowspan="2"><FONT SIZE=1>Acciones</font></th>
                @endif
            </tr>
              <tr  align="center" valign="middle">
                <th><FONT SIZE=1>Motivo</font></th>
                <th><FONT SIZE=1>Código</font></th>

              </tr>

          </thead>
          <tbody>
            @foreach ($ingresos3 as $ing3)


          <tr>


              <td ><FONT SIZE=1>{{ $ing3->numero}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->numacta}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->fecha}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->placavehiculo}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->servicio}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->lugar}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->razonsocial}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->nombre}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->domicilio}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->motivo}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->codigo}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->documentoret}}</font></td>
              <td ><FONT SIZE=1>{{ $ing3->inspector}}</font></td>




              @if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador"))
              <td width="5%">
                 
                   <a href="{{URL::action('Ingreso3Controller@edit', $ing3->numero)}}"><i class="fas fa-edit" title="Editar"></i></a>
                  <a href="" data-target = "#modal-delete-{{$ing3->numero}}" data-toggle="modal" > <i class="far fa-trash-alt" title="Eliminarr"></i> </a>
             </td>
              @endif

          </tr>
          @include ('sistema.ingreso3.modal')
          @endforeach
          </tbody>

          <tfoot>
            <tr>
              <td class="text-center" width="1  %"></td>
              <td class="text-center" width="5%"></td>
              <th class="text-center" width="7%">Fecha</td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="10%"></td>
              <td class="text-center" width="6%"></td>
              <td class="text-center" width="8%"></td>
              <td class="text-center" width="13%"></td>
              <td class="text-center" width="13%"></th>
              <td class="text-center" width="13%"></td>
              <td class="text-center" width="5%"></td>
              <td class="text-center" width="5%"></th></td>
              <th class="text-center" width="5%">Inspector</th></td>


                  @if ((Auth::user()->role ==1 && Auth::user()->oficina =="2") || (Auth::user()->name =="administrador"))
                  <td class="text-center"  width="5%">Acciones</td>
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
                    $(this).html( '<FONT SIZE=1><input type="text" size="8" placeholder="Buscar '+title+'" />' );
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
