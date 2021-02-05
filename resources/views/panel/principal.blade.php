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
<div class="container">
<!--   <div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    </ol>
    <h6 class="slim-pagetitle">Inicio</h6>
  </div> --><!-- slim-pageheader -->

  <div class="row row-xs">
    <div class="col-md-6 col-lg-3 order-lg-1">

    {{-- <div class="card card-body pd-20 mg-t-10">
        <h6 class="slim-card-title mg-b-20">Conteo de noticias</h6>

        <div class="table-responsive">
          <table class="table table-striped mg-b-0 tx-13">
            <tbody>
              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes RSS
                </td>
                <td class="tx-center">
                  {{ $num_rss[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes RSS Locales
                </td>
                <td class="tx-center">
                  {{ $rss_locales[0]->num }}
                </td>
              </tr>
              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes RSS Nacionales
                </td>
                <td class="tx-center">
                  {{ $rss_nacionales[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes HTML
                </td>
                <td class="tx-center">
                  {{ $num_html[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes HTML Locales
                </td>
                <td class="tx-center">
                  {{ $html_locales[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes HTML NAcionales
                </td>
                <td class="tx-center">
                  {{ $html_nacionales[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes Twitter
                </td>
                <td class="tx-center">
                  {{ $twitter[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Noticias de Fuentes Facebook
                </td>
                <td class="tx-center">
                  {{ $facebook[0]->num }}
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div><!-- card --> --}}

      <div class="card card-body pd-20 mg-t-10">
        <h6 class="slim-card-title mg-b-20">Indicador de noticias Internacionales</h6>

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
              @foreach($ConteoTotalInternacional as $vconteot)
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

      <div class="card card-body pd-20 mg-t-10">
        <h6 class="slim-card-title mg-b-20">Indicador de noticias Nacionales</h6>

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
        <h6 class="slim-card-title mg-b-20">Inidcador de noticias al MES</h6>

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
        <h6 class="slim-card-title mg-b-20">Noticias registradas</h6>


        <div class="row mg-l-5">
          <div class="col-md-4 col-sm-4 wd-200 mg-b-30">
            <label>Fecha Incio</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                </div>
              </div>
              <input type="text"
                     id="fi"
                     name="fi"
                     class="form-control fc-datepicker"
                     placeholder="DD/MM/YYYY"
                     value="{{ $fechas[0]->fi }}"
              >
            </div>
          </div><!-- wd-200 -->

          <div class="col-md-4 col-sm-4 wd-200 mg-b-30">
            <label>Fecha Fin</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                </div>
              </div>
              <input type="text"
                     id="ff"
                     name="ff"
                     class="form-control fc-datepicker"
                     placeholder="DD/MM/YYYY"
                     value="{{ $fechas[0]->ff }}"
              >
            </div>
          </div><!-- wd-200 -->

        </div>

        <div class="row mg-l-5 mg-l-15">
          <input type="text"
                 id="palabra"
                 name="palabra"
                 placeholder="Ingresar palabra a buscar"
                 onkeypress="return Enter(event)"
          >
          <button onclick="busca();" class="mg-l-15">Buscar</button>
        </div>
        <div id="chartArea1" class="dash-chartist"></div>
        <table id="show" class="table table-responsive" style="height: 300px; overflow-y: scroll;padding:0;"></table>
      </div><!-- card -->

      <!-- <div class="card card-body pd-20 mg-t-10 wt-100">
        <h6 class="slim-card-title mg-b-20">Gráfico de noticias Mensuales</h6>
        <div class="row mg-l-5">

          <div class="col-md-4 col-sm-4 wd-200 mg-b-30">
            <label>Fecha Incio</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                </div>
              </div>
              <input type="text"
                     id="fi"
                     name="fi"
                     class="form-control fc-datepicker"
                     placeholder="DD/MM/YYYY"
                     value="{{ $fechas[0]->fi }}"
              >
            </div>
          </div>

          <div class="col-md-4 col-sm-4 wd-200 mg-b-30">
            <label>Fecha Fin</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                </div>
              </div>
              <input type="text"
                     id="ff"
                     name="ff"
                     class="form-control fc-datepicker"
                     placeholder="DD/MM/YYYY"
                     value="{{ $fechas[0]->ff }}"
              >
            </div>
          </div>

          <div class="col-md-4 col-sm-4 wd-200 mg-b-30">
            <div class="input-group">
              <div class="input-group-prepend">
              <button onclick="fechas();">Buscar</button>
              </div>
            </div>
          </div>
        </div>

        <div id="chartArea2" class="dash-chartist"></div>
      </div>card -->
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

  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/moment/js/moment.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/js/jquery-ui.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>

  <script src="{{ asset('js/principal.js') }}"></script>
  <script src="{{ asset('js/personal.js') }}"></script>
  @include('sweet::alert')
@endsection
