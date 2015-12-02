<!DOCTYPE html>
<html>
<head lang="en">
    @include('includes.head')
</head>
<body>

    @include('includes.navbar')

    <div class="main">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('includes.footer')
</body>
</html>