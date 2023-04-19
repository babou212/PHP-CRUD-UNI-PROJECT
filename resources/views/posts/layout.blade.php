<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>COM431 CRUD APP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
</head>
<body style="background: #eff7f6;">

{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-10 offset-1">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


        <div class="d-flex">
            @yield('content')
        </div>

</body>
</html>
