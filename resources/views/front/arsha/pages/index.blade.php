@extends('front.arsha.layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>{{ $data_website->web_name }}</h1>
                <h2>{{ $data_website->web_description }}</h2>
                <div class="d-none justify-content-center justify-content-lg-start">
                    <!-- <audio id="audio_1"> -->
                    <!-- <source src="http://i.klikhost.com:8210/stream" type="audio/mpeg"> -->
                    <!-- </audio> -->
                    <a href="#about" class="btn-get-started scrollto btn-playstream">Get Started</a>
                    <a href="{{ $data_website->heroes_video }}" class="glightbox btn-watch-video"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                @if($data_website->image_hero)
                <img src="{{ asset('storage') }}/{{ $data_website->image_hero }}" class="img-fluid animated">
                @else
                <img src="{{ asset('assets/front/arsha/assets/img/hero-img.png') }}" class="img-fluid animated">
                @endif
            </div>
        </div>
    </div>

</section>
<!-- End Hero -->

<main id="main">
    @if($news->count() != 0)
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Latest Post</h2>
            </div>

            <div class="row">
                @foreach($news as $n)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mb-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="post-img">
                            @if(file_exists(public_path('storage/'.$n->path)))
                            <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                            @endif
                        </div>
                        <h4 style="text-align: center;"><a href="{{ url('/news-detail', $n->slug) }}">
                                {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                        </h4>
                        <h6 style="text-align: center;">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                            \Carbon\Carbon::parse( $n->date
                            )->toFormattedDateString() }}</h6>
                    </div>
                </div>
                @if($loop->iteration == 4)
                @break
                @endif
                @endforeach
                <div class="d-flex justify-content-end">
                    <a class="btn rounded-pill" style="background: #47b2e4; color: white;" href="{{ url('/newsall') }}">
                        Show All</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    @endif
    @if($gallery->count() != 0)
    <!-- keanehan yang terjadi jika div dibawah ini dihapus maka slideshow blank hitam -->
    <div class="skills-content">
    </div>
    <!-- end of aneh -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery</h2>
                <p>Check our latest photo</p>
                <a class="btn rounded-pill" style="background: #47b2e4; color: white;" href="{{ url('/photos') }}">
                    Show All</a>
            </div>
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($gallery as $g)
                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-img">
                        @if(file_exists(public_path('storage/'.$g->path)))
                        <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid">
                        @else
                        <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                        @endif
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $g->description }}</h4>
                        <!-- <p>Web</p> -->
                        @if(file_exists(public_path('storage/'.$g->path)))
                        <a href="{{ asset('storage/') }}/{{ $g->path}}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{ $g->description }}"><i
                                class="bx bx-plus"></i></a>
                        @else
                        <a href="{{ asset('img/soulofjava.jpg') }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{ $g->description }}"><i
                                class="bx bx-plus"></i></a>
                        @endif
                        <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a> -->
                    </div>
                </div>
                @if($loop->iteration == 8)
                @break
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- End Portfolio Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit
                    in iste officiis commodi quidem hic quas.</p> -->
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $data_website->address }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $data_website->email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $data_website->phone }}</p>
                        </div>

                        <div class="clock">
                            <i class="bi bi-clock"></i>
                            <h4>Open Hours:</h4>
                            <p>{{ $data_website->open_hours }}</p>
                        </div>
                        <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                            $data_website->longitude }}&z=14&output=embed" frameborder="0"
                            style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    {{Form::open(['url' => 'kotakmasuk','method' => 'post', '', 'class' =>
                    'php-email-form'])}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                            'required'])}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                            'required'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::number('phone', null,['class' => 'form-control', 'placeholder' => 'Phone Number',
                        'required'])}}
                    </div>
                    <div class="form-group">
                        {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' => 'Message',
                        'required'])}}
                    </div>
                    <div class="form-group">
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
                    <div class="text-center">
                        <button type="submit">Send Message</button>
                    </div>
                    {{Form::close()}}
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main>
<!-- End #main -->
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