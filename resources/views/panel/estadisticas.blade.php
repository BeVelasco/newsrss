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
    <div class="col-md-6 col-sm-6 col-lg-3 order-lg-1">

    <div class="card card-body pd-20 mg-t-10" style="height: 250px; overflow-y: auto; font-size:1vw;">
        <h6 class="slim-card-title mg-b-20">Estadísticas</h6>

        <div class="table-responsive table-responsive-sm">
          <table class="table table-striped mg-b-0 tx-13">
            <tbody>
            <tr>
                <td class="pd-l-20 tx-bold">
                    POR FUENTE
                </td>
                <td class="tx-center tx-bold">
                    TOTAL
                </td>
            </tr>
              <tr>
                <td class="pd-l-20">
                  Locales
                </td>
                <td class="tx-center">
                  {{ $html_locales[0]->num }}
                </td>
              </tr>

              <tr>
                <td class="pd-l-20">
                  Nacionales
                </td>
                <td class="tx-center">
                  {{ $html_nacionales[0]->num }}
                </td>
              </tr>

             <tr>
                <td class="pd-l-20 tx-bold">
                  Grupos de Facebook
                </td>
                <td class="tx-center">
                    {{ $facebook_grupos[0]->num }}
                </td>
             </tr>

             <tr>
                <td class="pd-l-20 tx-bold">
                    TOTAL DE FUENTES
                </td>
                <td class="tx-center">
                    {{ $facebook_grupos[0]->num + $html_nacionales[0]->num + $html_locales[0]->num }}
                </td>
            </tr>

            </tbody>
          </table>
        </div>
        </div><!-- card -->

        <div class="card card-body pd-20 mg-t-10" style="height: 250px; overflow-y: auto; font-size:1vw;">
            <div class="table-responsive table-responsive-sm">
                <table class="table table-striped mg-b-0 tx-13">
                <tbody>
                    <tr>
                        <td class="pd-l-20 tx-bold">
                            POR MEDIOS LOCALES
                        </td>
                        <td class="tx-center tx-bold">
                            TOTAL
                        </td>
                    </tr>
                    @php $count = 0; @endphp
                    @foreach($ConteoTotalLocales as $vconteotl)
                    <tr>
                        <td class="pd-l-20">
                        {{ $vconteotl->titulo }}
                        </td>
                        <td class="tx-center">{{ $vconteotl->noticias }}</td>
                    </tr>
                    @php $count = $count + $vconteotl->noticias; @endphp
                    @endforeach
                    <tr>
                        <td class="tx-center tx-15 tx-left"><b>TOTAL</b></td>
                        <td class="tx-center"> {{ $count }}</td>
                    </tr>
                </tbody>
              </table>
            </div>
      </div><!-- card -->

      <div class="card card-body pd-20 mg-t-10" style="height: 250px; overflow-y: auto; font-size:1vw;">
            <div class="table-responsive table-responsive-sm">
                <table class="table table-striped mg-b-0 tx-13">
                <tbody>
                    <tr>
                        <td class="pd-l-20 tx-bold">
                            POR MEDIOS NACIONALES
                        </td>
                        <td class="tx-center tx-bold">
                            TOTAL
                        </td>
                    </tr>
                    @php $count = 0; @endphp
                    @foreach($ConteoTotalNacionales as $vconteotn)
                    <tr>
                        <td class="pd-l-20">
                        {{ $vconteotn->titulo }}
                        </td>
                        <td class="tx-center">{{ $vconteotn->noticias }}</td>
                    </tr>
                    @php $count = $count + $vconteotn->noticias; @endphp
                    @endforeach
                    <tr>
                        <td class="tx-center tx-15 tx-left"><b>TOTAL</b></td>
                        <td class="tx-center"> {{ $count }}</td>
                    </tr>
                </tbody>
              </table>
            </div>
      </div><!-- card -->
    </div>

    <div class="col-md-6 col-lg-9 order-lg-1">
        {{-- ********************** Estan ocultos por motivos sentimentales ********************* --}}
      <div class="card card-body pd-20 mg-t-10 wt-100" hidden>
        <h6 class="slim-card-title mg-b-20">Medios monitoreados</h6>
        <div class="row">
            <div class="col-6">
                <span>Mensual</span>
                <div id="chartAreaMedios" class="dash-chartist"></div>
            </div>
            <div class="col-6">
                <span>Semanal</span>
                <div id="chartAreaMediosSemana" class="dash-chartist"></div>
            </div>
        </div>
      </div><!-- card -->
        {{-- ********************** Estan ocultos por motivos sentimentales ********************* --}}

        <div class="card card-body pd-20 mg-t-10 wt-100">
            <h6 class="slim-card-title mg-b-20">Noticias Medios Locales</h6>
            <div class="row">
                <div class="col-6">
                    <span>Mensual</span>
                    <div id="chartAreaLocales" class="dash-chartist"></div>
                </div>
                <div class="col-6">
                    <span>Semanal</span>
                    <div id="chartAreaLocalesSemanal" class="dash-chartist"></div>
                </div>
            </div>
        </div><!-- card -->

            <div class="card card-body pd-20 mg-t-10 wt-100">
                <h6 class="slim-card-title mg-b-20">Noticias Medios Nacionales</h6>
                <div class="row">
                    <div class="col-6">
                        <span>Mensual</span>
                        <div id="chartAreaNacionales" class="dash-chartist"></div>
                    </div>
                    <div class="col-6">
                        <span>Semanal</span>
                        <div id="chartAreaNacionalesSemanal" class="dash-chartist"></div>
                    </div>
                </div>
            </div><!-- card -->
        </div>
  </div>

  <div id="pre"></div>
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

  <script src="{{ asset('js/estadistica.js') }}"></script>
  @include('sweet::alert')
@endsection
