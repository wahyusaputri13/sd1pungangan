@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('complaint') }}
        <div class="row">
            <div class="card card-plain">
                <div class="card-content">
                    <ul class="timeline">
                        @foreach($data as $d)
                        @if($loop->index %2 == 0)
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="material-icons">radio_button_unchecked</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-success">{{ $d->message }}</span>
                                </div>
                                <div class="timeline-body">
                                    @if($loop->first)
                                    <table class="table">
                                        <tr>
                                            <td>Reporter's Name</td>
                                            <td> : </td>
                                            <td>{{ $d->report->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Reporter's Phone</td>
                                            <td> : </td>
                                            <td>{{ $d->report->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td> : </td>
                                            <td>{{ \Carbon\Carbon::parse($d->report->date)->toFormattedDateString() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Location</td>
                                            <td> : </td>
                                            <td>{{ $d->report->location }}</td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td> : </td>
                                            <td>{{ $d->report->description }}</td>
                                        </tr>
                                    </table>
                                    @else
                                    <table class="table text-center text-uppercase" border="1">
                                        <tr>
                                            <td>
                                                <a href="{{ url('admin/phpword') }}/{{ $d->id }}" target="_blank">
                                                    file report
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    @endif
                                </div>
                                <h6>
                                    <i class="ti-time"></i> {{ $d->created_at->diffForHumans() }} by
                                    @php
                                    $user = DB::table('users')->find($d->user_id);
                                    @endphp
                                    {{ $user->name }}
                                </h6>
                            </div>
                        </li>
                        @else
                        <li>
                            <div class="timeline-badge danger">
                                <i class="material-icons">radio_button_unchecked</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-success">{{ $d->message }}</span>
                                </div>
                                <div class="timeline-body">
                                    @php
                                    $user = DB::table('users')->find($d->report->assigned_to);
                                    @endphp
                                    Being handled by {{ $user->name }}
                                </div>
                                <h6>
                                    <i class="ti-time"></i> {{ $d->created_at->diffForHumans() }} by
                                    @php
                                    $user = DB::table('users')->find($d->user_id);
                                    @endphp
                                    {{ $user->name }}
                                </h6>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
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