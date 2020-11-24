@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
        @yield('summary')
    @endif

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-request.table name="awaitingTable" id="awaitingTable" label="Awaiting Approval" :records="$awaiting" expand="true"/>
    @endisset
    
    

<script type="text/javascript">
// jQuery( document ).ready(function() {

	var tables = jQuery('.ibm-data-table');
	
	if (typeof (tables) !== 'undefined') {
		for (n=0;n<tables.length;n++){
			
			// default object settings
			var tabletDataObject = tables.eq(n).data();

			console.log('tabletDataObject');
			console.log(tabletDataObject);
			
			switch(tabletDataObject.widget){
				case 'datatableReady':
					
					var params = {
						
						status: tables.eq(n).attr('id'),
			        	scrollaxis: "x", 
			        	info: true,
			        	ordering: true, 
			        	paging: true, 
			        	searching: true

			        	/*
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
				        
				        deferLoading: 10,
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
				        */
				    };

					// additional settings
// 					tabletDataObject.pageLength = -1;
// 					tabletDataObject.lengthMenu = [[10, 25, 50, -1], [10, 25, 50, "All"]];
					
					console.log('params');
					console.log(params);
					
					console.log('yourTableId');
					console.log(tables.eq(n).attr('id'));
					
					console.log('yourTableDOMelement');
					console.log(tables[n]);
					
				    IBMCore.common.widget.datatable.init(tables[n], params);

// 				    IBMCore.common.widget.datatable.init(tables[n]);
					
// 				    IBMCore.common.widget.datatable.init("#awaiting");
				    
// 				    jQuery("#awaiting").data("widget").destroy();
				    
					break;
				default:
					break;
			}
		}
	}
	
// });
</script>

@endsection