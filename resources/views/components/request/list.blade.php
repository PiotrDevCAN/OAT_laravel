@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
        @yield('summary')
    @endif

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-request.table name="Awaiting Approval" id="awaiting" :records="$awaiting" expand="true"/>
    @endisset
    
    

<script type="text/javascript">
jQuery( document ).ready(function() {

	var tableData = jQuery('.ibm-data-tableAAAA');
	
	if (typeof (tableData) !== 'undefined') {
		for (n=0;n<tableData.length;n++){
			
			// default object settings
			var tabletDataObject = tableData.eq(n).data();

			switch(tabletDataObject.widget){
				case 'datatableReady':

					/*
					var params = {
						
						status: tableData.eq(n).attr('id'),
			        	scrollaxis: "x", 
			        	info: true,
			        	ordering: true, 
			        	paging: true, 
			        	searching: true,
			        	
// 				        processing: true,
				        serverSide: true,

				        ajax: {
				            url: "https://soiwapi-new.icds.ibm.com/OAT_laravel/api/request/list",
				            type: "POST",
				            dataSrc: "data",
				            data: function ( d ) {
				            	// awaiting
				            	// approved
				            	// other
				            	d.type = "awaiting";
				            }
				        },
				        
				        deferLoading: 57,
				        columns: [
				        	{ "data": "reference" },
							{ "data": "account" },
							{ "data": "competency" },
							{ "data": "nature" },
							{ "data": "title" },
							{ "data": "details" },
							{ "data": "weekenddate" },
							{ "data": "worker" },
							{ "data": "serial" },
							{ "data": "location" },
							{ "data": "hours" },
							{ "data": "status" },
							{ "data": "approver_first_level" },
							{ "data": "approver_second_level" },
							{ "data": "approver_third_level" },
							{ "data": "requestor" },
							{ "data": "approval_mode" },
							{ "data": "approver_squad_leader" },
							{ "data": "approver_tribe_leader" },
							{ "data": "supercedes" },
							{ "data": "supercededby" },
							{ "data": "claim_acc_id" },
							{ "data": "created_ts" }
				        ]
				    };
				    */

					var params = {}
					
					console.log(params);
					
					// additional settings
// 					tabletDataObject.pageLength = -1;
// 					tabletDataObject.lengthMenu = [[10, 25, 50, -1], [10, 25, 50, "All"]];

				    IBMCore.common.widget.datatable.init(tableData[n], params);
				    
					break;
				default:
					break;
			}
		}
	}
	
});
</script>

@endsection