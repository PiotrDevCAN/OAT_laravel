@extends('layout')

@section('content')

<x-log.filters/>

@isset($records)
	<x-log.table name="Logs" :records="$records" />
@endisset

@endsection