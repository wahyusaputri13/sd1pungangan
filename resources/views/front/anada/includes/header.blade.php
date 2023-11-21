<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Header 
    ============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed-light attr-border navbar-fixed dark no-background bootsnav">

        <!-- Start Top Search -->
        <div class="container">
            <div class="row">
                <div class="top-search">
                    <div class="input-group">
                        <form action="#">
                            <input type="text" name="text" class="form-control" placeholder="Search">
                            <button type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="ti-search"></i></a></li>
                    <li class="side-menu"><a href="#"><i class="ti-menu-alt"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2 class="wow fadeInDown text-white" data-wow-duration="1s">
                        <img src="{{ asset('') }}{{ $data_website->favicon }}" width="30" class="logo default"
                            alt="Logo" hidden>
                        <img src="{{ asset('') }}{{ $data_website->favicon }}" width="30" class="logo logo-responsive"
                            alt="Logo" hidden>
                        {{ $data_website->web_name }}
                    </h2>
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    @php
                    $queryMenu = DB::table('front_menus')
                    ->where('menu_parent', '=', '1')
                    ->where('deleted_at', '=', null)
                    ->orderBy('id', 'ASC')
                    ->get();
                    @endphp
                    @foreach($queryMenu as $menu)
                    @php
                    $menuId = $menu->id;
                    $subMenus = DB::table('front_menus')
                    ->where('menu_parent', '=' , $menuId)
                    ->where('deleted_at', '=', null)
                    ->orderBy('menu_parent', 'ASC')
                    ->get();
                    @endphp
                    @if(count($subMenus) == 0)
                    <li><a href="{{ url('/page', $menu->menu_url) }}">{{ $menu->menu_name
                            }}</a>
                    </li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $menu->menu_name }}</a>
                        <ul class="dropdown-menu">
                            @foreach($subMenus as $sm)
                            @php
                            $menuId2 = $sm->id;
                            $subMenus2 = DB::table('front_menus')
                            ->where('menu_parent', '=' , $menuId2)
                            ->where('deleted_at', '=', null)
                            ->orderBy('menu_parent', 'ASC')
                            ->get();
                            @endphp
                            @if(count($subMenus2) == 0)
                            <li><a href="{{ url('page', $sm->menu_url) }}">{{ $sm->menu_name }}</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $sm->menu_name }}</a>
                                <ul class="dropdown-menu">
                                    @foreach($subMenus2 as $sub3)

                                    @php
                                    $menuId3 = $sub3->id;
                                    $subMenus3 = DB::table('front_menus')
                                    ->where('menu_parent', '=' , $menuId3)
                                    ->where('deleted_at', '=', null)
                                    ->orderBy('menu_parent', 'ASC')
                                    ->get();
                                    @endphp

                                    @if(count($subMenus3) == 0)
                                    <li><a href="{{ url('page', $sub3->menu_url) }}">{{
                                            $sub3->menu_name }}</a></li>
                                    @else
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{
                                            $sub3->menu_name }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($subMenus3 as $sub4)
                                            <li><a href="{{ url('page', $sub4->menu_url) }}">{{ $sub4->menu_name
                                                    }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                    <!-- start looping component -->
                    @php
                    $component = DB::table('components')->where('active', '=', 1)->orderBy('name', 'ASC')->get();
                    @endphp
                    @foreach($component as $cp)
                    @if($cp->slug != 'complaints')
                    <li>
                        <a href="{{ url($cp->slug) }}">{{ $cp->name }}</a>
                    </li>
                    @endif
                    @if ($cp->slug == 'complaints')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $cp->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="https://laporbupati.wonosobokab.go.id/" target="_blank">LaporBup</a></li>
                            <li><a href="tel:112" target="_blank">Call Center 112</a></li>
                        </ul>
                    </li>
                    @endif
                    @endforeach
                    <!-- end looping component -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="ti-close"></i></a>
            <div class="widget">
                <h4 class="title">Contact Info</h4>
                <ul class="contact">
                    <li>
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info">
                            <span>Email</span> {{ $data_website->email }}
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="flaticon-call-1"></i>
                        </div>
                        <div class="info">
                            <span>Phone</span> {{ $data_website->phone }}
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="flaticon-countdown"></i>
                        </div>
                        <div class="info">
                            <span>Office Hours</span> {{ $data_website->open_hours }}
                        </div>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <h4 class="title">Additional Links</h4>
                <ul>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                    <li><a href="{{ url('login') }}">Login</a></li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
        <!-- End Side Menu -->

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->