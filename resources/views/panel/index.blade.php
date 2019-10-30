@extends('base')

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('contenido')
<div class="container">
  <div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    </ol>
    <h6 class="slim-pagetitle">Inicio</h6>
  </div><!-- slim-pageheader -->

  <div class="row row-xs">
    <div class="col-md-6 col-lg-3 order-lg-1">
      <div class="card card-body pd-20 mg-t-10" style="height: 20vw;">
        <h6 class="slim-card-title mg-b-20">Inidcador de noticias TOTALES</h6>

        <div class="table-responsive">
          <table class="table mg-b-0 tx-13">
            <thead>
              <tr class="tx-10">
                <th class="wd-10p pd-y-5">Fuente</th>
                <th class="pd-y-5 tx-center"># Noticias</th>
              </tr>
            </thead>
            <tbody>
              @php $count = 0; @endphp 
              @foreach($ConteoTotal as $vconteot)
              <tr>
                <td class="pd-l-20">
                  {{ $vconteot->titulo }}
                </td>
                <td class="tx-center">{{ $vconteot->noticias }}</td>
              </tr>
              @php $count = $count + $vconteot->noticias; @endphp
              @endforeach
              <tr>
                <td class="tx-center tx-15 tx-left"><b>TOTAL</b></td>
                <td class="tx-center"> {{ $count }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!-- card -->  

      <div class="card card-body pd-20 mg-t-10" style="height: 20vw;">
        <h6 class="slim-card-title mg-b-20">Inidcador de noticias del MES</h6>

        <div class="table-responsive">
          <table class="table mg-b-0 tx-13">
            <thead>
              <tr class="tx-10">
                <th class="wd-10p pd-y-5">Fuente</th>
                <th class="pd-y-5 tx-center"># Noticias</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ConteoMes as $vconteo)
              <tr>
                <td class="pd-l-20">
                  {{ $vconteo->titulo }}
                </td>
                <td class="tx-center">{{ $vconteo->noticias }}</td>
              </tr>
              @endforeach
              <tr>

              </tr>
            </tbody>
          </table>
        </div>
      </div><!-- card -->  

    </div>

    <div class="col-md- col-lg-9 order-lg-1">
      <div class="card card-body pd-20 mg-t-10 wt-100">
        <h6 class="slim-card-title mg-b-20">Gráficos</h6>
        <div class="row">
          <input type="text" id="palabra" name="palabra">
          <button onclick="busca();">Buscar</button>
        </div>
        <div id="chartArea1" class="dash-chartist"></div>
      </div><!-- card -->
    </div>
  </div>

</div> <!-- container -->
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

  <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection