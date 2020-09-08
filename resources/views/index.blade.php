@extends('layout')

@section('content')

<x-request.filters/>

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-requests.table name="Awaiting Approval" :records="$awaiting"/>
    @endisset
    
    @isset($approved)
    	<x-requests.table name="Approved" :records="$approved"/>
    @endisset
    
    @isset($other)
    	<x-requests.table name="Other" :records="$other"/>
    @endisset

@endsection