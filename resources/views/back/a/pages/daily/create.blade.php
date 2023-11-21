@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('daily') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">event_note</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Add Daily Report</h4>
                    {{Form::open(['route' => 'daily.store','method' => 'post', 'files' => 'true', ''])}}
                    <div class="form-group col-lg-4">
                        <label class="control-label">Date</label>
                        {{Form::text('date', null,['class' => 'form-control datepicker'])}}
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label">Time Start</label>
                        {{Form::text('t-start', null,['class' => 'form-control timepicker'])}}
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label">Time End</label>
                        {{Form::text('t-end', null,['class' => 'form-control timepicker'])}}
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="control-label">Location</label>
                        {{Form::text('location', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="control-label">Personnel</label>
                        {{Form::text('personnel', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="control-label">Report</label>
                        {{Form::text('report', null,['class' => 'form-control'])}}
                    </div>
                    <div class="d-flex text-right col-lg-12">
                        <a href="{{ route('daily.index') }}" class="btn btn-default btn-fill">Cancel</a>
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