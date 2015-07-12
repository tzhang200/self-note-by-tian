{{-- T Zhang 2015 --}}
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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="text-center text-primary">
                <h2>Note to Myself</h2>
            </div>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
    </nav>
    <div class="wrapper">
        @yield('maincontent')
    </div>

    <div id="footer" class="navbar-default navbar-fixed-bottom">
        <div class="container text-left">
            <p>COMP 2920 Assignment 2 - T Zhang</p>
        </div>
    </div>
</div>

</body>
</html>