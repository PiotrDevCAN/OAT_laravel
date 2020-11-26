@extends('layout')

@section('content')

<x-log.filters/>

@isset($records)

	@isset($lists)
    	@foreach ($lists as $list)
    		<x-log.table :list="$list"/>
        @endforeach
	@endisset

@endisset

@endsection