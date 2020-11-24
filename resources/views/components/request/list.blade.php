@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
        @yield('summary')
    @endif

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-request.table name="awaitingTable" id="awaitingTable" label="Awaiting Approval" :records="$awaiting" expand="true"/>
    @endisset
    
    @isset($approved)
    	<x-request.table name="approvedTable" id="approved" label="Approved" :records="$approved"/>
    @endisset
    
    @isset($other)
    	<x-request.table name="otherTable" id="other" label="Other" :records="$other"/>
    @endisset
    
@endsection