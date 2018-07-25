<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TMX MESSENGER</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        a:hover{
            font-color: blue;
        }

        #map{
            height: 500px;
        }
    </style>
</head>
<body class="">
    @include('layouts.nav')
    <div id="app">
            @yield('content')
    </div>
    <script type="text/javascript">
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show');
        })

    </script>
</body>
</html>
