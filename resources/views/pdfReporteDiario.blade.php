<! DOCTYPE html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    <style>
        h1, .h1 {
            font-size: 2.1875rem; }
    </style>
	<title>Reporte Diario de periodicos</title>
</head>
<body>

    <div class="slim-mainpanel">
        <div class="container tx-center">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h1 style="text-align: center;">Reporte diario</h1>

                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    foreach ($Periodicos as $item) {
                        if($item->content){
                @endphp
                    <div class="col-12 mg-t-10 mg-b-40" style="text-align: center;">
                        <img src="img/diarios/img_{{ $item->id }}.png" width="600">
                    </div>
                    <hr>
                @php
                        }
                    }
                @endphp
            </div>
        </div>
    </div>
</body>
</html>
