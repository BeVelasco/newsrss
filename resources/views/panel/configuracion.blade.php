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
              <h6 class="slim-pagetitle">Configuración</h6>
            </div><!-- slim-pageheader -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row mg-l-15 mg-r-15">
                            <div class="col-11">
                                <h6 class="slim-card-title tx-primary">Fuentes</h6>
                            </div>
                            <div class="col-1" >
                                <a href=""><i class = "icon ion-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="max-height: 25vw; overflow-y: scroll;">
                        <table class="table table-striped mg-b-0 tx-12">
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>URL</th>
                                    <th>Tipo</th>
                                    <th>Origen</th>
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
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                         <span> {{ $fuentes->links() }} </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                
            </div>
        </div>

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
@endsection
