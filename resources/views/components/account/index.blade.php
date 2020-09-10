@extends('layout')

@section('content')

<x-account.filters :request="$request"/>

<x-account.table name="accountsTable" :records="$records" />

@endsection