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
                    Robot de busqueda de información de noticias en servicios RSS de los periodicos: <i>DIARIO DE QUERÉTARO, EL SOL DE SAN JUAN DEL RIO y AM DE QUERÉTARO </i>
                    </p></div>
                <div class="col-md-4">
                    <!--<input size="30" type="txt" name="txt" id="txt" value="SAN MIGUEL DE ALLENDE" readonly="">

                    <button type="button" class="btn btn-primary" id="buscar" name="buscar">Buscar</button>-->
                </div>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-4"> 
                    <h2>DIARIO DE QUERÉTARO</h2>
                    @php
                        //$feed = Feed::loadRss('https://threatpost.com/feed');
                        /*
                            https://www.elnorte.com/rss/negocios.xml
                            https://www.elnorte.com/rss/estados.xml
                            https://www.elnorte.com/rss/seguridad.xml
                        */
                        $feed = Feed::loadRss('https://www.diariodequeretaro.com.mx/rss.xml');
                        //dd();
                    

                    foreach($feed->item as $item){
                        if(preg_match('//', $item-> description)) {
                    @endphp
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ $item->link }}">{{ $item->title }} </a>
                            </div>
                            <div class="card-body">
                                {{ $item-> description }}
                            </div>
                        </div><br>
                    @php
                        }
                    }
                    @endphp
                    
                </div>

                <div class="col-md-4"> 
                    <h2>EL SOL DE SAN JUAN DEL RIO</h2>
                    @php
                        //$feed = Feed::loadRss('https://threatpost.com/feed');
                        /*
                            https://www.elnorte.com/rss/negocios.xml
                            https://www.elnorte.com/rss/estados.xml
                            https://www.elnorte.com/rss/seguridad.xml
                        */
                        $feed = Feed::loadRss('https://www.elsoldesanjuandelrio.com.mx/rss.xml');
                        //dd();
                    

                    foreach($feed->item as $item){
                        if(preg_match('//', $item-> description)) {
                    @endphp
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ $item->link }}">{{ $item->title }} </a>
                            </div>
                            <div class="card-body">
                                {{ $item-> description }}
                            </div>
                        </div><br>
                    @php
                        }
                    }
                    @endphp
                    
                </div>

                <div class="col-md-4"> 
                    <h2>AM DE QUERÉTARO</h2>
                    @php
                        //$feed = Feed::loadRss('https://threatpost.com/feed');
                        $feed = Feed::loadRss('https://amqueretaro.com/feed');
                        //dd($feed);
                    
                        foreach($feed->item as $item){
                        if(preg_match('//', $item-> description)) {
                    @endphp
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ $item->link }}">{{ $item->title }} </a>
                        </div>
                        <div class="card-body">
                             @php
                                $cad = explode('</a>', $item->description);
                                //dd($cad);
                                if(count($cad)==1){
                                    echo $cad[0];
                                } else {
                                    echo $cad[1];
                                }
                            @endphp
                        </div>
                    </div><br>
                   @php
                        }
                    }
                    @endphp
                    
                </div>
                
            </div>
        </div>
    </div>
    </body>
</html>
