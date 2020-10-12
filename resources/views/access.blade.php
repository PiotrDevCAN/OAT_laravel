@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
        <div class="ibm-card">
            <div class="ibm-card__content">
	        	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">My Access</h3>
	        	<p>Name : {{ $user->name }}</p>
	        	<p>Userid : {{ $user->email }}</p>
	        	<p>CNUM : {{ $user->cnum }}</p>
	        	<p>Has access to these OAT Bluegroups : 'OAT_User', 'OAT_Admin'</p>
	        </div>
        </div>
	</div>
</div>

@endsection