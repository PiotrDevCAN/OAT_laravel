@extends('layout')

@section('content')

<x-request.filters :awaiting="$awaiting" :awaitingHours="$awaitingHours" :approved="$approved" :approvedHours="$approvedHours" :other="$other" :otherHours="$otherHours" />

@endsection

@section('bottom-section')

@endsection