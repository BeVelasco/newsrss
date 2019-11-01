<div class="mg-r-49">
<a href="#" class="logged-user" data-toggle="dropdown">
    <img src="{{ URL::asset('/uploads/avatars') }}/{{ Auth::user()->avatar }}" alt="">
    <span>{{ Auth::user()->name }}</span>
    <i class="fa fa-angle-down"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">
    <class class="nav">
        <a href="{{ route('monitor') }}"
            class   = "nav-link"
        >
            <i class = "icon ion-podium"></i>Monitor
        </a>
        <a 
            href    = "{{ route('logout') }}"
            onclick = "event.preventDefault(); document.getElementById('logout-form').submit();"
            class   = "nav-link"
        >
            <i class = "icon ion-forward"></i>Salir
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </class>
</div>
</div> 