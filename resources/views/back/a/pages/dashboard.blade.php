@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('dashboard') }}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">collections</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Gallery</p>
                        <h3 class="card-title">{{ $gallery_all }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="#pablo">Get More Space...</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="purple">
                        <i class="material-icons">mail</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Inbox</p>
                        <h3 class="card-title">{{ $inbox }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="#pablo">Get More Space...</a>
                                    </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <p class="category">News</p>
                        <h3 class="card-title">{{ $news_all }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">
                            visibility
                        </i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Visitors</p>
                        <h3 class="card-title">{{ $counter_web }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush