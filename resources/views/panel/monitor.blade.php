@extends('base')

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.css') }}">

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
              <h6 class="slim-pagetitle">Monitor Medios Digitales</h6>
            </div><!-- slim-pageheader -->

            <div class="container">

                <div class="row"> <!-- ----------------------------------------------------------- -->
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Medios Digitales</h6>
                            </div>
                            <div class="card-body" style="height: 200px; overflow-y: auto; font-size:1vw;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Medios</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbmedios">

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Card -->

                        <div class="card mg-t-10">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Fuente/Tipo Medios Digitales </h6>
                            </div>
                            <div class="card-body" style="height: 250px; overflow-y: auto; font-size:1vw;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Medio Digital</th>
                                            <th>Fuente/Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbft">

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Card -->

                    </div>

                    <div class="col-8">
                        <div class="card ">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Resumen noticias 30 días</h6>
                            </div>
                            <div class="card-body" style="height: 500px; overflow-y: auto; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr> <!-- Fila -->
                                        <th>Periódico</th>
                                        <th>Fecha</th>
                                        <th>URL</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbresumen">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tx-primary mg-l-15 pd-y-15 bg-transparent ">
                    </div><!-- card-footer -->
                </div> <!-- ROW -->

            </div> <!-- Container -->
        </div> <!-- slim-mainpanel -->

    <div id="pre"></div>
@endsection

@section('js')
  <script src="{{ asset('plugins/popper.js/js/popper.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/parsleyjs/js/parsley.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('js/ResizeSensor.js') }}"></script>

  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/moment/js/moment.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/js/jquery-ui.js') }}"></script>

  <script src="{{ asset('js/monitor.js') }}"></script>

  <script src="{{ asset('js/news.js') }}"></script>
@endsection
