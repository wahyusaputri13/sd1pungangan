@extends('front.herobiz.layouts.app')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <!-- <ol>
                <li><a href="#">Home</a></li>
                <li>Blog</li>
            </ol> -->
            <h2>{{ $hasil }}</h2>

        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Blog</h2>
                <p>Recent posts from our Blog</p>
                <div class="sidebar mt-4">
                    <div class="sidebar-item search-form">
                        {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                        {{Form::text('kolomcari', null,['class' =>
                        'form-control', 'placeholder' => 'Search Title Post'])}}
                        <button type="submit"><i class="bi bi-search"></i></button>
                        {{Form::close()}}
                    </div>
                </div>
            </header>
            <div class="row g-5">
                <div class="col">
                    <div class="row gy-4 posts-list">
                        @foreach($data as $n)
                        <div class="col-lg-4">
                            <article class="d-flex flex-column">
                                <div class="post-img">
                                    @if(file_exists(public_path('storage/'.$n->path)))
                                    <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                    @endif
                                </div>
                                <h2 class="title">
                                    <a href="#">{{ $n->title }}</a>
                                </h2>
                                <div class="meta-top">
                                    <i class="bi bi-person"></i>
                                    <a href="#">{{ $n->upload_by }}</a><br>
                                    <i class="bi bi-clock"></i>
                                    <a href="#">
                                        {{
                                        \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                        \Carbon\Carbon::parse( $n->date
                                        )->toFormattedDateString() }}
                                    </a>
                                </div>
                                <div class="content">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($n->description, 50, $end='...') }}
                                    </p>
                                </div>
                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ url('/news-detail', $n->slug) }}">Read More</a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('after-script')
@endpush