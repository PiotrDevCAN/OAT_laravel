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
			            "url": "https://soiwapi-new.icds.ibm.com/OAT_laravel/api/request/list",
			            "type": "POST",

		            	"dataSrc": data,
		                "datatype": "json",
		                "contentType": "application/json; charset=utf-8"
		                
			        };
					tabletDataObject.columns = [
						{ "data": 'reference' },
						{ "data": 'requestor' },
						{ "data": 'requested' },
						{ "data": 'competency' },
						{ "data": 'approvaltype' },
						{ "data": 'title' },
						{ "data": 'account' },
						{ "data": 'weekenddate' },
						{ "data": 'nature' },
						{ "data": 'details' },
						{ "data": 'worker' },
						{ "data": 'serial' },
						{ "data": 'hours' },
						{ "data": 'status' },
						{ "data": 'rejection' },
						{ "data": 'supercedes' },
						{ "data": 'supercededby' },
						{ "data": 'claim_acc_id' },
						{ "data": 'approver_first_level' },
						{ "data": 'approver_first_level_ts' },
						{ "data": 'approver_second_level' },
						{ "data": 'approver_second_level_ts' },
						{ "data": 'approver_third_level' }
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