@extends('back.a.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            {{ Breadcrumbs::render('upload') }}
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Form Add Flipbook</h4>
                        {{ Form::open(['route' => 'upload.store', 'method' => 'post', 'files' => 'true', '']) }}
                        <div class="col text-center">
                            <!-- <legend>Regular Image</legend> -->
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-success btn-round btn-file">
                                        <span class="fileinput-new">Select Document</span>
                                        <span class="fileinput-exists">Change</span>
                                        {{ Form::file('path_pdf', null, ['class' => 'form-control']) }}
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
                        <div class="form-group label-floating mb-2">
                            <label class="control-label">Kategori Kelas</label>
                            {!! Form::select('id_kategori', $select, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            {{ Form::text('judul', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            {{-- {{Form::text('name', null,['class' => 'form-control'])}} --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="publish"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Publish
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="unpublish"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Unpublish
                                </label>
                            </div>
                        </div>
                        <div class="d-flex text-right">
                            <a href="{{ route('upload.index') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            demo.initFormExtendedDatetimepickers();
        });
    </script>
    <!-- ck editor -->
    <!-- <script src="{{ asset('assets/back/assets/ckeditor/ckeditor.js') }}"></script>
                                                        <script>
                                                            CKEDITOR.replace('my-editor');
                                                        </script> -->
    <!-- end ck editor -->
    <!-- tiny mce editor -->
    <!-- <script src="{{ asset('assets/back/assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script> -->
    <script src="https://cdn.tiny.cloud/1/ntnf44xuwietuzyond0qbg8p2e6eqo90pzbi04o4j1jzeiqk/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea.my-editor',
            relative_urls: false,
            height: '500px',
            plugins: [
                "advlist autolink autosave lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "restoredraft insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'path_pdf') {
                    cmsURL = cmsURL + "&type=path_pdf";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <!-- end tiny mce editor -->
@endpush
