@extends('layout')

@section('content')

<x-log.filters/>

<x-log.table name="logTable" :records="$records" />

@endsection