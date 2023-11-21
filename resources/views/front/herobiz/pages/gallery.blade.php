@extends('front.herobiz.layouts.app')
@section('content')
<section id="gallery" class="portfolio">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Gallery</h2>
            <p>Check our latest photo</p>
        </header>
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
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
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $gallery->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
@push('after-script')
@endpush