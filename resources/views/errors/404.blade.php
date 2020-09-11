@extends('errors::minimal')

@extends('layout')

@section('content')

@section('title', __('Not Found'))
@section('code', '404')
aaa
@if($exception)
    @section('message', $exception->getMessage())
@else
    @section('message', __('Not Found'))
@endif

@endsection