@extends('layout')

@section('content')

<x-log.filters/>

<x-log.table name="Logs" :records="$records" />

@endsection