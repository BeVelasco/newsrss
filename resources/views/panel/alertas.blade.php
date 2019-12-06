@extends('base')

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('contenido')
<div class="container">

  <div class="row row-xs">
        <div class="card-header">
            <h6 class="slim-pagetitle">Alertas - Busqueda de palabras clave</h6>
          </div>
</div>
              <div class="row">
               <div class="col-md-12 mg-t-20 mg-md-t-0">
                 <div class="table-responsive">
                   <table class="table mg-b-0 tx-13">
                     <tr>
                      <th><h3>Internacional</h3></th>
                      <th></th>
                      <th colspan="2"></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>

                    <tr>
                      <td class="pd-y-5 tx-center  tx-15">Automatización</td>  
                      <td class="pd-y-5 tx-center  tx-15">Palabras claves</td>
                      <td class="pd-y-5 tx-center  tx-15">Noticia Internacional</td>
                      <td class="pd-y-5 tx-center  tx-15">Comunicación Social de Ayuntamiento</td>
                      <td class="pd-y-5 tx-center  tx-15">Gobierno</td>
                      <td class="pd-y-5 tx-center  tx-15">RRSS</td>
                    </tr>

                    <tr>
                      <td class="pd-y-5 tx-center">  <span class="square-8 bg-danger mg-r-5 rounded-circle"></span> Robot</td>
                      <td class="pd-y-5 tx-center">San Miguel de Allende Carteles Droga Narco</td>
                      <td class="pd-y-5 tx-center">Bloomberg</td>
                      <td class="pd-y-5 tx-center">?</td>
                      <td class="pd-y-5 tx-center">Comunicado de prensa</td>
                      <td class="pd-y-5 tx-center">Empresarios</td>
                    </tr>

                    <tr>
                      <td class="pd-y-5 tx-center"> <span class="square-8 bg-danger mg-r-5 rounded-circle"></span> Robot</td>
                      <td class="pd-y-5 tx-center">San Miguel de Allende Carteles Droga Narco</td>
                      <td class="pd-y-5 tx-center">Washington Post</td>
                      <td class="pd-y-5 tx-center">?</td>
                      <td class="pd-y-5 tx-center">Diario El Reforma</td>
                      <td class="pd-y-5 tx-center">Turistas</td>
                    </tr>
                   </table>
                   <br>

                   <table class="table mg-b-0 tx-13">
                     <tr>
                      <th ><h3>Nacional</h3></th>
                      <th></th>
                      <th colspan="2"></th>
                      <th> </th>
                      <th></th>
                      <th></th>
                    </tr>

                    <tr>
                      <td class="pd-y-5 tx-center  tx-15">Automatización</td>  
                      <td class="pd-y-5 tx-center  tx-15">Palabras claves</td>
                      <td class="pd-y-5 tx-center  tx-15">Noticia Nacionales</td>
                      <td class="pd-y-5 tx-center  tx-15">Comunicación Social de Ayuntamiento</td>
                      <td class="pd-y-5 tx-center  tx-15">Gobierno</td>
                      <td class="pd-y-5 tx-center  tx-15">RRSS</td>
                    </tr>

                    <tr>
                      <td class="pd-y-5 tx-center"> <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>Robot</td>
                      <td class="pd-y-5 tx-center">San Miguel de Allende Carteles Droga Narco</td>
                      <td class="pd-y-5 tx-center">Financiero</td>
                      <td class="pd-y-5 tx-center">?</td>
                      <td class="pd-y-5 tx-center">Comunicado de prensa</td>
                      <td class="pd-y-5 tx-center">Empresarios</td>
                    </tr>

                   </table>
                 </div>
                </div>
              </div><!-- row -->
            
  

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

  <script src="{{ asset('plugins/Chartf.js') }}"></script>
  <script src="{{ asset('plugins/chart.chartjs.js') }}"></script>
    <!--<script src="public/plugins/chartjs-plugin-piechart-outlabels.js"></script>-->
    <script src="{{ asset('plugins/chartjs-plugin-labels.js') }}"></script>
  @include('sweet::alert')
@endsection
