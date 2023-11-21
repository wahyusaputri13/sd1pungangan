@extends('front.flexstart.layouts.app')
@section('content')
<!-- ======= Gallery Section ======= -->
<section id="gallery" class="portfolio">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Gallery</h2>
            <p>Check our latest photo</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $gallery->links() }}
            </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($gallery as $g)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap d-flex justify-content-center">
                    @if(file_exists(public_path('storage/'.$g->path)))
                    <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid">
                    @else
                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                    @endif
                    <div class="portfolio-info">
                        <h4>{{ $g->description }}</h4>
                        <!-- <p>App</p> -->
                        <div class="portfolio-links">
                            @if(file_exists(public_path('storage/'.$g->path)))
                            <a href="{{ asset('storage/') }}/{{ $g->path}}" data-gallery="portfolioGallery"
                                class="portfokio-lightbox" title="{{ $g->description }}"><i class="bi bi-plus"></i></a>
                            @else
                            <a href="{{ asset('img/soulofjava.jpg') }}" data-gallery="portfolioGallery"
                                class="portfokio-lightbox" title="{{ $g->description }}"><i class="bi bi-plus"></i></a>
                            @endif
                            <!-- <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
<!-- End Gallery Section -->
@endsection
@push('after-script')
@endpush