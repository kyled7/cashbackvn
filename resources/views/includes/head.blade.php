<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

<link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('lib/material/css/roboto.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('lib/material/css/material-fullpalette.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('lib/material/css/ripples.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<script src="{{ URL::asset('lib/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('lib/material/js/ripples.min.js') }}"></script>
<script src="{{ URL::asset('lib/material/js/material.min.js') }}"></script>

<script>
    $(function() {
        $.material.init();
    });

</script>

