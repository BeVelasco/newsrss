<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gráficos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


        <script src="https://d3js.org/d3.v5.js"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/graficos.js') }}"></script>

    </head>
    <body>
        <input type="txt" name="cad" id="cad" value="" hidden="">
    <div>
        <div class="card-header">
            <div class="row">
                <div class="col-md-2"><h1>Grafico D3</h1></div>
                <div class="col-md-6"><p align="justify">
                    Area Grafico D3
                    </p></div>
                <div class="col-md-4">
                </div>
            </div>
            {{-- *************************** Area de grafico *********************************** --}}
            <div class="row">

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-10 text-center">
                    <div id="gd3">
                    </div>
                </div>
            </div> <!-- ROW -->
        </div>
    </div>

    <div id="pre"></div>
    </body>
</html>
