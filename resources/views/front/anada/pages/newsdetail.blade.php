@extends('front.anada.layouts.app')
@section('content')
<!-- Start Blog
    ============================================= -->
<div class="blog-area single full-blog right-sidebar full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content col-lg-8 col-md-12">
                    <div class="item">

                        <div class="blog-item-box">
                            <!-- Start Post Thumb -->
                            <div class="thumb">
                                <a href="#">
                                    @if(file_exists(public_path('storage/'.$data->path)))
                                    <img src="{{ asset('storage/') }}/{{ $data->path}}" class="card-img-top">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                    @endif
                                    <div class="date">
                                        <strong>{{
                                            \Carbon\Carbon::parse( $data->date )->format('l') }}</strong> {{
                                        \Carbon\Carbon::parse( $data->date
                                        )->toFormattedDateString() }}
                                    </div>
                                </a>
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/news-author', $data->uploader->name ?? 'Admin') }}">{{
                                                $data->uploader->name ?? 'Admin' }}</a>
                                        </li>
                                        <li>
                                            <i class="fas fa-eye"></i>{{
                                            views($data)->count(); }}</small>
                                        </li>
                                        <li>
                                            {!! Share::page(Request::getHttpHost(), $data->title)
                                            ->facebook()
                                            ->twitter()
                                            ->whatsapp(); !!}
                                        </li>
                                    </ul>
                                </div>
                                <h4>{{ $data->title }}</h4>
                                <p>
                                    {!! $data->description !!}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Start Sidebar -->
                <div class="sidebar col-lg-4 col-md-12">
                    <aside>
                        <div class="sidebar-item search">
                            <div class="sidebar-info">
                                {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                                {{Form::text('kolomcari', null,['class' => 'form-control mb-3',
                                'placeholder' => 'Title Post'])}}
                                <button type="submit"><i class="fas fa-search"></i></button>
                                {{Form::close()}}
                            </div>
                        </div>
                        <div class="sidebar-item recent-post">
                            <div class="title">
                                <h4>Recent Post</h4>
                            </div>
                            <ul>
                                @foreach($news as $n)
                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            @if(file_exists(public_path('storage/'.$n->path)))
                                            <img src="{{ asset('storage/') }}/{{ $n->path}}"
                                                class="img-fluid rounded-start rounded-end">
                                            @else
                                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="{{ url('/news-detail', $n->slug) }}">{{
                                            \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                                        </a>
                                        <div class="meta-title">
                                            <span class="post-date"><i class="fas fa-clock"></i> {{
                                                \Carbon\Carbon::parse( $n->date
                                                )->toFormattedDateString() }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <!-- End Start Sidebar -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection
@push('after-script')
<script src="{{ asset('js/share.js') }}"></script>
@endpush