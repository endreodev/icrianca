<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Instituto Desportivo da Criança | Sistema</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public') }}/global/favicon@32x.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css_before')

    <link href="{{ asset('public') }}/backend/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @yield('css_after')


    <link href="{{ asset('public') }}/backend/css/custom.css" rel="stylesheet">
</head>

<body>


    @yield('content')

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    @yield('js_before')

    <script src="{{ asset('public') }}/backend/vendor/global/global.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/deznav-init.js"></script>
    <script src="{{ asset('public') }}/backend/js/custom.min.js"></script>

    @yield('js_after')


</body>

</html>
