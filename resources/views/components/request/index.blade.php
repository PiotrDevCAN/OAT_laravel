@extends('components.request.list')

@section('summary')

<x-request.summary :awaiting="$awaiting" :awaiting-total="$awaitingTotal" :awaiting-hours="$awaitingHours" :approved="$approved" :approved-total="$approvedTotal" :approved-hours="$approvedHours" :other="$other" :other-total="$otherTotal" :other-hours="$otherHours"/>

@endsection