@extends('components.request.list')

@section('summary')

<x-request.summary :approved="$approved" :approved-hours="$approvedHours"/>

@endsection