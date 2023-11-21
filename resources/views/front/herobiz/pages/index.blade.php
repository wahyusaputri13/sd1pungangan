@extends('front.herobiz.layouts.app')
@section('content')
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
        data-aos="zoom-out">
        @if($data_website->image_hero)
        <img src="{{ asset('storage') }}/{{ $data_website->image_hero }}" class="img-fluid animated"
            alt="{{ $data_website->image_hero_name }}">
        @else
        <img src="{{ asset('assets/front/herobiz/assets/img/hero-carousel/hero-carousel-3.svg') }}"
            class="img-fluid animated" alt="hero_image">
        @endif
        <h2>Welcome to <span>{{ $data_website->web_name }}</span></h2>
        <p>{{ $data_website->web_description }}</p>
        <div class="d-none">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="{{ $data_website->heroes_video }}" class="glightbox btn-watch-video d-flex align-items-center"><i
                    class="bi bi-play-circle"></i><span>Watch
                    Video</span></a>
        </div>
    </div>
</section>
<main id="main">
    @if($gallery->count() != 0)
    <section id="portfolio" class="portfolio" data-aos="fade-up">
        <div class="container">
            <div class="section-header">
                <h2>Gallery</h2>
            </div>
        </div>
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
                <ul class="portfolio-flters">
                    <!-- <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li> -->
                </ul>
                <div class="row g-0 portfolio-container">
                    @foreach($gallery as $g)
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                        @if(file_exists(public_path('storage/'.$g->path)))
                        <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid">
                        @else
                        <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                        @endif
                        <div class="portfolio-info">
                            <h4>{{ $g->description }}</h4>
                            @if(file_exists(public_path('storage/'.$g->path)))
                            <a href="{{ asset('storage/') }}/{{ $g->path}}" title="{{ $g->description }}"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            @else
                            <a href="{{ asset('img/soulofjava.jpg') }}" title="{{ $g->description }}"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            @endif
                            <!-- <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a> -->
                        </div>
                    </div>
                    @if($loop->iteration == 12)
                    @break
                    @endif
                    @endforeach
                </div>
                <div class="d-flex justify-content-end m-2">
                    <a href="{{ url('photos') }}" class="btn"
                        style="background-color: var(--color-primary); color: white;">Show
                        All</a>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($news->count() != 0)
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Blog</h2>
                <p>Recent posts form our Blog</p>
            </div>
            <div class="row">
                @foreach($news as $n)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img">
                            @if(file_exists(public_path('storage/'.$n->path)))
                            <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                            @endif
                        </div>
                        <div class="meta">
                            <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $n->date
                                )->toFormattedDateString() }}</span>
                            <span class="post-author"> / {{ $n->upload_by }}</span>
                        </div>
                        <h3 class="post-title">
                            {{ $n->title }}
                        </h3>
                        <p>
                            {!! \Illuminate\Support\Str::limit($n->description, 75, $end='...') !!}
                        </p>
                        <a href="{{ url('/news-detail', $n->slug) }}" class="readmore stretched-link"><span>Read
                                More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @if($loop->iteration == 3)
                @break
                @endif
                @endforeach
                <div class="d-flex justify-content-end m-2">
                    <a href="{{ route('news.all') }}" class="btn"
                        style="background-color: var(--color-primary); color: white;">Show All</a>
                </div>
            </div>

        </div>

    </section>
    @endif
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="map">
            <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                                            $data_website->longitude }}&z=14&output=embed" frameborder="0"
                allowfullscreen></iframe>
        </div>
        <div class="container">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-4">
                    <div class="info">
                        <h3>{{ $data_website->web_name }}</h3>
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>{{ $data_website->address }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>{{ $data_website->email }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>{{ $data_website->phone }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-clock flex-shrink-0"></i>
                            <div>
                                <h4>Open Hours:</h4>
                                <p>{{ $data_website->open_hours }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', ''])}}
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                            'required'])}}
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                            'required'])}}
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        {{Form::number('phone', null,['class' => 'form-control', 'placeholder' => 'Phone Number',
                        'required'])}}
                    </div>
                    <div class="form-group mt-3">
                        {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' => 'Message',
                        'required'])}}
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 captcha text-center mb-3">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-3">
                                {{Form::number('captcha', null,['class' => 'form-control',
                                'placeholder' => 'Enter Captcha Result',
                                'required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        {{Form::submit('Send Message', ['class' => 'btn', 'style' => 'background:#0ea2bd;
                        color:white;'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('after-script')
<script>
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush