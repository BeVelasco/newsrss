<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="chrome">
    <head>
        <title>{{ config('app.name', 'Robot') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>

        @include('componentes.head')
        @yield('css')
    </head>
    <body>
        <div class="slim-header">
            <div class="container">
                <div class="slim-header-left">
                    @include('componentes.logoIzquierda')
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