<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GbyG PCS</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://kit.fontawesome.com/26eb2bb81f.js" crossorigin="anonymous"></script>
</head>
<body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>