@extends('layout')

@section('content')

<x-request.filters/>

<x-request.summary :awaiting="$awaiting" :awaiting-hours="$awaitingHours" :approved="$approved" :approved-hours="$approvedHours" :other="$other" :other-hours="$otherHours" basic-attribute="test_1"  basic-attribute-2="test_2"/>

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