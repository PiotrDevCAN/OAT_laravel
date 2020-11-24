@extends('components.request.list')

@section('summary')

<x-request.summary :approved-total="$approved-total" :approved-hours="$approvedHours"/>

@endsection