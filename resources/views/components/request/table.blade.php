<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
	<h2 @if($expand == true)data-open="true"@endif>{{ $list->label }} Requests</h2>
    <div class="ibm-container-body">
    	<table class="ibm-data-table ibm-altrows ibm-padding-small" width="100%" data-widget="datatableReady" id="{{ $list->id }}">
            <thead>
                <tr>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Ref</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Account</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Service Line</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Reason</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Title</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Details</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Week Ending</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Name</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Serial</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Country</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Hours</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Status</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">1st Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">2nd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">3rd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Requestor</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Approval Flow</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Squad Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Tribe Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Pre</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Post</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Claim Acc</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list->records as $key => $record)
                <tr>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    @isset($record->reference)
                    	{{ link_to_route('request.show', $title = $record->reference, ['overtimeRequest' => $record->reference]) }}
                    @endisset
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0 ibm-bold">
                    	{{ $record->account }}
                    	@isset($record->comment)
                    		<p class="ibm-ind-link ibm-icononly">
                    		<a href="#" class="ibm-requestquote-link" data-widget="tooltip" data-contentid="preview-comments-{{ $record->reference }}-{{ $record->comment->reference }}" style="text-decoration: none;"></a>
                    		</p>
                    		<div id="preview-comments-{{ $record->reference }}-{{ $record->comment->reference }}" class="ibm-tooltip-content">
    							<p>{{ $record->comment->text }}</p>
                            	<p>{{ $record->comment->creator }}</p>
                            	<p>{{ $record->comment->created }}</p>
                            </div>
                        @endisset
                	</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->competency }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->nature }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->title }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    {{ Str::limit($record->details, 50, '') }}
                    @if(Str::length($record->details) >= 50)
	                    <a href="#" class="ibm-bold" data-widget="tooltip" data-contentid="preview-{{ $list->name }}-{{ $key }}" style="text-decoration: none;">(...)</a>
                        <div id="preview-{{ $list->name }}-{{ $key }}" class="ibm-tooltip-content">
                        	{{ $record->details }}
                        </div>
                    @endif
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->weekenddate }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->worker"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->serial }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->location }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->hours }}</td>
                    <td class="ibm-bold">{{ $record->status }}</td>
                    <x-request.approvers-info :record="$record"/>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->requestor"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->approval_mode }}
                    Change flow to...
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->approver_squad_leader"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->approver_tribe_leader"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    @isset($record->supercedes)
                    	{{ link_to_route('request.show', $title = $record->supercedes, ['overtimeRequest' => $record->supercedes]) }}
                    @endisset
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    @isset($record->supercededby)
                   		{{ link_to_route('request.show', $title = $record->supercededby, ['overtimeRequest' => $record->supercededby]) }}
                    @endisset
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->claim_acc_id }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->created_ts }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Ref</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Account</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0">Service Line</th>
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
            </tfoot>            
        </table>
    </div>
</div>

<script type="text/javascript">

var n = document.createElement('script');
n.setAttribute('language', 'JavaScript');
n.setAttribute('src', 'https://debug.datatables.net/debug.js');
document.body.appendChild(n);

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
					
					var data = {
						type: "{{ $list->id }}"
					};
					
					var params = {
						status: "{{ $list->id }}",
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
				            dataType: 'json',
				            data: data,
				            success: function(response) {
				                alert(response.draw);
				            }
				        },
				        deferLoading: {{ $list->records->total() }},
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

					// initialise widget
				    IBMCore.common.widget.datatable.init('#{{ $list->id }}', params);
// 					break;
// 				default:
// 					break;
// 			}
// 		}
// 	}
	
});
</script>