<div class="wrapper">
    <div class="sidebar" data-active-color="green" data-background-color="black"
        data-image="{{ asset('assets/back/assets/img/sidebar-3.jpg') }}">
        <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
        <div class="logo">
            <a href="{{ url('/') }}" target="_blank" class="simple-text">
                {{ $data_website->web_name }}
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="{{ url('/') }}" class="simple-text">
                <span class="material-icons">
                    language
                </span>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    @if (auth()->user()->profile_photo_path)
                        <img src="{{ asset('storage') }}/{{ auth()->user()->profile_photo_path }}" />
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        {{ auth()->user()->name }}
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('myprofile.edit', auth()->user()->id) }}">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @php
                    $components = DB::table('components')
                        ->where('active', '=', 1)
                        ->get();
                @endphp
                @foreach ($components as $component)
                    @if ($component->id == 1)
                        <li class="{{ Str::contains(Request::url(), 'event') ? 'active' : '' }}">
                            <a href="{{ route('event.index') }}">
                                <i class="material-icons">date_range</i>
                                <p>{{ $component->name }}</p>
                            </a>
                        </li>
                    @endif
                @endforeach
                <li class="{{ Str::contains(Request::url(), 'inbox') ? 'active' : '' }}">
                    <a href="{{ route('inbox.index') }}">
                        <i class="material-icons">mail</i>
                        <p>Inbox</p>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), 'kategori') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}">
                        <i class="material-icons">chevron_right</i>
                        <p>Kategori Kelas</p>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), 'upload') ? 'active' : '' }}">
                    <a href="{{ route('upload.index') }}">
                        <i class="material-icons">add_to_photos_outlined</i>
                        <p>FlipBook</p>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), ['gallery', 'news']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pagesExamples"
                        aria-expanded="{{ Str::contains(Request::url(), ['gallery', 'news']) ? 'true' : '' }}">
                        <i class="material-icons">archive</i>
                        <p>Posts
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ Str::contains(Request::url(), ['gallery', 'news']) ? 'in' : '' }}"
                        id="pagesExamples">
                        <ul class="nav">
                            <li class="{{ Str::contains(Request::url(), 'gallery') ? 'active' : '' }}">
                                <a href="{{ route('gallery.index') }}"> <i class="material-icons">collections</i>
                                    Gallery</a>
                            </li>
                            <li class="{{ Str::contains(Request::url(), 'news') ? 'active' : '' }}">
                                <a href="{{ route('news.index') }}">
                                    <i class="material-icons">event_note</i>
                                    News</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if (Auth::user()->role_id == 1)
                    <li
                        class="{{ Str::contains(Request::url(), ['component', 'frontmenu', 'relatedlink', 'settings', 'themes', 'user']) ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#pagesExamples2"
                            aria-expanded="{{ Str::contains(Request::url(), ['component', 'frontmenu', 'relatedlink', 'settings', 'themes', 'user']) ? 'true' : '' }}">
                            <i class="material-icons">public</i>
                            <p>Website
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse {{ Str::contains(Request::url(), ['component', 'frontmenu', 'relatedlink', 'settings', 'themes', 'user', 'whatsapp']) ? 'in' : '' }}"
                            id="pagesExamples2">
                            <ul class="nav">
                                <li class="{{ Str::contains(Request::url(), 'component') ? 'active' : '' }}">
                                    <a href="{{ route('component.index') }}"><i class="material-icons">apps</i>
                                        Components</a>
                                </li>
                                <li class="{{ Str::contains(Request::url(), 'frontmenu') ? 'active' : '' }}">
                                    <a href="{{ route('frontmenu.index') }}"> <i class="material-icons">menu</i>
                                        Menu</a>
                                </li>
                                <li class="{{ Str::contains(Request::url(), 'relatedlink') ? 'active' : '' }}">
                                    <a href="{{ route('relatedlink.index') }}"><i class="material-icons">link</i>
                                        Related Link</a>
                                </li>
                                <li class="{{ Str::contains(Request::url(), 'settings') ? 'active' : '' }}">
                                    <a href="{{ route('settings.index') }}">
                                        <i class="material-icons">settings</i>
                                        Settings</a>
                                </li>
                                <li class="{{ Str::contains(Request::url(), 'themes') ? 'active' : '' }}">
                                    <a href="{{ route('themes.index') }}"><i class="material-icons">brush</i>
                                        Themes</a>
                                </li>
                                <li class="{{ Str::contains(Request::url(), 'user') ? 'active' : '' }}">
                                    <a href="{{ route('user.index') }}">
                                        <i class="material-icons">person</i>
                                        Users</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#"> Dashboard </a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mike John responded to your email</a>
                                </li>
                                <li>
                                    <a href="#">You have 5 new tasks</a>
                                </li>
                                <li>
                                    <a href="#">You're now friend with Andrew</a>
                                </li>
                                <li>
                                    <a href="#">Another Notification</a>
                                </li>
                                <li>
                                    <a href="#">Another One</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <form id="myForm" method="POST" action="{{ route('logout') }}" hidden>
                                @csrf
                            </form>
                            <a href="#" onclick="logout()" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-sign-out"></i>
                                <p class="hidden-lg hidden-md">Logout</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                    <!-- <form class="navbar-form navbar-right" role="search">
                        <div class="form-group form-search is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form> -->
                </div>
            </div>
        </nav>
        <script>
            function logout() {
                swal({
                    title: 'Are you sure?',
                    text: "want to logout!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes',
                    buttonsStyling: false
                }).then(function() {
                    document.getElementById("myForm").submit();
                });
            };
        </script>
