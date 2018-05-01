@extends('layout.app')
@section('content')
    <div id="leadscontainer">
        <h1>Leads</h1>
        @if(count($leads) > 0)
                
            {{ $leads->appends('page_size', request('page_size', 20))->links() }}

            <div class="alert alert-info">Displaying {{$leads->firstItem()}} to {{$leads->lastItem()}} of {{$leads->total()}} Leads</div>
            <ul class="leads-list list-group my-4">
                @foreach($leads as $lead)
                    <li class="list-group-item" data-id="{{ $lead->id }}">
                        <a href="{{ route('lead.detail', [ 'id' => $lead->id ] ) }}">    
                            <div>Name: {{ $lead->full_name ? $lead->full_name : 'unknown' }}</div>
                            <div>Email: {{ ( !!$lead->email ? $lead->email : 'unknown' ) }}</div>
                            <div>Created: {{ date('d-m-Y', strtotime($lead->created_at)) }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>

            {{ $leads->appends('page_size', request('page_size', 20))->links() }}
            
            <div class="my-3 text-center col-12">
                <div class="bold">Items per page</div>
                <div class="btn-group btn-group-sm">
                    @foreach([5,10,20,40,50] as $page_size)
                        <a class="btn btn{{ $page_size == request('page_size', 20) ? '-primary' : '' }}" href="{{route('leads.list') . '?page_size=' . $page_size }}">{{$page_size}}</a>
                    @endforeach
                </div>
            </div>
        
        @else
            <div class="alert alert-danger">No Leads found</div>
        @endif
    </div>
    
@endsection