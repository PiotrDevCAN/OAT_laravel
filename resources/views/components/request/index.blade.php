@extends('layout')

@section('content')

<x-request.filters 
@isset($awaiting)
	:awaiting="$awaiting" 
@endisset
@isset($approved)
	:approved="$approved"
@endisset
@isset($other)
	:other="$other"
@endisset
/>

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-request.table name="Awaiting Approval" :records="$awaiting" expand="true"/>
    @endisset
    
    @isset($approved)
    	<x-request.table name="Approved" :records="$approved"/>
    @endisset
    
    @isset($other)
    	<x-request.table name="Other" :records="$other"/>
    @endisset

@endsection