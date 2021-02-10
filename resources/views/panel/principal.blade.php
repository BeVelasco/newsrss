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

  <div class="row">
    <div class="col-3">

      <div class="card mg-t-10">
        <div class="card-header">
            <h6 class="slim-card-title tx-primary">Tipos Medios Digitales</h6>
        </div>

        <div class="card-body" style="height: 300px; overflow-y: auto; font-size:1vw;">
            <table class="table table-striped">
            <thead>
              <tr class="tx-10">
                <th class="wd-10p pd-y-5">Tipo</th>
                <th class="pd-y-5 tx-center"># Medios</th>
              </tr>
            </thead>

            <tbody id="tbmediosP">
            </tbody>

          </table>
        </div>
      </div><!-- card -->

      <div class="card mg-t-10">
        <div class="card-header">
            <h6 class="slim-card-title tx-primary">Medios Digitales</h6>
        </div>

        <div class="card-body" style="height: 300px; overflow-y: auto; font-size:1vw;">
            <table class="table table-striped">
            <thead>
              <tr class="tx-10">
                <th class="wd-10p pd-y-5">Tipo</th>
                <th class="pd-y-5 tx-center"># Medios</th>
              </tr>
            </thead>

            <tbody id="tbtipos">
            </tbody>

          </table>
        </div>
      </div><!-- card -->

    </div>

    <div class="col-9">
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
        <hr>
        <table id="show" class="table table-responsive" style="height: 300px; overflow-y: auto; padding:0;">
        </table>
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

  <script src="{{ asset('plugins/jquery.cookie/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('plugins/moment/js/moment.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/js/jquery-ui.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>

  <script src="{{ asset('js/principal.js') }}"></script>
  <script src="{{ asset('js/personal.js') }}"></script>
  @include('sweet::alert')
@endsection
