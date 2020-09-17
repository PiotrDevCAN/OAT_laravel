@extends('layout')

@section('content')

<x-delegate.filters/>

@endsection

@section('bottom-section')

	@isset($records)
    	<x-delegate.table name="delegateTable" :records="$records" />
    @endisset

@endsection