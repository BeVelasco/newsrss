@extends('base')

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
  <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('contenido')
    <input type="txt" name="cad" id="cad" value="" hidden="">
        <div class="slim-mainpanel">

            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              </ol>
              <h6 class="slim-pagetitle">Primeras Planas - Senadro Alejandro Armenta</h6>
            </div><!-- slim-pageheader -->

            <div class="container">
                <div class="row">
                    <div class="col-6 tx-left">
                        {{-- <a href="{{ route('pdfDiarios') }}">
                            <button class="btn btn-outline-secondary">PDF</button>
                        </a> --}}
                        <a href="#" id="btn8am">
                            <button class="btn btn-outline-secondary">Hoy 8:00 A.M.</button>
                        </a>
                        <a href="#" id="btnActual">
                            <button class="btn btn-outline-secondary">Actual</button>
                        </a>
                    </div>
                    <div class="col-6 tx-center">
                    </div>
                </div>
                <div class="row tx-center">
                    <div class="col-md-12 col-sm-12" id="reporte">
                    </div>
                    <div class="col-md-12 col-sm-12" id="alvuelo">

                    </div>
                </div>

            </div> <!-- Container -->
        </div> <!-- slim-mainpanel -->

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

  {{-- <script src="{{ asset('js/principal.js') }}"></script> --}}

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
  <script src="{{ asset('js/periodico.js') }}"></script>
@endsection
