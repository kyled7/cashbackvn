<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                Appname
            </a>
        </div>

        {{Auth::user()}}
        <ul class="nav navbar-nav navbar-right">
            <li><button class="btn btn-link navbar-btn" onclick="location.href='/auth/login'">Login</button> </li>
            <li><button class="btn btn-primary navbar-btn" onclick="location.href='/auth/register'">Sign Up</button> </li>
        </ul>
    </div>
</nav>