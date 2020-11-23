<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 @if($expand == true)data-open="true"@endif>{{ $name }} Requests</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small ibm-small" id="{{ $id }}"
        	
        	data-status="{{ $id }}" 
        	data-scrollaxis="x" 
        	data-info="true" 
        	data-ordering="true" 
        	data-paging="true" 
        	data-searching="true" 
        	data-widget="datatableReady" 
        	
        	>
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
            <tbody>
                @foreach ($records as $key => $record)
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
	                    <a href="#" class="ibm-bold" data-widget="tooltip" data-contentid="preview-{{ $name }}-{{ $key }}" style="text-decoration: none;">(...)</a>
                        <div id="preview-{{ $name }}-{{ $key }}" class="ibm-tooltip-content">
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
        </table>
    </div>
</div>