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
    		<x-request.table name="$list['name']" id="$list['id']" label="$list['label']" records="$list['records']" @if ($loop->first) expand="true" @endif/>
        @endforeach
	@endisset

@endsection