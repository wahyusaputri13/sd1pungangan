@extends('front.flexstart.layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up" class="aos-init aos-animate">{{ $data_website->web_name }}</h1>
                <h2 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">{{
                    $data_website->web_description }}</h2>
                <!-- <audio id="audio_1">
                    <source src="{{ $data_website->url_stream }}" type="audio/mpeg">
                </audio>
                <div data-aos="fade-up" data-aos-delay="600" class="aos-init aos-animate d-none">
                    <div class="text-center text-lg-start">
                        <a class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center btn-playstream"
                            value="off">
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                @if($data_website->image_hero)
                <img src="{{ asset('storage') }}/{{ $data_website->image_hero }}" class="img-fluid"
                    alt="{{ $data_website->image_hero_name }}">
                @else
                <img src="{{ asset('assets/front/flexstart/assets/img/hero-img.png') }}" class="img-fluid"
                    alt="soul of java">
                @endif
            </div>
        </div>
    </div>

</section>
<!-- End Hero -->
<main id="main">
    <!-- ======= Recent Blog Posts Section ======= -->
    @if($news->count() != 0)
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Blog</h2>
                <p>Recent posts form our Blog</p>
            </header>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <a class="btn" style="background: #4154f1; color: white;" href="{{ url('/newsall') }}">Show All</a>
                </div>
            </div>
            <div class="row mt-4">
                @foreach($news as $n)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="post-box">
                        <div class="post-img">
                            @if(file_exists(public_path('storage/'.$n->path)))
                            <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid" alt="{{ $n->photo }}">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                            @endif
                        </div>
                        <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                            \Carbon\Carbon::parse( $n->date
                            )->toFormattedDateString() }}</span>
                        <h3 class="post-title">
                            {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                        </h3>
                        <a href="{{ url('/news-detail', $n->slug) }}" class="readmore stretched-link mt-auto"><span>Read
                                More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @if($loop->iteration == 6)
                @break
                @endif
                @endforeach
            </div>
        </div>

    </section>
    @endif
    <!-- End Recent Blog Posts Section -->
    @if($gallery->count() != 0)
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Gallery</h2>
                <p>Check our latest photo</p>
            </header>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="mb-3">
                        <a class="btn" style="background: #4154f1; color: white;" href="{{ url('/photos') }}">Show
                            All</a>
                    </div>
                </div>
            </div>

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($gallery as $g)
                <div class="col-lg-3 col-md-4 portfolio-item filter-app">
                    <div class="portfolio-wrap d-flex justify-content-center">
                        @if(file_exists(public_path('storage/'.$g->path)))
                        <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid" alt="{{ $g->name }}">
                        @else
                        <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                        @endif
                        <div class="portfolio-info">
                            <h4>{{ $g->description }}</h4>
                            <!-- <p>App</p> -->
                            <div class="portfolio-links">
                                @if(file_exists(public_path('storage/'.$g->path)))
                                <a href="{{ asset('storage/') }}/{{ $g->path}}" data-gallery="portfolioGallery"
                                    class="portfokio-lightbox" title="{{ $g->description }}"><i
                                        class="bi bi-plus"></i></a>
                                @else
                                <a href="{{ asset('img/soulofjava.jpg') }}" data-gallery="portfolioGallery"
                                    class="portfokio-lightbox" title="{{ $g->description }}"><i
                                        class="bi bi-plus"></i></a>
                                @endif
                                <!-- <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                @if($loop->iteration == 8)
                @break
                @endif
                @endforeach
            </div>
        </div>

    </section>
    <!-- End Gallery Section -->
    @endif
    <section id="contact" class="contact">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <header class="section-header">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box"> <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>{{ $data_website->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box"> <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>{{ $data_website->phone }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box"> <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>{{ $data_website->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box"> <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>{{ $data_website->open_hours }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', ''])}}
                    <div class="row gy-4">
                        <div class="col-md-6">
                            {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                            'required'])}}
                        </div>
                        <div class="col-md-6 ">
                            {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                            'required'])}}
                        </div>
                        <div class="col-md-12">
                            {{Form::number('phone', null,['class' => 'form-control', 'placeholder' => 'Phone Number',
                            'required'])}}
                        </div>
                        <div class="col-md-12">
                            {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' => 'Message',
                            'required'])}}
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 captcha text-center mb-3">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-3">
                                    {{Form::number('captcha', null,['class' => 'form-control',
                                    'placeholder' => 'Enter Captcha Result',
                                    'required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            {{Form::submit('Send Message', ['class' => 'btn', 'style' => 'background:#4154f1;
                            color:white;'])}}
                        </div>
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

    $('.btn-playstream').click(function () {
        currentvalue = document.getElementById('audio_1').value;
        if (currentvalue == "on") {
            document.getElementById('audio_1').pause();
            document.getElementById("audio_1").value = "off";
            console.log("off!");
        } else {
            document.getElementById('audio_1').play();
            document.getElementById("audio_1").value = "on";
            console.log("on!");
        }
        // function playmusik() {
        //     var song = new Audio();
        //     song.src = "http://i.klikhost.com:8234/stream";
        //     // song.autoplay = true;
        //     song.play;
        // }
        // window.addEventListener("load", playmusik);
    });
</script>
@endpush