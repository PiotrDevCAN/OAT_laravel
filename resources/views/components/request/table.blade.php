<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">{{ $name }} Requests</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th class="ibm-nospacing">Ref</th>
                    <th class="ibm-nospacing">Account</th>
                    <th class="ibm-nospacing">SL</th>
                    <th class="ibm-nospacing">Reason</th>
                    <th class="ibm-nospacing">Title</th>
                    <th class="ibm-nospacing">Details</th>
                    <th class="ibm-nospacing">Week Ending</th>
                    <th class="ibm-nospacing">Name</th>
                    <th class="ibm-nospacing">Serial</th>
                    <th class="ibm-nospacing">Country</th>
                    <th class="ibm-nospacing">Hours</th>
                    <th class="ibm-nospacing">Status</th>
                    <th class="ibm-nospacing">1st Level Approval</th>
                    <th class="ibm-nospacing">2nd Level Approval</th>
                    <th class="ibm-nospacing">3rd Level Approval</th>
                    <th class="ibm-nospacing">Requestor</th>
                    <th class="ibm-nospacing">Pre</th>
                    <th class="ibm-nospacing">Post</th>
                    <th class="ibm-nospacing">Claim Acc</th>
                    <th class="ibm-nospacing">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td class="ibm-nospacing"><a href="p_request.php?ref={{ $record->reference }}">{{ $record->reference }}</a></td>
                    <td class="ibm-nospacing">{{ $record->account }}</td>
                    <td class="ibm-nospacing">{{ $record->competency }}</td>
                    <td class="ibm-nospacing">{{ $record->nature }}</td>
                    <td class="ibm-nospacing">{{ $record->title }}</td>
                    <td class="ibm-nospacing">{{ Str::limit($record->details, 50, ' (...)') }}</td>
                    <td class="ibm-nospacing">{{ $record->weekenddate }}</td>
                    <td class="ibm-nospacing"><x-mailto-link :email="$record->worker"/></td>
                    <td class="ibm-nospacing">{{ $record->serial }}</td>
                    <td class="ibm-nospacing">{{ $record->location }}</td>
                    <td class="ibm-nospacing">{{ $record->hours }}</td>
                    <td class="ibm-nospacing">{{ $record->status }}</td>
                    <x-request.approvers-info :record="$record"/>
                    <td class="ibm-nospacing"><x-mailto-link :email="$record->requestor"/></td>
                    <td class="ibm-nospacing"><a href="p_request.php?ref={{ $record->supercedes }}">{{ $record->supercedes }}</a>
                    <td class="ibm-nospacing"><a href="p_request.php?ref={{ $record->supercededby }}">{{ $record->supercededby }}</a></td>
                    <td class="ibm-nospacing">{{ $record->claim_acc_id }}</td>
                    <td class="ibm-nospacing">{{ $record->created_ts }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>