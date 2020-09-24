<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 @if($expand == true)data-open="true"@endif>{{ $name }} Requests</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Ref</th>
                    <th>Account</th>
                    <th>SL</th>
                    <th>Reason</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Week Ending</th>
                    <th>Name</th>
                    <th>Serial</th>
                    <th>Country</th>
                    <th>Hours</th>
                    <th>Status</th>
                    <th>1st Level Approval</th>
                    <th>2nd Level Approval</th>
                    <th>3rd Level Approval</th>
                    <th>Requestor</th>
                    <th>Pre</th>
                    <th>Post</th>
                    <th>Claim Acc</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $key => $record)
                <tr>
                    <td>
                    @isset($record->reference)
                    	{{ link_to_route('request.edit', $title = $record->reference, $parameters = ['overtimeRequest' => $record->reference], $attributes = []) }}
                    @endisset
                    </td>
                    <td class="ibm-bold">
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
                    <td>{{ $record->competency }}</td>
                    <td>{{ $record->nature }}</td>
                    <td>{{ $record->title }}</td>
                    <td>
                    {{ Str::limit($record->details, 50, '') }}
                    @if(Str::length($record->details) >= 50)
	                    <a href="#" class="ibm-bold" data-widget="tooltip" data-contentid="preview-{{ $name }}-{{ $key }}" style="text-decoration: none;">(...)</a>
                        <div id="preview-{{ $name }}-{{ $key }}" class="ibm-tooltip-content">
                        	{{ $record->details }}
                        </div>
                    @endif
                    </td>
                    <td>{{ $record->weekenddate }}</td>
                    <td ><x-mailto-link :email="$record->worker"/></td>
                    <td>{{ $record->serial }}</td>
                    <td>{{ $record->location }}</td>
                    <td>{{ $record->hours }}</td>
                    <td class="ibm-bold">{{ $record->status }}</td>
                    <x-request.approvers-info :record="$record"/>
                    <td><x-mailto-link :email="$record->requestor"/></td>
                    <td>
                    @isset($record->supercedes)
                    	{{ link_to_route('request.edit', $title = $record->supercedes, $parameters = ['overtimeRequest' => $record->supercedes], $attributes = []) }}
                    @endisset
                    <td>
                    @isset($record->supercededby)
                   		{{ link_to_route('request.edit', $title = $record->supercededby, $parameters = ['overtimeRequest' => $record->supercededby], $attributes = []) }}
                    @endisset
                    </td>
                    <td>{{ $record->claim_acc_id }}</td>
                    <td>{{ $record->created_ts }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>