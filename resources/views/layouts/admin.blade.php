<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Transportes</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
  <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="css/style.css">
    
    
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">




  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


</head>
<body>
<div id="page-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="http://drtcayacucho.gob.pe/">TRANSPORTES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            @if ((Auth::user()->name =='oficina1') || (Auth::user()->name =="administrador")|| (Auth::user()->oficina =="sin oficina"))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{url('/sistema/categoria')}}">Proceso de Sancion</a>
                        <a class="dropdown-item" href="{{url('/sistema/ingreso2')}}">Record de Sanciones</a>

                    </div>
                </li>
            @endif
            @if ((Auth::user()->name =='oficina2') || (Auth::user()->name =="administrador")|| (Auth::user()->oficina =="sin oficina"))
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Actas Control
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{{URL::action('Ingreso3Controller@index')}}">Registrar</a>


                  </div>
              </li>
              @endif
              @if ((Auth::user()->name =='oficina3') || (Auth::user()->name =="administrador"))
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Padron General
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{{URL::action('Ingreso3Controller@index')}}">Registrar</a>


                  </div>
              </li>
              @endif
              @if (Auth::user()->name =='administrador')
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Gestionar
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{{URL::action('UsuarioController@index')}}">Usuarios</a>


                  </div>
              </li>
            @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link disabled" >Usuario:  {{ Auth::user()->name }} </a>
                </li>

		        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownn" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/logout')}}">Salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <p>  <br/>
            <br/>
        </p>

    @yield('contenido')
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</div>
</body>
