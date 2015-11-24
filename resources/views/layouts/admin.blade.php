<!DOCTYPE html>
<html>
<head lang="en">
    <title>@yield('title')</title>
    <link href="{{ URL::asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin.css') }}">
    <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('lib/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body>

    <div id="wrapper">
        @include('includes.admin-sidemenu')

        @yield('content')

        @include('includes.footer')
    </div>
</body>
</html>