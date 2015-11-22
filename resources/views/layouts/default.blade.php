<!DOCTYPE html>
<html>
<head lang="en">
    @include('includes.head')
</head>
<body>

    @include('includes.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('includes.footer')
</body>
</html>