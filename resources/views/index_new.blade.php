
use Collective\Html\HtmlFacade;

@extends('layout')

@section('content')

{{ HTML::mailto('a@b.c') }}

<x-filters/>

@endsection

@section('bottom-section')

<x-requests-table name="Awaiting Approval" :records="$awaiting"/>
<x-requests-table name="Approved" :records="$approved"/>
<x-requests-table name="Other" :records="$other"/>

@endsection