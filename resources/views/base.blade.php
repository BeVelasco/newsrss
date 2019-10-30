<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="chrome">
    <head>
        <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
        @include('componentes.head')
        @yield('css')
    </head>
    <body>
        <div class="slim-header ht-65">
            <div class="container">
                <div class="slim-header-left">
                    @include('componentes.logoIzquierda')
                </div>
                
                <div class="slim-header-right">
                </div>

                <div class="dropdown dropdown-c">
                    @include('componentes.menuUsuario')
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
                <p>Designed by: <a href="http://www.integraideasconsultores.com">{{ __('messages.iic') }}</a></p>
            </div>
        </div>
        @yield('js')
    </body>
        @yield('modales')
</html>