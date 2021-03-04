<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="chrome">
    <head>
        <title>Robot Eduardo Rivera Pérez</title>

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
            <div class="container" style="background-image: url('{{ asset('img/banner_monitor.png') }}'); background-size: cover;">
                <div class="slim-header-left">
                    {{-- @include('componentes.logoIzquierda') --}}
                </div>

                <div class="slim-header-center">
                    <br><br><br>
                    <a href="{{ route('monitor') }}">
                        <button type="button" style="width: 150px;" class="btn-head btn-oblong">Monitor</button></a>
                    {{-- <a href="{{ route('home') }}">
                        <button type="button" class="btn-head">Panel general</button></a> --}}
                    <a href="{{ route('estadisticas') }}">
                        <button type="button" style="width: 150px;" class="btn-head btn-oblong">Estadísticas</button></a>

                    <a href="{{ route('periodicos') }}">
                        <button type="button" style="width: 150px;" class="btn-head btn-oblong">Periódicos</button></a>
                    <a href="{{ route('semaforizacion') }}">
                        <button type="button" style="width: 150px;" class="btn-head btn-oblong">Semaforización</button></a>
                    <a href="{{ route('alertas') }}">
                        <button type="button" style="width: 150px;" class="btn-head btn-oblong">Alertas</button></a>
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
