@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('settings') }}
        @if ($message = Session::get('success'))
        <div id="elementId" hidden>{{ $message }}</div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">settings</i>
                    </div>
                    <div class="card-content">
                        <!-- <h4 class="card-title">Stacked Form</h4> -->
                        {{Form::model($data, ['route' => ['settings.update', $data->id],'method' => 'put', 'files' =>
                        'true', ''])}}
                        <div class="row">
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <legend>Hero Image</legend>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        @if($data->image_hero)
                                        <img src="{{ asset('storage') }}/{{ $data->image_hero }}" alt="...">
                                        @else
                                        <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}"
                                            alt="...">
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-success btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            {{Form::file('image_hero', null,['class' => 'form-control'])}}
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                            data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <legend>Favicon Image</legend>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        @if($data->favicon == 'assets/pemda.ico')
                                        <img src="{{ asset('') }}{{ $data->favicon }}" alt="...">
                                        @elseif($data->favicon)
                                        <img src="{{ asset('storage') }}/{{ $data->favicon }}" alt="...">
                                        @else
                                        <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}"
                                            alt="...">
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-success btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            {{Form::file('favicon', null,['class' => 'form-control'])}}
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                            data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Website Name</label>
                                    {{Form::text('web_name', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Website Description</label>
                                    {{Form::text('web_description', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    {{Form::email('email', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Address</label>
                                    {{Form::text('address', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone</label>
                                    {{Form::text('phone', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Instagram</label>
                                    {{Form::text('instagram', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Twitter</label>
                                    {{Form::text('twitter', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Facebook</label>
                                    {{Form::text('facebook', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Youtube</label>
                                    {{Form::text('youtube', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Open Hours</label>
                                    {{Form::text('open_hours', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <legend>Maps</legend>
                                <div id="map" style="height: 500px;"></div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group label-floating">
                                        <!-- <label class="control-label">Latitude</label> -->
                                        {{Form::hidden('latitude', null,['class' => 'form-control', 'id' =>
                                        'Latitude'])}}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group label-floating">
                                        <!-- <label class="control-label">Longitude</label> -->
                                        {{Form::hidden('longitude', null,['class' => 'form-control', 'id' =>
                                        'Longitude'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-fill">Update</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin="">
    </script>
<script>
    $(document).ready(function () {
        if ($('#elementId').length > 0) {
            const pesan = document.getElementById('elementId').innerText;
            console.log(pesan);
            demo.showNotification('top', 'center', pesan)
        }

        $.getJSON('getAlamat', function (data) {
            navigator.geolocation.getCurrentPosition(function (location) {
                var map = L.map('map').setView([data.latitude, data.longitude], 19);
                var marker = L.marker([data.latitude, data.longitude], {
                    draggable: 'true'
                }).addTo(map);
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
                }).addTo(map);

                $("#Latitude").val(location.coords.latitude),
                    $("#Longitude").val(location.coords.longitude),
                    marker.on('dragend', function (event) {
                        var position = marker.getLatLng();
                        marker.setLatLng(position, {
                            draggable: 'true'
                        }).bindPopup(position).update();
                        $("#Latitude").val(position.lat);
                        $("#Longitude").val(position.lng).keyup();
                    });

                $("#Latitude, #Longitude").change(function () {
                    var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
                    marker.setLatLng(position, {
                        draggable: 'true'
                    }).bindPopup(position).update();
                    map.panTo(position);
                });
            });
        });
    });
</script>
@endpush