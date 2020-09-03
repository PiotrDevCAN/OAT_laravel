
{!! Form::open(['url' => 'foo/bar']) !!}
    //
{!! Form::close() !!}

@extends('layout')

@section('content')

<x-filters/>

@endsection

@section('bottom-section')

<x-requests-table name="Awaiting Approval" :records="$awaiting"/>
<x-requests-table name="Approved" :records="$approved"/>
<x-requests-table name="Other" :records="$other"/>

@endsection