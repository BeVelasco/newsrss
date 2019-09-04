<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RSS Noticias</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/news.js') }}"></script>
        
    </head>
    <body>
        <input type="txt" name="cad" id="cad" value="" hidden="">
    <div>
        <div class="card-header">
            <div class="row">
                <div class="col-md-2"><h1>Noticias</h1></div>
                <div class="col-md-6"><p align="justify">
                    Robot de busqueda de información de noticias en servicios RSS y HTML de periódicos digitales
                    </p></div>
                <div class="col-md-4">
                    <!--<input size="30" type="txt" name="txt" id="txt" value="SAN MIGUEL DE ALLENDE" readonly="">

                    <button type="button" class="btn btn-primary" id="buscar" name="buscar">Buscar</button>-->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8" style="max-height: 35vw; overflow-y: scroll;">
                    <table class="table">
                        <thead>
                        <tr> <!-- Fila -->
                            <th>Periódico</th>
                            <th>Fecha</th>
                            <!--<th>Extracto</th>-->
                            <th>URL</th>
                            <th>Captura</th>
                        </tr>
                        </thead>
                        @php
                            $sql = "SELECT * FROM web WHERE web.`created_at` >= DATE_ADD(CURDATE(), INTERVAL -3  DAY)
ORDER BY web.`created_at` DESC";
                            $rs = DB::SELECT($sql);
                            foreach($rs as $row){
                        @endphp
                            <tr>
                                <td>{{ $row->titulo }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td><a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a></td>
                                <td><button type="button" class="btn btn-primary" data-html="{{$row->content}}" id="ver{{$row->id}}" onclick="muestra({{$row->id}})">Ver</button></td>
                            </tr>
                        @php
                        }
                        @endphp
                    </table>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Lista de periódicos monitoreados</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                @php
                                    $sql = 'SELECT * FROM fuentes';
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

            </div> <!-- ROW -->
        </div>
    </div>

    <div id="pre"></div>
    </body>
</html>
