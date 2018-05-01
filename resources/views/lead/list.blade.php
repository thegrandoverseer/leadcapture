@extends('layout.app')
@section('content')
    <h1>Leads</h1>
    @if(count($leads) > 0)
    <ul class="leads-list">
    @foreach($leads as $lead)
        <li data-id="{{ $lead->id }}">
            <div>Name: {{ $lead->full_name ? $lead->full_name : 'unknown' }}</div>
            <div>Email: {{ ( !!$lead->email ? $lead->email : 'unknown' ) }}</div>
            <div>Created: {{ date('d-m-Y', strtotime($lead->created_at)) }}</div>
        </li>
    @endforeach
    </ul>
    @else
        <div class="alert">No Leads found</div>
    @endif
@endsection