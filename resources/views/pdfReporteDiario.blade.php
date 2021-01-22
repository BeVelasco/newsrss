<! DOCTYPE html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ asset('css/slim.css') }}">
	<title>Reporte Diario de periodicos</title>
</head>
<body>

    <div class="slim-mainpanel">
        <div class="container tx-center">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h1 class="tx-black">Reporte diario</h1>

                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    foreach ($Periodicos as $item) {
                        if($item->content){
                @endphp
                    <div class="col-12 mg-t-10 mg-b-40">
                        <img src="{{ $item->content }}" width="600">
                </div>
                @php
                        }
                    }
                @endphp
            </div>
        </div>
    </div>
</body>
</html>