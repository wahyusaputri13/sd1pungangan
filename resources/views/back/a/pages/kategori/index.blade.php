@extends('back.a.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            {{ Breadcrumbs::render('kategorikelas') }}
            @if ($message = Session::get('success'))
                <div id="elementId" hidden>{{ $message }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="green">
                            <i class="material-icons">grade</i>
                        </div>
                        <div class="card-content">
                            <!-- <h4 class="card-title">DataTables.net</h4> -->
                            <div class="text-right">
                                <a href="{{ route('kategori.create') }}" class="btn btn-info btn-round">Add Data <i
                                        class="material-icons">add_circle_outline</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </div>
                            <div class="toolbar text-right">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover devan"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori Kelas</th>
                                            <th class="disabled-sorting text-center">
                                                Actions</th>
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
                search: "INPUT",
                searchPlaceholder: "Search records",
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'kategori_kelas',
                    name: 'kategori_kelas',
                    className: "text-center"
                },
                {
                    data: 'action',
                    className: "text-center"
                },
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            if ($('#elementId').length > 0) {
                const pesan = document.getElementById('elementId').innerText;
                console.log(pesan);
                demo.showNotification('top', 'center', pesan)
            }
        });
    </script>
@endpush