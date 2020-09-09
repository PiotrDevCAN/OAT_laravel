<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Accounts List</h2>
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
                    <td><a href="p_account.php?ACCOUNT=.Multiple+Accounts%2FInternal+Operations&LOCATION=&function=edit">Edit</a></td>
                    <td>{{ $record->account }}</td>
                    <td>{{ $record->approver }}</td>
                    <td>{{ $record->verified }}</td>
                    <td>{{ $record->location }}</td>
                    <td><a href="p_account.php?ACCOUNT=.Multiple+Accounts%2FInternal+Operations&LOCATION=&function=delete">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>