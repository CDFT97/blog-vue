<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
        </li>
        <li class="nav-item menu-{{request()->is('admin/posts*') ? 'open' : ''}}">
            <a href="#" class="nav-link {{request()->is('admin/posts*') ? 'active' : ''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Blog
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link {{request()->is('admin/posts') ? 'active' : ''}} ">
                        <i class="far fa-eye nav-icon"></i>
                        <p>All Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-pencil-alt nav-icon" ></i>
                        <p>Create Post</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>