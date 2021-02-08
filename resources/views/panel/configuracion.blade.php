@extends('base')

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('contenido')
    <input type="txt" name="cad" id="cad" value="" hidden="">
        <div class="slim-mainpanel">

            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              </ol>
              <h6 class="slim-pagetitle">Configuración</h6>
            </div><!-- slim-pageheader -->

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-11">
                                <h6 class="slim-card-title tx-primary">Fuentes</h6>
                            </div>
                            <div class="col-1" >
                                <a href="#">
                                    <i class = "icon ion-plus" onclick="showModalAdd( event );"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-striped">
                        <table class="table tx-12" >
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>URL</th>
                                    <th>Tipo</th>
                                    <th>Origen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fuentes as $vfuente)
                                    @php
                                        if($vfuente->tipo == 0) $ttipo = "RSS";
                                        else $ttipo = "HTML";

                                        if($vfuente->origen == 'L') $tfuente = "Local";
                                        else $tfuente = "Nacional";
                                    @endphp
                                    <tr>
                                        <td>{{ $vfuente->idesc }}</td>
                                        <td>{{ $vfuente->url }}</td>
                                        <td>{{ $ttipo }}</td>
                                        <td>{{ $tfuente }}</td>
                                        <td align="center">
                                            <a href="#">
                                                <i class = "icon ion-android-remove-circle" onclick="del({{ $vfuente->id }});"></i>
                                            </a>
                                            <a href="#">
                                                <i class = "icon ion-android-create mg-l-10" onclick="edit({{ $vfuente->id }})"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                        </div>
                         <span> {{ $fuentes->links() }} </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-11">
                                <h6 class="slim-card-title tx-primary">Palabras de busqueda general</h6>
                            </div>
                            <div class="col-1" >
                                <a href=""><i class = "icon ion-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table">
                                <table class="table">
                                    <thead>
                                        <td>Palabra</td>
                                    </thead>
                                    <tbody>
                                        @foreach($palabras as $vpalabras)
                                        @php
                                            $cadena = str_replace('\s',' ',$vpalabras->palabra);
                                        @endphp
                                        <tr>
                                            <td>{{ $cadena }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!--card-->

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-11">
                                <h6 class="slim-card-title tx-primary">Palabras de busqueda Especiales</h6>
                            </div>
                            <div class="col-1" >
                                <a href=""><i class = "icon ion-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table">
                                <table class="table">
                                    <thead>
                                        <td>Palabra</td>
                                    </thead>
                                    <tbody>
                                        @foreach($palabras as $vpalabras)
                                        @php
                                            $cadena = str_replace('\s',' ',$vpalabras->palabra);
                                        @endphp
                                        <tr>
                                            <td>{{ $cadena }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!--card-->

            </div>
        </div>

        </div> <!-- slim-mainpanel -->
    @include('modals.modalAddFuente')
    <div id="pre"></div>
@endsection

@section('js')
  <script src="{{ asset('plugins/popper.js/js/popper.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/chartist/js/chartist.js') }}"></script>
  <script src="{{ asset('plugins/chartist/js/chartist-plugin-pointlabels.js') }}"></script>
  <script src="{{ asset('plugins/parsleyjs/js/parsley.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('js/ResizeSensor.js') }}"></script>

  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/moment/js/moment.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/js/jquery-ui.js') }}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
  <script src="{{ asset('js/configuracion.js') }}"></script>
@endsection
