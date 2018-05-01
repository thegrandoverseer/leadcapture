@extends('layout.app')
@section('content')

    @if( empty($lead))
        <div class="alert alert-danger">
            Invalid Lead
            <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
        </div>
    @else        
        <div class="lead-detail card col-12 col-md-5 col-xl-4 shadow mx-auto mt-5" data-id="{{ $lead->id }}">
            <div class="card-body">
                <h3 class="card-title">
                    Lead Detail
                </h3>
                <div class="card-text mb-3">
                    <div><b>Name:</b> {{ $lead->fullname ? $lead->fullName : 'unknown' }}</div>
                    <div><b>Email:</b> {{ $lead->email ? $lead->email : 'unknown' }}</div>
                    <div><b>Phone:</b> {{ $lead->phone ? $lead->phone : 'unknown' }}</div>
                    <div><b>Address:</b> {!! $lead->address ? '<br />' . implode('<br />', explode("\n", $lead->address)) : 'unknown' !!}</div>
                    <div><b>Home Square feet:</b> {{ $lead->sqft ? $lead->sqft : 'unknown' }}</div>
                    <div><b>Created:</b> {{ date('F j, Y, g:ia T', strtotime($lead->created_at) ) }}</div>
                </div>
                <p>
                    <a href="{{ URL::previous() }}" class="card-link">Back</a>
                </p>
            </div>
        </div>
    @endif
@endsection