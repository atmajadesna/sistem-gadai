<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('head15')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light app-navbar">
        @yield('header15')
    </nav>

    <main class="page-main">
        @yield('center15')
    </main>

    <footer class="app-footer text-center">
        @yield('footer15')
    </footer>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
