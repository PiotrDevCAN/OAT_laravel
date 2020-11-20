@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
        @yield('summary')
    @endif

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-request.table name="Awaiting Approval" :records="$awaiting" expand="true"/>
    @endisset
    
    @isset($approved)
    	<x-request.table name="Approved" :records="$approved"/>
    @endisset
    
    @isset($other)
    	<x-request.table name="Other" :records="$other"/>
    @endisset



<script type="text/javascript">
jQuery( document ).ready(function() {

	var tableData = jQuery('.ibm-data-table');
	
	if (typeof (tableData) !== 'undefined') {
		for (n=0;n<tableData.length;n++){
			
			// default object settings
			var tabletDataObject = tableData.eq(n).data();
			
			switch(tabletDataObject.widget){
				case 'datatableReady':
					
					// additional settings
// 					tabletDataObject.pageLength = -1;
// 					tabletDataObject.lengthMenu = [[10, 25, 50, -1], [10, 25, 50, "All"]];

					tabletDataObject.processing = true;
					tabletDataObject.serverSide = true;
					tabletDataObject.ajax = {
			            url: 'https://soiwapi-new.icds.ibm.com/OAT_laravel/api/request/list',
			            type: 'POST',
			            dataSrc: 'data'
			        };

					tabletDataObject.columns = [
						{ data: 'reference' },
						{ data: 'account' },
						{ data: 'competency' },
						{ data: 'nature' },
						{ data: 'title' },
						{ data: 'details' },
						{ data: 'weekenddate' },
						{ data: 'worker' },
						{ data: 'serial' },
						{ data: 'location' },
						{ data: 'hours' },
						{ data: 'status' },
						{ data: 'approver_first_level' },
						{ data: 'approver_second_level' },
						{ data: 'approver_third_level' },
						{ data: 'requestor' },
						{ data: 'approval_mode' },
						{ data: 'approver_squad_leader' },
						{ data: 'approver_tribe_leader' },
						{ data: 'supercedes' },
						{ data: 'supercededby' },
						{ data: 'claim_acc_id' },
						{ data: 'created_ts' }
			        ];
					
				    IBMCore.common.widget.datatable.init(tableData[n], tabletDataObject);
				    
					break;
				default:
					break;
			}
		}
	}
	
});
</script>

@endsection