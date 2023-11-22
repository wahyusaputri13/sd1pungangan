@extends('front.arsha.layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <!-- <ol>
                                                                                                                                                        <li><a href="index.html">Home</a></li>
                                                                                                                                                        <li>Inner Page</li>
                                                                                                                                                    </ol>
                                                                                                                                                    <h2>Inner Page</h2> -->

            </div>
        </section>
        <!-- End Breadcrumbs -->
        <section id="contact" class="contact">
            <div class="container aos-init aos-animate" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ $data->judul }}</h2>
                    <p>{{ $data->name }}</p>
                    <p><b>{{ $data->kategori->kategori_kelas }}</b></p>
                </div>

                <div class="row">

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="info">
                            <div class="_df_book" height="500" webgl="true" backgroundcolor="teal"
                                source="{{ asset('storage/uploads/' . $data->path_pdf) }}" id="df_manual_book"></div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </main>
@endsection
@push('after-script')
    <link href="{{ asset('assets/front/arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Flipbook StyleSheet -->
    <link href="{{ asset('assets/dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Stylesheet -->
    <link href="{{ asset('assets/dflip/css/themify-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/dflip/js/dflip.min.js') }}" type="text/javascript"></script>
@endpush
