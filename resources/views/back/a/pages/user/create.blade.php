@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('users') }}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Form Create User</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{Form::open(['route' => 'user.store','method' => 'post', 'files' => 'true', ''])}}
                        <div class="form-group label-floating">
                            <label class="control-label">Name</label>
                            {{Form::text('name', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">NIP</label>
                            {{Form::text('nip', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Jabatan / Golongan</label>
                            {{Form::text('jabatan', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Phone Number</label>
                            {{Form::text('user_phone', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Email</label>
                            {{Form::email('email', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Password</label>
                            {{Form::password('password',['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Confirm Password</label>
                            {{Form::password('password_confirmation',['class' => 'form-control'])}}
                        </div>
                        <div class="d-flex text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush