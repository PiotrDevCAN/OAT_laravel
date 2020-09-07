<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2>{{ $name }} Requests</h2>
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
                @foreach ($records as $record)
                <tr>
                    <td><a href="p_request.php?ref={{ $record->reference }}">{{ $record->reference }}</a></td>
                    <td>{{ $record->account }}</td>
                    <td>{{ $record->competency }}</td>
                    <td>{{ $record->nature }}</td>
                    <td>{{ $record->title }}</td>
                    <td>{{ Str::limit($record->details, 50, ' (...)') }}</td>
                    <td>{{ $record->weekenddate }}</td>
                    <td><x-mailto-link :email=$record->worker/></td>
                    <td>{{ $record->serial }}</td>
                    <td>{{ $record->location }}</td>
                    <td>{{ $record->hours }}</td>
                    <td>{{ $record->status }}</td>
                    <x-approvers-info :record="$record"/>
                    <td><x-mailto-link :email=$record->requestor/></td>
                    <td><a href="p_request.php?ref={{ $record->supercedes }}">{{ $record->supercedes }}</a>
                    <td><a href="p_request.php?ref={{ $record->supercededby }}">{{ $record->supercededby }}</a></td>
                    <td>{{ $record->claim_acc_id }}</td>
                    <td>{{ $record->created_ts }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>