<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/notes.css')}}
    {{HTML::script('js/misc.js')}}
    @yield('pagetitle')
    @yield('headers')
</head>
<body>
@yield('maincontent')
@yield('footers')
</body>
</html>