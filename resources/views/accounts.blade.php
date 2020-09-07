@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
        <div class="ibm-card">
            <div class="ibm-card__content">
	        	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Accounts List</h3>
	        	
	        	<table class="ibm-data-table" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="accountsTable">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Account</th>
                            <th>Approver</th>
                            <th>Verified</th>
                            <th>Location</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $record)
                    <tr>
                        <td>Edit Link</td>
                        <td>{{ $record->account }}</td>
                        <td>{{ $record->approver }}</td>
                        <td>{{ $record->verified }}</td>
                        <td>{{ $record->location }}</td>
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