{{$type_menu = null}}

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">TinyLongStep</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('home') }}"><i class="far fa-square"></i> <span>Dashborad</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-clipboard"></i> <span>Kategori</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('/category') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('category.index') }}">List Kategori</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-bookmark"></i></i> <span>Tag</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('/tag' ? 'active' : '')}}">
                        <a class="nav-link"
                            href="{{route('tag.index')}}">List Tag</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('post' ? 'active' : '')}}">
                        <a class="nav-link"
                            href="{{route('post.index')}}">List Post</a>
                    </li>
                    <li class="{{Request::is('post' ? 'active' : '')}}">
                        <a class="nav-link"
                            href="{{route('deletedpost')}}">Deleted Post</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>User</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('post' ? 'active' : '')}}">
                        <a class="nav-link"
                            href="{{route('user.index')}}">List User</a>
                    </li>
                </ul>
            </li>
            
            {{-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google
                        Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
