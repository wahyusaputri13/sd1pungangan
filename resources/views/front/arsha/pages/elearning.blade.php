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

        <section id="faq" class="faq section-bg">
            <div class="container aos-init aos-animate" data-aos="fade-up">

                <div class="section-title">
                    <h2>Daftar Kelas</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

            </div>
        </section>
        <section id="why-us" class="why-us section-bg" style="padding: 10px 0px;">
            <div class="container container-fluid aos-init aos-animate" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="accordion-list">
                            <ul>
                                @foreach ($data as $d => $dt)
                                    <li>
                                        <a class="collapsed" href="{{ url('page/elearning', $dt->id) }}"
                                            aria-expanded="false"><span>{{ $d + 1 }}</span>
                                            {!! $dt->kategori_kelas !!}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img aos-init aos-animate"
                        style="background-image: url(&quot;assets/img/why-us.png&quot;);" data-aos="zoom-in"
                        data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section>

    </main>
@endsection
@push('after-script')
@endpush
