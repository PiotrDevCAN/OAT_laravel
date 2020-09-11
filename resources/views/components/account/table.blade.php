<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Accounts List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th class="ibm-nospacing">Edit</th>
                    <th class="ibm-nospacing">Account</th>
                    <th class="ibm-nospacing">Approver</th>
                    <th class="ibm-nospacing">Verified</th>
                    <th class="ibm-nospacing">Location</th>
                    <th class="ibm-nospacing">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td class="ibm-nospacing"><a href="p_account.php?ACCOUNT=.Multiple+Accounts%2FInternal+Operations&LOCATION=&function=edit">Edit</a></td>
                    <td class="ibm-nospacing">{{ $record->account }}</td>
                    <td class="ibm-nospacing">{{ $record->approver }}</td>
                    <td class="ibm-nospacing">{{ $record->verified }}</td>
                    <td class="ibm-nospacing">{{ $record->location }}</td>
                    <td class="ibm-nospacing"><a href="p_account.php?ACCOUNT=.Multiple+Accounts%2FInternal+Operations&LOCATION=&function=delete">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>