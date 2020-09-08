@extends('layout')

@section('content')

<x-delegate.filters/>

<x-delegate.table name="delegateTable" :records="$records" />

@endsection