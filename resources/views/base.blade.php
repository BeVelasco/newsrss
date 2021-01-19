<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="chrome">
    <head>
        <title>Robot AAM</title>

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>

        @include('componentes.head')
        @yield('css')
    </head>
    <body>
        <div id="spinner-back"></div>
        <div id="spinner-front">
        <img src="{{ asset('img/ajax-loader.gif') }}"/><br>
            Procesando...
        </div>
        <div class="slim-header">
            <div class="container">
                <div class="slim-header-left">
                    @include('componentes.logoIzquierda')
                </div>

                <div class="slim-header-center">
                    <h4 style="font-size:1vw;">CENTRO DE MONITOREO DE MEDIOS Y REDES SOCIALES - Senador Alejandro Armenta</h4>
                    <a href="{{ route('monitor') }}">
                        <button type="button" class="btn-primary">Monitor</button></a>
                    <a href="{{ route('home') }}">
                        <button type="button" class="btn-primary">Panel general</button></a>
                    <a href="{{ route('estadisticas') }}">
                        <button type="button" class="btn-primary">Estadisticas</button></a>
                    {{-- <a href="{{ route('semaforizacion') }}">
                        <button type="button" class="btn-primary">Semaforización</button></a>
                    <a href="{{ route('alertas') }}">
                        <button type="button" class="btn-primary">Alertas</button></a> --}}
                </div>

                <div class="slim-header-right">
                    <div class="dropdown dropdown-c">
                        @include('componentes.menuUsuario')
                    </div>
                </div>
            </div>
        </div>

        {{-- Contenido --}}
        <div class="slim-mainpanel">
            <div class="container">
                @if(Session::has('alertaError'))
                    @include('componentes.alertaError')
                @endif
                @yield('contenido')
            </div>
        </div>
        {{-- Footer --}}
        <div class="slim-footer">
            <div class="container">
                <p>Copyright 2019 &copy; All Rights Reserved.</p>
                <p>Designed by: <a href="http://www.integraideasconsultores.com">Integra Ideas Consultores</a></p>
            </div>
        </div>
        @yield('js')
    </body>
        @yield('modales')
</html>
