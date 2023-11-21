@extends('front.anada.layouts.app')
@section('content')
<!-- Start Banner 
    ============================================= -->
<div class="banner-area text-combo top-pad-90 rectangular-shape bg-light-gradient">
    <div class="item">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="double-items">
                            <div class="col-lg-6 info">
                                <h2 class="wow fadeInDown" data-wow-duration="1s">
                                    {{ $data_website->web_name }}
                                    <span>{{ $data_website->web_description }}</span>
                                </h2>
                            </div>
                            <div class="col-lg-6 thumb wow fadeInRight" data-wow-duration="1s">
                                @if($data_website->image_hero)
                                <img src="{{ asset('storage') }}/{{ $data_website->image_hero }}">
                                @else
                                <img src="{{ asset('assets/front/anada/assets/img/illustration/1.png') }}" alt="Thumb">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

<!-- Start Blog Area
    ============================================= -->
<div class="blog-area bg-gray left-border default-padding bottom-less">
    <div class="container">
        <div class="heading-left">
            <div class="row">
                <div class="col-lg-5">
                    <h2>
                        Latest News
                    </h2>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <a class="btn circle btn-md btn-gradient wow fadeInUp" href="{{ url('/newsall') }}">View All <i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="blog-items content-less">
            <div class="row">
                @foreach($news as $n)
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#">
                                @if(file_exists(public_path('storage/'.$n->path)))
                                <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid">
                                @else
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                @endif
                                <div class="date">
                                    <strong>{{ \Carbon\Carbon::parse($n->date)->format('l') }}</strong> {{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}
                                </div>
                            </a>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="{{ url('/news-detail', $n->slug) }}">{{
                                    \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                            </h4>
                            <a class="btn-simple" href="{{ url('/news-detail', $n->slug) }}"><i
                                    class="fas fa-angle-right"></i> Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                @if($loop->iteration == 3)
                @break
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->
<div class="blog-area bg-gray left-border default-padding bottom-less">
    <div class="container">
        <div class="heading-left">
            <div class="row">
                <div class="col-lg-5">
                    <h2>
                        Latest Gallery
                    </h2>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <a class="btn circle btn-md btn-gradient wow fadeInUp" href="{{ url('/photos') }}">View All <i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="team-items text-center">
                <div class="row">
                    @foreach($gallery as $g)
                    <!-- Single Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                @if(file_exists(public_path('storage/'.$g->path)))
                                <a href="{{ asset('storage/') }}/{{ $g->path}}" target="_blank">
                                    <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid">
                                </a>
                                @else
                                <a href="{{ asset('img/soulofjava.jpg') }}" target="_blank">
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                </a>
                                @endif
                            </div>
                            <div class="info">
                                <h4>{{ $g->description }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @if($loop->iteration == 3)
                    @break
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="contact-area default-padding">
    <div class="container">
        <div class="contact-items">
            <div class="row">
                <div class="col-lg-12 right-item">
                    <h2>We’d love to hear from you anytime</h2>
                    {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', '', 'class' =>
                    'php-email-form'])}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                                'required'])}}
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                                'required'])}}
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{Form::number('phone', null,['class' => 'form-control', 'placeholder' =>
                                'Phone Number',
                                'required'])}}
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group comments">
                                {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' => 'Message',
                                'required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 captcha mb-3">
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
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit">
                                    Send Message <i class="fa fa-paper-plane"></i>
                                </button>
                            </center>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Google Maps 
        ============================================= -->
<div class="maps-area">
    <div class="google-maps">
        <iframe
            src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{ $data_website->longitude }}&hl=en&z=17&amp;output=embed"
            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<!-- End Google Maps -->
@endsection
@push('after-script')
@endpush