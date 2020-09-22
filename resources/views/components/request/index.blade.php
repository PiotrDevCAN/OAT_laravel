@extends('list')

@section('summary')

<x-request.summary :awaiting="$awaiting" :awaiting-hours="$awaitingHours" :approved="$approved" :approved-hours="$approvedHours" :other="$other" :other-hours="$otherHours"/>

@endsection