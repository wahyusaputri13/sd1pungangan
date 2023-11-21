@extends('front.arsha.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <!-- <ol>
                <li><a href="#">Home</a></li>
                <li>Blog</li>
            </ol> -->
            <h2>{{ $hasil }}</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 entries">
                    @foreach($data as $author)
                    <article class="entry">
                        <div class="card mb-3">
                            <div class="entry-img" style="text-align: center;">
                                @if(file_exists(public_path('storage/'.$author->path)))
                                <img src="{{ asset('storage/') }}/{{ $author->path}}" class="img-fluid">
                                @else
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                @endif
                            </div>
                            <h2 class="entry-title" style="text-align: center;">
                                <a href="{{ url('/news-detail', $author->slug) }}">{{ $author->title
                                    }}</a>
                            </h2>
                            <div class="entry-meta">
                                <p class="card-text m-2"><small class="text-muted"><i class="bi bi-person"></i><a
                                            href="{{ url('/news-author', $author->uploader->name ?? 'Admin') }}"
                                            class="text-muted"> {{
                                            $author->uploader->name ?? 'Admin' }}</a> <i class="bi bi-clock"></i>
                                        <time>{{
                                            \Carbon\Carbon::parse( $author->date )->format('l') }}, {{
                                            \Carbon\Carbon::parse( $author->date
                                            )->toFormattedDateString() }}</time> <i class="bi bi-eye"></i> {{
                                        views($author)->count(); }}</small></p>
                            </div>
                            <div class="entry-content m-2" style="text-align: justify;">
                                <p>
                                    {{-- {!! \Illuminate\Support\Str::limit($author->description, 350, $end='...') !!}
                                    --}}
                                </p>
                                <div class="d-flex justify-content-end m-2">
                                    <a href="{{ url('/news-detail', $author->slug) }}" class="btn btn-primary">Read
                                        More</a>
                                </div>
                            </div>
                        </div>

                    </article>
                    @endforeach

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {!! $data->links() !!}
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="portfolio-info">
                        <h3>Search</h3>
                        <div class="sidebar-item search-form">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control mb-3',
                            'placeholder' => 'Title Post'])}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-1"><i class="bi bi-search"></i></button>
                            </div>
                            {{Form::close()}}
                        </div>
                        <h3 class="mt-3">Recent Posts</h3>
                        @foreach($news as $n)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex justify-content-center p-1">
                                    @if(file_exists(public_path('storage/'.$n->path)))
                                    <img src="{{ asset('storage/') }}/{{ $n->path}}"
                                        class="img-fluid rounded-start rounded-end">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                    @endif
                                </div>
                                <div class="col-md-8" style="text-align: center;">
                                    <h5 class="card-title"><a href="{{ url('/news-detail', $n->slug) }}">
                                            {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                                        </a></h5>
                                    <p class="card-text"><small class="text-muted"><time datetime="2020-01-01">{{
                                                \Carbon\Carbon::parse( $n->date
                                                )->toFormattedDateString() }}</time></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('after-script')
@endpush