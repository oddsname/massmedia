<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.post.index')}}" class="nav-link"> Posts </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.category.index')}}" class="nav-link"> Categories </a>
        </li>
        {{--<li class="nav-item d-none d-sm-inline-block">--}}
            {{--<a href="{{route('admin.category.index')}}" class="nav-link"> Categories </a>--}}
        {{--</li>--}}
    </ul>
</nav>
