@extends('layout')

@section('content')

<x-account.filters/>

<x-account.table name="accountsTable" :records=$records />

@endsection