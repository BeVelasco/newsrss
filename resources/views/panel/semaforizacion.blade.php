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

  <div class="row row-xs">
        <div class="card-header">
                <h6 class="slim-pagetitle">Semaforización - Busqueda de palabras clave</h6>
              </div>
            <div class="section-wrapper mg-t-20">

              <div class="row">
                <div class="col-md-12 mg-t-20 mg-md-t-0">
                  <div class="bd pd-t-30 pd-b-20 pd-x-20">
                    <canvas id="chart-area" style="max-width: 200;max-height: 200"></canvas>
                    <!-- <canvas id="chartDonut" height="200"></canvas> -->
                  </div><br>
                  <div>
                    <div class="table-responsive">
                      <table class="table mg-b-0 tx-13">
                        <thead>
                          <tr class="tx-10">
                            <th class="wd-20p pd-y-5 tx-center">Tema</th>
                            <th class="pd-y-5 tx-center" >Acciones de Gobierno</th>
                            <th class="pd-y-5 tx-center" >Incurrencias</th>
                            <th colspan="3" class="pd-y-5 tx-center" >Impacto</th>
                            <th colspan="3" class="pd-y-5 tx-center" >Cobertura</th>
                            <th colspan="2" class="pd-y-5 tx-center" >Reacción en redes sociales</th>
                            <th class="pd-y-5 tx-center" >Medición en días</th>
                          </tr>
                          <tr class="tx-10">
                            <th colspan="3" class="wd-20p pd-y-5 tx-center"></th>
                            <th class="pd-y-5 tx-center" >Local</th>
                            <th class="pd-y-5 tx-center" >Nacional</th>
                            <th class="pd-y-10 tx-center" >Internacional</th>
                            <th class="pd-y-5 tx-center" >Local</th>
                            <th class="pd-y-5 tx-center" >Nacional</th>
                            <th class="pd-y-10 tx-center" >Internacional</th>
                            <th class="pd-y-5 tx-center" >Actual</th>
                            <th class="pd-y-5 tx-center" >Resultado</th>
                            <th class="pd-y-5 tx-center" ></th>
                            <th class="pd-y-5 tx-center" ></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="tx-center">
                              <span>Obra pública</span>
                            </td>
                            <td class="tx-center">Estrategias de Movilidad</td>
                            <td class="tx-center">231</td>
                            <td class="tx-center">217</td>
                            <td class="tx-center">14</td>
                            <td class="tx-center">0</td>
                            <td class="tx-center">27</td>
                            <td class="tx-center">15</td>
                            <td class="tx-center">0</td>


                            <td class="tx-center">alegría, enojo, molestia</td>
                            <td class="tx-center">aceptación, gusto, enojo</td>
                            <td class="tx-center">70</td>
                          </tr>
                          <tr>
                            <td class="tx-center">
                              <span>Presidente</span>
                            </td>
                            <td class="tx-center">Posicionamiento</td>
                            <td class="tx-center">231</td>
                            <td class="tx-center">223</td>
                            <td class="tx-center">8</td>
                            <td class="tx-center">0</td>
                            <td class="tx-center">26</td>
                            <td class="tx-center">18</td>
                            <td class="tx-center">0</td>

                            <td class="tx-center">aceptación, rechazo</td>
                            <td class="tx-center">aceptación, rechazo</td>
                            <td class="tx-center">70</td>

                          </tr>
                          <tr>
                            <td class="tx-center">
                              <span>Inseguridad</span>
                            </td>
                            <td class="tx-center">Estrategias de Acompañamiento Ciudadano</td>
                            <td class="tx-center">172</td>
                            <td class="tx-center">142</td>
                            <td class="tx-center">30</td>
                            <td class="tx-center">0</td>
                            <td class="tx-center">25</td>
                            <td class="tx-center">30</td>
                            <td class="tx-center">0</td>

                            <td class="tx-center">indignación, temor, enojo</td>
                            <td class="tx-center">gusto, enojo</td>
                            <td class="tx-center">70</td>

                          </tr>
                          <tr>
                            <td class="tx-center">
                              <span>Violencia</span>
                            </td>
                            <td class="tx-center">Estrategias de formación ciudadana</td>
                            <td class="tx-center">103</td>
                            <td class="tx-center">84</td>
                            <td class="tx-center">19</td>
                            <td class="tx-center">0</td>
                            <td class="tx-center">18</td>
                            <td class="tx-center">7</td>
                            <td class="tx-center">0</td>

                            <td class="tx-center">miedo, temor, enojo</td>
                            <td class="tx-center">miedo, gusto</td>
                            <td class="tx-center">70</td>
                          </tr>
                          <tr>
                            <td class="tx-center">
                              <span>Narco</span>
                            </td>
                            <td class="tx-center">Estrategias de Sensibilización y contrareplica</td>
                            <td class="tx-center">76</td>
                            <td class="tx-center">65</td>
                            <td class="tx-center">11</td>
                            <td class="tx-center">2</td>
                            <td class="tx-center">22</td>
                            <td class="tx-center">14</td>
                            <td class="tx-center">1</td>

                            <td class="tx-center">temor, tristeza, miedo</td>
                            <td class="tx-center">gusto, enojo</td>
                            <td class="tx-center">70</td>
                          </tr>
                          <tr>
                            <td class="tx-center">
                              <span>Otros</span>
                            </td>
                            <td class="tx-center">Programas de asistencia y apoyo social</td>
                            <td class="tx-center">127</td>
                            <td class="tx-center">114</td>
                            <td class="tx-center">13</td>
                            <td class="tx-center">0</td>
                            <td class="tx-center">58</td>
                            <td class="tx-center">26</td>
                            <td class="tx-center">0</td>

                            <td class="tx-center">N/A</td>
                            <td class="tx-center">N/A</td>
                            <td class="tx-center">70</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h3>Nota:</h3>
                            Los datos encontrados  del Presidente municipal  Luis Alberto Villarreal García y la obra pública
                            reflejan el mismo número de porcentajes ya que  están estrechamente  relacionados y  se observa la
                            postura de las acciones de gobierno que  realiza la actual administración<br><br>

                            La postura oficial  por parte del ayuntamiento es pro activa, dando  a conocer las
                            obras públicas que se han realizado así como los eventos  culturales y artísticos del
                            municipales<br><br>

                            El ayuntamiento de San Miguel de Allende no fija una postura oficial  por medio de
                             boletines de prensa en eventos o situaciones relacionadas con los temas de inseguridad.<br>
                        </div>
                    </div>

                  </div>
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- section-wrapper -->
  </div>

</div> <!-- container -->
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

    <script src="{{ asset('plugins/Chartf.js') }}"></script>
    <script src="{{ asset('plugins/chart.chartjs.js') }}"></script>
    <!--<script src="public/plugins/chartjs-plugin-piechart-outlabels.js"></script>-->
    <script src="{{ asset('plugins/chartjs-plugin-labels.js') }}"></script>
    <script src="{{ asset('js/semaforo.js') }}"></script>
  @include('sweet::alert')
@endsection
