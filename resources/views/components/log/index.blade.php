@extends('layout')

@section('content')

<x-log.filters/>

@endsection

@section('bottom-section')

	@isset($records)
		<x-log.table name="Logs" :records="$records" />
    @endisset

@endsection