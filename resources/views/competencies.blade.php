@extends('layout')

@section('content')

<x-competency.filters/>

<x-competency.table name="serviceLinesTable" :records="$records" />

@endsection