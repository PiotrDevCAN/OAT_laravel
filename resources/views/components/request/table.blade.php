<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
	<h2 @if($expand == true)data-open="true"@endif>{{ $label }} Requests</h2>
    <div class="ibm-container-body">
    	<table class="ibm-data-table ibm-altrows ibm-padding-small" data-widget="datatableReady" id="{{ $id }}">
            <thead>
                <tr>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Ref</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Account</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">SL</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Reason</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Title</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Details</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Week Ending</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Name</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Serial</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Country</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Hours</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Status</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">1st Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">2nd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">3rd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Requestor</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Approval Flow</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Squad Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Tribe Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Pre</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Post</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Claim Acc</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Created</th>
                </tr>
            </thead>
            	<tr>
            		<td class="ibm-padding-top-0 ibm-padding-bottom-0">Ref</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Account</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">SL</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Reason</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Title</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Details</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Week Ending</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Name</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Serial</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Country</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Hours</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Status</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">1st Level Approval</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">2nd Level Approval</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">3rd Level Approval</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Requestor</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Approval Flow</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Squad Leader</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Tribe Leader</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Pre</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Post</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Claim Acc</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">Created</td>
            	</tr>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
// jQuery( document ).ready(function() {

// 	var tables = jQuery('.ibm-data-table');
	
// 	if (typeof (tables) !== 'undefined') {
// 		for (n=0;n<tables.length;n++){
			
// 			// default object settings
// 			var tabletDataObject = tables.eq(n).data();
			
// 			switch(tabletDataObject.widget){
// 				case 'datatableReady':

					// additional settings
// 					tabletDataObject.pageLength = -1;
// 					tabletDataObject.lengthMenu = [[10, 25, 50, -1], [10, 25, 50, "All"]];
					
					var params = {
						status: "{{ $id }}",
			        	scrollaxis: "x", 
			        	info: true,
			        	ordering: true, 
			        	paging: true, 
			        	searching: true,
			        	processing: true,
				        serverSide: true,
				        ajax: {
				            url: "{{ route('api.request.list') }}",
				            type: "POST",
				            dataSrc: "data",
				            data: function ( d ) {
				            	// awaiting
				            	// approved
				            	// other
				            	d.type = "{{ $id }}";
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

					// initialise widget
				    IBMCore.common.widget.datatable.init('#{{ $id }}', params);
// 					break;
// 				default:
// 					break;
// 			}
// 		}
// 	}
	
// });
</script>