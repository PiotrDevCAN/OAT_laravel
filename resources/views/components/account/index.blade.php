@extends('layout')

@section('content')

{{ dd($request) }}

<x-account.filters/>

<x-account.table name="accountsTable" :records="$records" />

@endsection