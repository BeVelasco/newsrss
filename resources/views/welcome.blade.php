<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RSS Noticias</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="card-header">
            <h1>Noticias</h1>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-4 d-flex flex-column h-50"> 
                    <h2>Reforma Negocios</h2>
                    @php
                        //$feed = Feed::loadRss('https://threatpost.com/feed');
                        $feed = Feed::loadRss('https://www.reforma.com/rss/negocios.xml');
                        //dd();
                    @endphp

                    @foreach($feed->item as $item)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ $item->link }}">{{ $item->title }} </a>
                        </div>
                        <div class="card-body">
                            {{ $item-> description }}
                        </div>
                    </div><br>
                    @endforeach
                    
                </div>

                <div class="col-md-4 d-flex flex-column h-50"> 
                    <h2>El Universal</h2>
                    @php
                        //$feed = Feed::loadRss('https://threatpost.com/feed');
                        $feed = Feed::loadRss('http://www.eluniversal.com.mx/rss/universalmxm.xml');
                        //dd($feed);
                    @endphp

                    @foreach($feed->item as $item)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ $item->link }}">{{ $item->title }} </a>
                        </div>
                        <div class="card-body">
                            @php

                                $cad = explode('>', $item->description);
                                //dd($cad);
                                if(count($cad)==1){
                                    echo $cad[0].'>'; echo '<br>'; echo $cad[0];
                                } else {
                                    echo $cad[0].'>'; echo '<br>'; echo $cad[1];
                                }
                            @endphp

                        </div>
                    </div><br>
                    @endforeach
                    
                </div>

                <div class="col-md-4 d-flex flex-column h-50"> 
                    <h2>El Informador</h2>
                    @php
                        //$feed = Feed::loadRss('https://threatpost.com/feed');
                        $feed = Feed::loadRss('https://www.informador.mx/rss/economia.xml');
                        //dd($feed);
                    @endphp

                    @foreach($feed->item as $item)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ $item->link }}">{{ $item->title }} </a>
                        </div>
                        <div class="card-body">
                            {{ $item-> description }}
                        </div>
                    </div><br>
                    @endforeach
                    
                </div>
                
            </div>
        </div>

    </body>
</html>
