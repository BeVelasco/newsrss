@extends('base')

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('contenido')
    <input type="txt" name="cad" id="cad" value="" hidden="">
        <div class="slim-mainpanel">

            <div class="slim-pageheader">
              <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              </ol>
              <h6 class="slim-pagetitle">Monitoreo - SAN MIGUEL DE ALLENDE</h6>
            </div><!-- slim-pageheader -->

            <div class="container">

                <div class="row"> <!-- ----------------------------------------------------------- -->
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Medios Internacionales</h6>
                            </div>
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped">
                                    @php
                                        $sql = 'SELECT UPPER(f.idesc) as idesc FROM fuentes as f WHERE f.origen = "I"';
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                    @endphp
                                    <tr>
                                        <td>{{ $row->idesc }}</td>
                                    </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="card ">
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr> <!-- Fila -->
                                        <th>Periódico</th>
                                        <th>Fecha</th>
                                        <!--<th>Extracto</th>-->
                                        <th>URL</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $cont = 0;
                                        $sql = "SELECT *
                                                FROM web AS w
                                                WHERE w.`created_at` >= DATE_ADD(CURDATE(), INTERVAL -2 YEAR)
                                                AND w.`titulo` IN (SELECT f.idesc
                                                FROM fuentes AS f
                                                WHERE f.`origen` = 'I')
                                                ORDER BY w.`created_at` DESC;";
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                        $cont = $cont + 1;
                                    @endphp
                                        <tr>
                                            <td>{{ $row->titulo }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td align="justify"><a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a></td>

                                        </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tx-primary mg-l-15 pd-y-15 bg-transparent ">
                        <h6>TOTAL NOTICIAS DE MEDIOS LOCALES:  {{ $cont }}</h6>
                    </div><!-- card-footer -->
                </div> <!-- ROW -->
                <hr>
                <div class="row mg-t-15"> <!-- ----------------------------------------------------------- -->
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Medios Nacionales</h6>
                            </div>
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    @php
                                        $sql = 'SELECT UPPER(f.idesc) as idesc FROM fuentes as f WHERE f.origen = "N"';
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                    @endphp
                                    <tr>
                                        <td>{{ $row->idesc }}</td>
                                    </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr> <!-- Fila -->
                                        <th>Periódico</th>
                                        <th>Fecha</th>
                                        <!--<th>Extracto</th>-->
                                        <th>URL</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $cont = 0;
                                        $sql = "SELECT *
                                                FROM web AS w
                                                WHERE w.`created_at` >= DATE_ADD(CURDATE(), INTERVAL -2 YEAR)
                                                AND w.`titulo` IN (SELECT f.idesc
                                                FROM fuentes AS f
                                                WHERE f.`origen` = 'N')
                                                ORDER BY w.`created_at` DESC;";
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                        $cont = $cont + 1;
                                    @endphp
                                        <tr>
                                            <td>{{ $row->titulo }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td align="justify"><a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a></td>

                                        </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="tx-primary mg-l-15 pd-y-15 bg-transparent ">
                        <h6>TOTAL NOTICIAS DE MEDIOS NACIONALES:  {{ $cont }}</h6>
                    </div><!-- card-footer -->
                </div> <!-- ROW -->
                <hr>

                <div class="row mg-t-15"> <!-- ----------------------------------------------------------- -->
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Twitter</h6>
                            </div>
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    @php
                                        $sql = 'SELECT UPPER(f.idesc) as idesc FROM fuentes as f WHERE f.origen = "T"';
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                    @endphp
                                    <tr>
                                        <td>{{ $row->idesc }}</td>
                                    </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr> <!-- Fila -->
                                        <th>Periódico</th>
                                        <th>Fecha</th>
                                        <!--<th>Extracto</th>-->
                                        <th>URL</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $cont = 0;
                                        $sql = "SELECT *
                                                FROM web AS w
                                                WHERE w.`created_at` >= DATE_ADD(CURDATE(), INTERVAL -3 YEAR)
                                                AND w.`titulo` IN (SELECT f.idesc
                                                FROM fuentes AS f
                                                WHERE f.`origen` = 'T')
                                                ORDER BY w.`created_at` DESC;";
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                        $cont = $cont + 1;
                                    @endphp
                                        <tr>
                                            <td>{{ $row->titulo }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td align="justify"><a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a></td>

                                        </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tx-primary mg-l-15 pd-y-15 bg-transparent ">
                        <h6>TOTAL NOTICIAS DE TWITTER:  {{ $cont }}</h6>
                    </div><!-- card-footer -->
                </div> <!-- ROW -->
                <hr>
                <div class="row mg-t-15"> <!-- ----------------------------------------------------------- -->
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="slim-card-title tx-primary">Facebook</h6>
                            </div>
                            <div class="card-body" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                                <table class="table table-striped table-sm">
                                    @php
                                        $sql = 'SELECT UPPER(f.idesc) as idesc FROM fuentes as f WHERE f.origen = "F"';
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                    @endphp
                                    <tr>
                                        <td>{{ $row->idesc }}</td>
                                    </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6" style="max-height: 15vw; overflow-y: scroll; font-size:1vw;">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr> <!-- Fila -->
                                        <th>Periódico</th>
                                        <th>Fecha</th>
                                        <!--<th>Extracto</th>-->
                                        <th>URL</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $cont = 0;
                                        $sql = "SELECT *
                                                FROM web AS w
                                                WHERE w.`created_at` >= DATE_ADD(CURDATE(), INTERVAL -2 YEAR)
                                                AND w.`titulo` IN (SELECT f.idesc
                                                FROM fuentes AS f
                                                WHERE f.`origen` = 'F')
                                                ORDER BY w.`created_at` DESC;";
                                        $rs = DB::SELECT($sql);
                                        foreach($rs as $row){
                                        $cont = $cont + 1;
                                    @endphp
                                        <tr>
                                            <td>{{ $row->titulo }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td align="justify"><a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a></td>

                                        </tr>
                                    @php
                                    }
                                    @endphp
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tx-primary mg-l-15 pd-y-15 bg-transparent ">
                        <h6>TOTAL NOTICIAS DE FACEBOOK:  {{ $cont }}</h6>
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
  <script src="{{ asset('plugins/chartist/js/chartist.js') }}"></script>
  <script src="{{ asset('plugins/chartist/js/chartist-plugin-pointlabels.js') }}"></script>
  <script src="{{ asset('plugins/parsleyjs/js/parsley.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('js/ResizeSensor.js') }}"></script>

  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/moment/js/moment.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/js/jquery-ui.js') }}"></script>

  <script src="{{ asset('js/principal.js') }}"></script>

  <script src="{{ asset('js/news.js') }}"></script>
@endsection
