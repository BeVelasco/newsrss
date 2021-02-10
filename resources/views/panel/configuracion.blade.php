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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-11">
                                    <h6 class="slim-card-title tx-primary">Palabra de busqueda</h6>
                                </div>
                                <div class="col-1" >
                                    {{-- <a href=""><i class = "icon ion-plus"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height: 300px; overflow-y: scroll;">
                            <div class="table-responsive table-striped">
                                 <table class="table" >
                                    <thead>
                                        <th width="85%">Palabra</th>
                                        <th width="15%" class="text-center">Acciones</th>
                                    </thead>
                                    <tbody id="tbpalabra">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!--card-->
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-11">
                                    <h6 class="slim-card-title tx-primary">Usuarios</h6>
                                </div>
                                <div class="col-1" >
                                    <a href="#">
                                        <i class = "icon ion-plus" onclick="showModalAddU( event );"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height: 300px; overflow-y: scroll;">
                            <div class="table-responsive table-striped">
                                 <table class="table" >
                                    <thead>
                                        <th width="85%">Nombre</th>
                                        <th width="15%" class="text-center">Estatus</th>
                                        <th width="15%" class="text-center">Acciones</th>
                                    </thead>
                                    <tbody id="tbuser">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!--card-->
                </div>
            </div>

            <div class="row mg-t-30">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-11">
                                    <h6 class="slim-card-title tx-primary">Fuentes Medios Digitales</h6>
                                </div>
                                <div class="col-1" >
                                    <a href="#">
                                        <i class = "icon ion-plus" onclick="showModalAdd( event );"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height: 300px; overflow-y: scroll;">
                            <div class="table-responsive table-striped">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th width="15%">Descripcion</th>
                                        <th width="40%">URL</th>
                                        <th width="10%">Tipo</th>
                                        <th width="10%">Origen</th>
                                        <th width="10%">Estatus</th>
                                        <th width="15%" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbfuentes">
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- slim-mainpanel -->
    @include('modals.modalAddFuente')
    @include('modals.modalModFuente')
    @include('modals.modalModPalabra')
    @include('modals.modalAddUser')
    @include('modals.modalModUser')

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
