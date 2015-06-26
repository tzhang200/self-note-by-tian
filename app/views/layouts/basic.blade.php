<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/notes.css')}}
    {{HTML::style('css/misc.css')}}
    {{HTML::script('js/misc.js')}}
    @yield('pagetitle')
    @yield('headers')
</head>
<body>
<div class="box_main">
@yield('maincontent')
@yield('footers')
</div>
</body>
</html>