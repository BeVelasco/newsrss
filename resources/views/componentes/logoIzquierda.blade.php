<div class="mg-l-49">
    <div class="slim-logo valign-middle">
       <a href="{{ route('home') }}"><img src="{{ URL::asset('/img/iic/logoHeader.jpg')}}" height="40px" style="vertical-align: middle;"></a>

       <a 
            href    = "{{ route('logout') }}"
            onclick = "event.preventDefault(); document.getElementById('logout-form').submit();"
        >
            Salir
        </a>
    </div>
</div>