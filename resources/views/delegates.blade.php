@extends('layout')

@section('content')

<x-delegate.filters/>

<x-delegates.table name="delegateTable" :records="$records" />

@endsection