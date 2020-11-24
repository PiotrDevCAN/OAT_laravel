@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
    	@yield('summary')
    @endif

@endsection

@section('bottom-section')

	@isset($lists)
    	@foreach ($items as $list)
    		<x-request.table :list="$list" :expand="$loop->first" />        
        @endforeach
	@endisset

@endsection