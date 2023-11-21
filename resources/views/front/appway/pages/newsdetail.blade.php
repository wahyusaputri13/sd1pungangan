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


<!-- blog-single -->
<section class="sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-single-content">
                    <div class="post-details">
                        <figure class="image-box">
                            @if(file_exists(public_path('storage/'.$data->path)))
                            <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid" alt="{{ $n->title }}">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soulofjava">
                            @endif
                        </figure>
                        <div class="inner-box">
                            <div class="upper-box">
                                <div class="post-date"><i class="fas fa-calendar-alt"></i>{{
                                    \Carbon\Carbon::parse( $data->date )->format('l') }}</strong> {{
                                    \Carbon\Carbon::parse( $data->date
                                    )->toFormattedDateString() }}</div>
                                <h3>{{ $data->title }}</h3>
                                <div class="text">{!! $data->description !!}</div>


                            </div>
                            <div class="lower-box clearfix">
                                <div class="left-content pull-left">
                                    <figure class="admin-image">
                                        <img
                                            src="https://ui-avatars.com/api/?name={{ $data->uploader->name ?? 'Admin' }}">
                                    </figure>
                                    <a href="{{ url('/news-author', $data->uploader->name ?? 'Admin') }}">
                                        <span class="admin-name">by {{
                                            $data->uploader->name ?? 'Admin' }}</span>
                                    </a>
                                </div>
                                <ul class="right-content pull-right">
                                    <li><a href="#">{{
                                            views($data)->count(); }} &nbsp;<i class="far fa-eye"></i></a></li>
                                    <li class="share">
                                        <a href="#"><i class="fas fa-share-alt"></i></a>
                                        <ul class="social-links">
                                            {!! Share::page(Request::getHttpHost(), $data->title)
                                            ->facebook()
                                            ->twitter()
                                            ->whatsapp(); !!}
                                            <!-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="author-box">
                        <div class="author-inner">
                            <figure class="author-thumb"><img
                                    src="{{ asset('assets/front/appway/images/resource/author.jpg') }}" alt="">
                            </figure>
                            <div class="inner">
                                <h4>About The Theodore</h4>
                                <div class="text">
                                    Dynamically innovate resource and<br />leveling customer service for state of
                                    the art customer service.
                                </div>
                                <ul class="social-links clearfix">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="comments-area">
                        <div class="sec-title">
                            <h2>Comments (03)</h2>
                        </div>
                        <div class="comment-box">
                            <div class="comment">
                                <figure class="author-thumb"><img
                                        src="{{ asset('assets/front/appway/images/resource/comment-1.png') }}" alt="">
                                </figure>
                                <div class="comment-inner">
                                    <div class="comment-info">
                                        <h5 class="name">Rayan Collins</h5>
                                        <span class="date">October 6, 2019</span>
                                    </div>
                                    <div class="text">It’s no secret that the digital industry is booming. From
                                        exciting startups to global brands, companies are reaching out.</div>
                                    <div class="replay-btn"><a href="#">Reply</a></div>
                                </div>
                            </div>
                            <div class="comment replay-comment">
                                <figure class="author-thumb"><img
                                        src="{{ asset('assets/front/appway/images/resource/comment-2.png') }}" alt="">
                                </figure>
                                <div class="comment-inner">
                                    <div class="comment-info">
                                        <h5 class="name">Liam Irvines</h5>
                                        <span class="date">October 5, 2019</span>
                                    </div>
                                    <div class="text">It’s no secret that the digital industry is booming. From
                                        exciting startups to global brands, companies are reaching out.</div>
                                    <div class="replay-btn"><a href="#">Reply</a></div>
                                </div>
                            </div>
                            <div class="comment">
                                <figure class="author-thumb"><img
                                        src="{{ asset('assets/front/appway/images/resource/comment-3.png') }}" alt="">
                                </figure>
                                <div class="comment-inner">
                                    <div class="comment-info">
                                        <h5 class="name">Rayan Collins</h5>
                                        <span class="date">October 4, 2019</span>
                                    </div>
                                    <div class="text">It’s no secret that the digital industry is booming. From
                                        exciting startups to global brands, companies are reaching out.</div>
                                    <div class="replay-btn"><a href="#">Reply</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-form-area">
                        <div class="sec-title">
                            <h2>Leave Reply Comments</h2>
                        </div>
                        <form action="#" method="post" class="comment-form default-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Mail Address" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="website" placeholder="Webstie (optional)">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button type="submit" class="theme-btn-two">Post now</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
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
                    <!-- <div class="sidebar-categories sidebar-widget">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="widget-content">
                            <ul>
                                <li><a href="#">Web Design <span>(09)</span></a></li>
                                <li><a href="#">Graphics <span>(13)</span></a></li>
                                <li><a href="#">Web Development <span>(05)</span></a></li>
                                <li><a href="#">IOS/Android Development <span>(19)</span></a></li>
                                <li><a href="#">Others <span>(12)</span></a></li>
                            </ul>
                        </div>
                    </div> -->
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
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="sidebar-tags sidebar-widget">
                        <h3 class="sidebar-title">Popular Tags</h3>
                        <div class="widget-content">
                            <ul class="tag-list clearfix">
                                <li><a href="#">SEO Digital</a></li>
                                <li><a href="#">Animation</a></li>
                                <li><a href="#">Ideas</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Develpment</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="sidebar-instagram sidebar-widget">
                        <h3 class="sidebar-title">Instagram</h3>
                        <div class="widget-content">
                            <div class="image-list clearfix">
                                <figure class="image"><a href="#"><img
                                            src="{{ asset('assets/front/appway/images/resource/instagram-1.jpg') }}"
                                            alt=""></a></figure>
                                <figure class="image"><a href="#"><img
                                            src="{{ asset('assets/front/appway/images/resource/instagram-2.jpg') }}"
                                            alt=""></a></figure>
                                <figure class="image"><a href="#"><img
                                            src="{{ asset('assets/front/appway/images/resource/instagram-3.jpg') }}"
                                            alt=""></a></figure>
                                <figure class="image"><a href="#"><img
                                            src="{{ asset('assets/front/appway/images/resource/instagram-4.jpg') }}"
                                            alt=""></a></figure>
                                <figure class="image"><a href="#"><img
                                            src="{{ asset('assets/front/appway/images/resource/instagram-5.jpg') }}"
                                            alt=""></a></figure>
                                <figure class="image"><a href="#"><img
                                            src="{{ asset('assets/front/appway/images/resource/instagram-6.jpg') }}"
                                            alt=""></a></figure>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-single end -->
@endsection
@push('after-script')
<script src="{{ asset('js/share.js') }}"></script>
@endpush