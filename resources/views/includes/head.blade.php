<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

<link href="{{ URL::asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('lib/bootstrap-material-design/dist/css/roboto.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('lib/bootstrap-material-design/dist/css/material-fullpalette.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('lib/bootstrap-material-design/dist/css/ripples.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<script src="{{ URL::asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('lib/bootstrap-material-design/dist/js/ripples.min.js') }}"></script>
<script src="{{ URL::asset('lib/bootstrap-material-design/dist/js/material.min.js') }}"></script>

<script>
    $(function() {
        $.material.init();
    });

</script>

