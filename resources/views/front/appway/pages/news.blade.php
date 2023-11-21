@extends('front.appway.layouts.app')
@section('content')
<!-- preloader -->
<div class="preloader"></div>
<!-- preloader -->

<!-- page-title -->
<section class="page-title" style="background-image: url('/assets/front/appway/images/background/pagetitle-bg.png');">

    <div class="anim-icons">
        <div class="icon icon-1"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-17.png') }}" alt="">
        </div>
        <div class="icon icon-2 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-18.png') }}"
                alt=""></div>
        <div class="icon icon-3 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-19.png') }}"
                alt=""></div>
        <div class="icon icon-4"></div>
    </div>
    <div class="container">
        <div class="content-box clearfix">
            <!-- <div class="title-box pull-left">
                <h1>Latest News</h1>
                <p>Reach out to the world’s most reliable IT services.</p>
            </div>
            <ul class="bread-crumb pull-right">
                <li>Blog Details</li>
                <li><a href="/">Home</a></li>
            </ul> -->
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- blog-classic -->
<section class="sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-content">
                    @foreach($news as $n)
                    <div class="single-blog-content">
                        <div class="inner-box">
                            <figure class="image-box">
                                <a href="{{ url('/news-detail', $n->slug) }}">
                                    @if(file_exists(public_path('storage/'.$n->path)))
                                    <img src="{{ asset('storage/') }}/{{ $n->path}}" alt="{{ $n->title
                                    }}">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" alt="soulofjava">
                                    @endif
                                </a>
                            </figure>
                            <div class="lower-content">
                                <div class="upper-box">
                                    <div class="post-date"><i class="fas fa-calendar-alt"></i>{{
                                        \Carbon\Carbon::parse( $n->date )->format('l') }}, {{
                                        \Carbon\Carbon::parse( $n->date
                                        )->toFormattedDateString() }}</div>
                                    <h3><a href="{{ url('/news-detail', $n->slug) }}">{{ $n->title
                                            }}</a></h3>
                                    <div class="text"> {!! \Illuminate\Support\Str::limit($n->description, 350,
                                        $end='...') !!}
                                    </div>
                                </div>
                                <div class="lower-box clearfix">
                                    <div class="left-content pull-left">
                                        <figure class="admin-image">
                                            <img src="https://ui-avatars.com/api/?name={{
                                            $n->upload_by }}">
                                        </figure>
                                        <a href="{{ url('/news-author', $n->upload_by) }}">
                                            <span class="admin-name">by {{
                                                $n->upload_by }}</span>
                                        </a>
                                    </div>
                                    <ul class="right-content pull-right">
                                        <li><a href="#">{{
                                                views($n)->count(); }} &nbsp;<i class="far fa-eye"></i></a>
                                        </li>
                                        <li class="share">
                                            <a href="#"><i class="fas fa-share-alt"></i></a>
                                            <ul class="social-links">
                                                {!! Share::page(Request::getHttpHost(), $n->title)
                                                ->facebook()
                                                ->twitter()
                                                ->whatsapp(); !!}
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="pagination-wrapper centred">
                        <ul class="pagination">
                            {{ $news->links('vendor.pagination.simple-tailwind') }}

                            <!-- <li><a href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#" class="active">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="sidebar">
                    <div class="sidebar-search sidebar-widget">
                        <div class="search-form">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            <div class="form-group">
                                {{Form::search('kolomcari', null,['class' => 'form-control',
                                'placeholder' => 'Title Post'])}}
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="sidebar-post sidebar-widget">
                        <h3 class="sidebar-title">Recent News</h3>
                        <div class="widget-content">
                            @foreach($news as $n)
                            <div class="post">
                                <figure class="image">
                                    <a href="{{ url('/news-detail', $n->slug) }}">
                                        @if(file_exists(public_path('storage/'.$n->path)))
                                        <img src="{{ asset('storage/') }}/{{ $n->path}}"
                                            class="img-fluid rounded-start rounded-end" alt="{{ $n->title }}">
                                        @else
                                        <img src="{{ asset('img/soulofjava.jpg') }}" alt="soulofjava">
                                        @endif
                                    </a>
                                </figure>
                                <h5><a href="{{ url('/news-detail', $n->slug) }}">{{
                                        \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                                </h5>
                                <span class="post-date">{{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}</span>
                            </div>
                            @if($loop->iteration == 5)
                            @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-classic end -->

@endsection
@push('after-script')
@endpush