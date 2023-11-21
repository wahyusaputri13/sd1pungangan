@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('roleaccess') }}
        @if ($message = Session::get('success'))
        <div id="elementId" hidden>{{ $message }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <!-- <h4 class="card-title">DataTables.net</h4> -->
                        <div class="text-right">
                            <a href="#" class="btn btn-info btn-round">Add Access <i
                                    class="material-icons">add_circle_outline</i>
                                <div class="ripple-container"></div>
                            </a>
                        </div>
                        <!-- <div class="toolbar text-right"> -->
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                        <!-- </div> -->
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover devan"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th class="disabled-sorting text-center">
                                            Access</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
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
            { data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false },
            { data: 'menu', name: 'menu' },
            { data: 'access', },
        ]

    });
        // var table = $('#datatables').DataTable();
        // $('.card .material-datatables label').addClass('form-group');
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function centang(submenu) {
        // e.preventDefault();
        const { pathname } = window.location;
        const paths = pathname.split("/").filter(entry => entry !== "");
        const lastPath = parseInt(paths[paths.length - 1]);
        var url = "{{ url('sendCentang') }}";

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                menuId: submenu,
                roleId: lastPath
            },
            success: function (response) {
                if (response.success) {
                    // alert(response.message) //Message come from controller
                    demo.showNotification('top', 'center', response.message)
                    location.reload();
                } else {
                    alert("Error")
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    };
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