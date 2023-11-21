@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('whatsapp') }}
        @if ($message = Session::get('success'))
        <div id="elementId" hidden>{{ $message }}</div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">settings</i>
                    </div>
                    <div class="card-content p-auto">
                        <!-- <h4 class="card-title">Stacked Form</h4> -->
                        <div class="row">
                            <div class="col" style="height: 100px;">
                            </div>
                            <div class="col" style="height: 500px;">
                                <iframe src="http://10.0.1.21:8001" width="100%" height="100%"
                                    title="Whatsapp"></iframe>
                            </div>
                            <div class="col" style="height: 100px;">
                            </div>
                        </div>
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