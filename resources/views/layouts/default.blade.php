<!DOCTYPE html>
<html>
<head lang="en">
    @include('includes.head')
</head>
<body>
<div id="fb-root"></div>
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')
</body>
</html>