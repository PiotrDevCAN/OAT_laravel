<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
	<h2 @if($expand == true)data-open="true"@endif>{{ $list->label }} Requests</h2>
    <div class="ibm-container-body">
    	<table class="ibm-data-table ibm-altrows ibm-padding-small" width="100%" data-widget="datatableReady" id="{{ $list->id }}">
            <thead>
                <tr>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Account</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Account</th>
                </tr>
            </tfoot>            
        </table>
    </div>
</div>

<script type="text/javascript">

// var n = document.createElement('script');
// n.setAttribute('language', 'JavaScript');
// n.setAttribute('src', 'https://debug.datatables.net/debug.js');
// document.body.appendChild(n);

jQuery( document ).ready(function() {

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
					
					var requestData = {
						type: "{{ $list->id }}"
					};
					
					var params = {
// 						status: "{{ $list->id }}",
// 			        	scrollaxis: "x", 
// 			        	info: true,
// 			        	ordering: true, 
// 			        	paging: true, 
// 			        	searching: true,
// 			        	processing: true,
// 				        serverSide: true,
				        ajax: {
				        	async: false,
				        	contentType: "application/json; charset=utf-8",
				        	type: "POST",
				            url: "{{ route('api.request.list') }}",
				        	data: requestData,
				        	dataType: "json",
				            dataSrc: "data"
				        },
                        columns: [
                        	{ data: 'requestor'}
                        ]
                        /*
				        deferLoading: {{ $list->records->total() }},
				        columns: [
				        	{ 
					        	data: 'reference',
					        	render: function(data, type) {
									console.log(data);
								    return data;
				                }
							},
							{ 
					        	data: 'account',
					        	render: function(data, type) {
									console.log(data);
								    return data;
				                }
							},
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
				        ]
				        */
				    };

					// initialise widget
				    IBMCore.common.widget.datatable.init('#{{ $list->id }}', params);

				    IBMCore.common.widget.selectlist.init(document.getElementsByName("{{ $list->id }}_length"));
// 					break;
// 				default:
// 					break;
// 			}
// 		}
// 	}
	
});
</script>