@extends('front.anada.layouts.app')
@section('content')
<div class="blog-area full-blog blog-standard full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="col text-center">
                    <h2>Gallery</h2>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($gallery as $g)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img">
                            @if(file_exists(public_path('storage/'.$g->path)))
                            <a href="{{ asset('storage/') }}/{{ $g->path}}" target="_blank">
                                <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid" alt="{{ $g->name}}">
                            </a>
                            @else
                            <a href="{{ asset('img/soulofjava.jpg') }}" target="_blank">
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soulofjava">
                            </a>
                            @endif
                        </div>
                        <div class="portfolio-info">
                            <h4>{{ $g->description }}</h4>
                            <!-- <p>App</p> -->
                            @if(file_exists(public_path('storage/'.$g->path)))
                            <a href="{{ asset('storage/') }}/{{ $g->path}}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="{{ $g->description }}"><i
                                    class="bx bx-plus"></i></a>
                            @else
                            <a href="{{ asset('img/soulofjava.jpg') }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="{{ $g->description }}"><i
                                    class="bx bx-plus"></i></a>
                            @endif

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col text-center">
                    <div class="d-flex justify-content-center">
                        {{ $gallery->links('vendor.pagination.anada') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush