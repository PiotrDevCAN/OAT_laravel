@extends('components.request.list')

@section('summary')

<x-request.summary :approved.summary="$approved.summary" :approved-hours="$approvedHours"/>

@endsection