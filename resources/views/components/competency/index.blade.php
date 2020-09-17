@extends('layout')

@section('content')

<x-competency.filters/>

@endsection

@section('bottom-section')

	@isset($records)
		<x-competency.table name="serviceLinesTable" :records="$records" />
    @endisset

@endsection