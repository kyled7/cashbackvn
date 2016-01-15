<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <!-- Optionally, you can add icons to the links -->
            <li @if(Request::path() == 'admin') class="active" @endif>
                <a href="{{ url('admin') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li @if(Request::is('admin/retailers*')) class="active" @endif>
                <a href="{{ url('admin/retailers') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Retailers</span>
                </a>
            </li>
            <li @if(Request::is('admin/deals*')) class="active" @endif>
                <a href="{{ url('admin/deals') }}">
                    <i class="fa fa-tags"></i> <span>Deals</span>
                </a>
            </li>
            <li @if(Request::is('admin/categories*')) class="active" @endif>
                <a href="{{ url('admin/categories') }}">
                    <i class="fa fa-list"></i> <span>Categories</span>
                </a>
            </li>
            <li @if(Request::is('admin/users*')) class="active" @endif>
                <a href="{{ url('admin/users') }}">
                    <i class="fa fa-user"></i> <span>Users</span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>