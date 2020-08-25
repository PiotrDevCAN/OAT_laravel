@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
        <div class="ibm-card">
            <div class="ibm-card__content">
	        	<h2 class="ibm-bold ibm-h2">Service Lines list</h2>
	        	
	        	<table class="ibm-data-table" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="serviceLinesTable">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Service Line</th>
                            <th>Approver</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $record)
                    <tr>
                        <td>Edit Link</td>
                        <td>{{ $record->competency }}</td>
                        <td>{{ $record->approver }}</td>
                        <td>Delete Link</td>
                    </tr>
                    @endforeach
                </tbody>
                    <tbody>
                        
                    </tbody>
                </table>
	        	
	        </div>
        </div>
	</div>
</div>

@endsection