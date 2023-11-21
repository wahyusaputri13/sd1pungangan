@extends('front.appway.layouts.app')
@section('content')
<!-- banner-section -->
<section class="banner-section">
    <div class="bg-layer" style="background-image: url('assets/front/appway/images/icons/banner-1.png');"></div>
    <div class="pattern-bg" style="background-image: url(assets/front/appway/images/icons/vactor-1.png);"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <h1>{{ $data_website->web_name }}</h1>
                    <div class="text">{{ $data_website->web_description }}</div>
                    <!-- <div class="btn-box"><a href="#">Get App Now</a></div> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image-box float-bob-y clearfix">
                    <!-- @if($data_website->image_hero)
                    <img src="{{ asset('storage') }}/{{ $data_website->image_hero }}" alt="{{ $data_website->web_name }}">
                    @else
                    <figure class="image image-2 wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/front/appway/images/resource/phone-2.png') }}" alt="{{ $data_website->web_name }}">
                    </figure>
                    @endif -->
                    <!-- <figure class="image image-1 wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/front/appway/images/resource/phone-1.png') }}" alt="">
                    </figure> -->
                    <!-- <figure class="image image-2 wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/front/appway/images/resource/phone-2.png') }}" alt="">
                    </figure> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

<!-- news-section -->
<section class="news-section">
    <div class="container">
        <div class="sec-title center">
            <h2>Recent Posts</h2>
            <a href="{{ url('/newsall') }}">
                <p>Show All</p>
            </a>
        </div>
        <div class="row">
            @foreach($news as $n)
            <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                <div class="news-block-one wow flipInY animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <a href="{{ url('/news-detail', $n->slug) }}">
                                @if(file_exists(public_path('storage/'.$n->path)))
                                <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid"
                                    alt="{{ $n->title }}">
                                @else
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soulofjava">
                                @endif
                            </a>
                        </figure>
                        <div class="lower-content">
                            <div class="post-date"><i class="fas fa-calendar-alt"></i>{{
                                \Carbon\Carbon::parse($n->date)->format('l') }}</strong> {{
                                \Carbon\Carbon::parse( $n->date
                                )->toFormattedDateString() }}</div>
                            <h3>
                                <a href="{{ url('/news-detail', $n->slug) }}">{{ $n->title }}</a>
                            </h3>
                            <div class="link-btn"><a href="{{ url('/news-detail', $n->slug) }}">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @if($loop->iteration == 3)
            @break
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- news-section end -->

<!-- subscribe-section -->
<section class="subscribe-section">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div id="iamge_block_05">
                    <div class="image-box wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <figure class="image float-bob-y"><img
                                src="{{ asset('assets/front/appway/images/resource/subscribe-1.png') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                <div id="content_block_06">
                    <div class="content-box">
                        <div class="sec-title center">
                            <h2>Inbox</h2>
                        </div>
                        <div class="text">We’d love to hear from you anytime</div>
                        {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', '', 'class' =>
                        'subscribe-form'])}}
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                                    'required'])}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                                    'required'])}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{Form::number('phone', null,['class' => 'form-control',
                                    'placeholder' => 'Phone Number',
                                    'required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group captcha text-center"
                                    style="margin-bottom: 30px; padding: 10px 40px;">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                                <div class="form-group">
                                    {{Form::number('captcha', null,['class' => 'form-control',
                                    'placeholder' => 'Enter Captcha Result',
                                    'required'])}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="margin-bottom: 30px; padding: 10px 40px;">
                                    {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' =>
                                    'Message',
                                    'required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="theme-btn-two">Send Message</button>
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->
<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>
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