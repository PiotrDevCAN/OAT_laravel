<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Delegates List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>User Intranet</th>
                    <th>Delegate Intranet</th>
                    <th>Delegate Notes Id</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td><a href="p_account.php?ACCOUNT=.Multiple+Accounts%2FInternal+Operations&LOCATION=&function=edit">Edit</a></td>
                    <td>{{ $record->user_intranet }}</td>
                    <td>{{ $record->delegate_intranet }}</td>
                    <td>{{ $record->delegate_notesid }}</td>
                    <td><a href="p_account.php?ACCOUNT=.Multiple+Accounts%2FInternal+Operations&LOCATION=&function=delete">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>