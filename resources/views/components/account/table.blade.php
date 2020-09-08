<div data-widget="showhide" data-type="panel" data-open="true" class="ibm-show-hide ibm-alternate">
    <h2>Accounts List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Account</th>
                    <th>Approver</th>
                    <th>Verified</th>
                    <th>Location</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td>Edit Link</td>
                    <td>{{ $record->account }}</td>
                    <td>{{ $record->approver }}</td>
                    <td>{{ $record->verified }}</td>
                    <td>{{ $record->location }}</td>
                    <td>Delete Link</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>