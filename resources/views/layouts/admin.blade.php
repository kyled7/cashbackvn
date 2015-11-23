<!DOCTYPE html>
<html>
<head lang="en">
    <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin.css') }}">
    <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ URL::asset('lib/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

    <div id="wrapper">
        @include('includes.admin-sidemenu')

        @yield('content')

        @include('includes.footer')
    </div>
</body>
</html>