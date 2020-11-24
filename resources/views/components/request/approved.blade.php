@extends('components.request.list')

@section('summary')

<x-request.summary :approved-total="$approvedTotal" :approved-hours="$approvedHours"/>

@endsection