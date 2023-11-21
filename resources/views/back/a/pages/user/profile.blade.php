@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('users') }}
        @if ($message = Session::get('success'))
        <div id="elementId" hidden>{{ $message }}</div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Profile
                            <!-- <small class="category">Complete your profile</small> -->
                        </h4>
                        {{Form::model($data, ['route' => ['myprofile.update', $data->id],'method' => 'put', 'files' =>
                        'true', ''])}}
                        <div class="row">
                            <div class="col text-center">
                                <!-- <legend>Regular Image</legend> -->
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        @if($data->profile_photo_path)
                                        <img src="{{ asset('storage') }}/{{ $data->profile_photo_path }}"
                                            alt="profile picture">
                                        @else
                                        <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}"
                                            alt="profile picture">
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-success btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <!-- <input type="file" name="photo" /> -->
                                            {{Form::file('profile_photo_path', null,['class' => 'form-control'])}}
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                            data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    {{Form::text('name', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NIP</label>
                                    {{Form::text('nip', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Jabatan / Golongan</label>
                                    {{Form::text('jabatan', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    {{Form::text('email', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone Number</label>
                                    {{Form::text('user_phone', null,['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Old Password</label>
                                    {{Form::password('current_password',['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">New Password</label>
                                    {{Form::password('new_password',['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">New Confirm Password</label>
                                    {{Form::password('new_confirm_password',['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script>
    $(document).ready(function () {
        if ($('#elementId').length > 0) {
            const pesan = document.getElementById('elementId').innerText;
            console.log(pesan);
            demo.showNotification('top', 'center', pesan)
        }
    });
</script>
@endpush