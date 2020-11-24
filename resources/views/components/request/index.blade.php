@extends('components.request.list')

@section('summary')

<x-request.summary :awaiting-total="$awaitingTotal" :awaiting-hours="$awaitingHours" :approved-total="$approvedTotal" :approved-hours="$approvedHours" :other-total="$otherTotal" :other-hours="$otherHours"/>

@endsection