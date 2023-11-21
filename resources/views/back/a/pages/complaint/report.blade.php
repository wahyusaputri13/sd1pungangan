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
                    <h4 class="card-title">Form Report Public Complaints</h4>
                    <!-- <div class="col-sm-8 col-sm-offset-2"> -->
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            {{Form::model($data, ['url' => ['admin/upstate', $data->id],'method' => 'post',
                            'files'
                            =>
                            'true', ''])}}
                            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <!-- <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Build Your Profile
                                </h3>
                                <h5>This information will let us know more about you.</h5>
                            </div> -->
                            <div class="wizard-navigation">
                                <ul>
                                    <li>
                                        <a href="#about" data-toggle="tab">incident report</a>
                                    </li>
                                    <li>
                                        <a href="#account" data-toggle="tab">disposition</a>
                                    </li>
                                    <li>
                                        <a href="#address" data-toggle="tab">report</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="col text-center">
                                                <!-- <legend>Regular Image</legend> -->
                                                <div class="fileinput fileinput-new text-center"
                                                    data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        @if($data->attachment)
                                                        <img src="{{ asset('storage') }}/{{ $data->attachment }}"
                                                            alt="...">
                                                        @else
                                                        <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}"
                                                            alt="thumbnail">
                                                        @endif
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>

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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Report Date</label>
                                                {{Form::text('date',null,['class' => 'form-control
                                                datepicker','readonly'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Reporter's Name</label>
                                                {{Form::text('name', null,['class' => 'form-control','readonly'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Reporter's Phone Number</label>
                                                {{Form::text('phone', null,['class' => 'form-control','readonly'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Location</label>
                                                {{Form::text('location', null,['class' => 'form-control','readonly'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Report Description</label>
                                                {{Form::text('description', null,['class' =>
                                                'form-control','readonly'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <!-- <h4 class="info-text"> What are you doing? (checkboxes) </h4> -->
                                    @php
                                    $usr = DB::table('users')->where('id', $data->assigned_to)->get();
                                    $bidang = DB::table('bidangs')->where('id', $data->bidang_id)->get();
                                    $tusi = DB::table('tusis')->where('id', $data->tusi_id)->get();
                                    @endphp
                                    <div class="row">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Bidang</label>
                                                {{Form::text('bidang', $bidang[0]->name, ['class' =>
                                                'form-control','readonly'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Sub Bidang</label>
                                                {{Form::text('sub_bidang', $tusi[0]->name, ['value' => '$usr', 'class'
                                                =>
                                                'form-control','readonly'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Personnel</label>
                                                {{Form::text('usr', $usr[0]->name, ['value' => '$usr->name', 'class' =>
                                                'form-control','readonly'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- <h4 class="info-text"> Are you living in a nice area? </h4> -->
                                        </div>
                                        <div class="col text-center">
                                            <!-- <legend>Regular Image</legend> -->
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}"
                                                        alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-success btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <!-- <input type="file" name="photo" /> -->
                                                        {{Form::file('photo', null,['class' => 'form-control'])}}
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
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Result</label>
                                                {{Form::text('result', null,['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <a href="{{ route('complaint.index') }}" class="btn btn-fill btn-fill">Cancel</a>
                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next'
                                        value='Next' />
                                    {{Form::text('zzz', $data->id, ['hidden'])}}
                                    <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish'
                                        value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-info btn-default btn-wd'
                                        name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <!-- wizard container -->
                    <!-- </div> -->
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
        $("#language").change(function () {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            const langId = $(this).val();
            var url = "{{ route('frameworks') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    languageId: langId,
                },
                success: function (result) {
                    $("#framework").empty();
                    // $("#framework").append(
                    //     '<option selected disabled value="">Select</option>'
                    // );

                    if (result && result?.status === "success") {
                        result?.data?.map((framework) => {
                            const frameworks = `<option value='${framework?.id}'> ${framework?.name} </option>`;
                            $("#framework").append(frameworks);
                        });
                    }
                },
                error: function (result) {
                    console.log("error", result);
                },
            });
        });
    });
</script>
@endpush