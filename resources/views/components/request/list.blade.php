@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
    	@yield('summary')
    @endif

@endsection

@section('bottom-section')

	@isset($lists)
    	@foreach ($lists as $list)
    		<x-request.table :list="$list" @if ($loop->first) expand="true" @endif/>
        @endforeach
	@endisset

@endsection