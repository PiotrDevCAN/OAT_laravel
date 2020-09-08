@extends('layout')

@section('content')

<x-log.filters/>

<x-competency.table name="logTable" :records="$records" />

@endsection