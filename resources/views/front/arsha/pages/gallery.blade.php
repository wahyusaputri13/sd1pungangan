@extends('front.arsha.layouts.app')
@section('content')
<main id="main">

    <!-- keanehan yang terjadi jika div dibawah ini dihapus maka slideshow blank hitam -->
    <div class="skills-content">
    </div>
    <!-- end of aneh -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="portfolio">

        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
                <!-- <p>Check our latest photo</p> -->
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    {{ $gallery->links() }}
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($gallery as $g)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-img">
                        @if(file_exists(public_path('storage/'.$g->path)))
                        <img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid">
                        @else
                        <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
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
        </div>

    </section>
    <!-- End Gallery Section -->
</main>
@endsection
@push('after-script')
@endpush