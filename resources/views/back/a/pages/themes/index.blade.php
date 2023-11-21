@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('themes') }}
        @if ($message = Session::get('success'))
        <div id="elementId" hidden>{{ $message }}</div>
        @endif
        <div class="row">
            @foreach($themes as $theme)
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-image" data-header-animation="true">
                        <a href="#pablo">
                            <img class="img" src="{{ asset($theme->image) }}">
                        </a>
                    </div>
                    <div class="card-content">
                        {{Form::open(['route' => ['themes.update', 1],'method' => 'put', 'files' => 'true', ''])}}
                        <div class="card-actions">
                            {{Form::hidden('themes_front', $theme->name)}}
                            <button type="submit" class="btn btn-success btn-simple" rel="tooltip"
                                data-placement="bottom" title="Activate">
                                <i class="material-icons">done</i>
                            </button>
                        </div>
                        {{Form::close()}}
                        <h4 class="card-title">
                            <a href="#pablo">{{ $theme->name }}</a>
                        </h4>
                        <!-- <div class="card-description">
                            The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to
                            "Naviglio" where
                            you can enjoy the main night life in Barcelona.
                        </div> -->
                    </div>
                    <div class="card-footer">
                        <div class="price">
                            <!-- <h4>$899/night</h4> -->
                        </div>
                        <div class="stats pull-right">
                            @if($data->themes_front == $theme->name)
                            <p class="category"><i class="material-icons">check_circle</i> Active Theme</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script type="text/javascript">
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        processing: true,
        serverSide: true,
        lengthChange: false,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex' },
            { data: 'role', name: 'role' },
            { data: 'action', },
        ]

    });
        // var table = $('#datatables').DataTable();
        // $('.card .material-datatables label').addClass('form-group');
</script>
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