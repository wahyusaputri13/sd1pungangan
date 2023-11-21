@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('complaint') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">date_range</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Add Public Complaints</h4>
                    {{Form::open(['route' => 'complaint.store','method' => 'post', 'files' => 'true', ''])}}
                    <div class="col text-center">
                        <!-- <legend>Regular Image</legend> -->
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                <span class="btn btn-success btn-round btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <!-- <input type="file" name="photo" /> -->
                                    {{Form::file('photo', null,['class' => 'form-control'])}}
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                                        class="fa fa-times"></i> Remove</a>
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
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="control-label">Report Date</label>
                                {{Form::text('date', null,['class' => 'form-control datepicker'])}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="control-label">Reporter's Name</label>
                                {{Form::text('name', null,['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Reporter's Phone Number</label>
                                {{Form::text('phone', null,['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Location</label>
                                {{Form::text('location', null,['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Report Description</label>
                                {{Form::text('description', null,['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex text-right">
                        <a href="{{ route('complaint.index') }}" class="btn btn-default btn-fill">Cancel</a>
                        <button type="submit" class="btn btn-success btn-fill">Insert</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });
</script>
@endpush