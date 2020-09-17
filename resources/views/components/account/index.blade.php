@extends('layout')

@section('content')

<x-account.filters/>

@endsection

@section('bottom-section')

	@isset($records)
		<x-account.table name="accountsTable" :records="$records" />
    @endisset

@endsection