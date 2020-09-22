@extends('index')

@section('summary')

<x-request.summary :approved="$approved" :approved-hours="$approvedHours"/>

@endsection