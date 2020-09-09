<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">{{ $name }} Entries</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Log Entry</th>
                    <th>Last Updated</th>
                    <th>Last Updater</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td>Edit Link</td>
                    <td>{{ $record->log_entry }}</td>
                    <td>{{ $record->last_updated }}</td>
                    <td>{{ $record->last_updater }}</td>
                    <td>Delete Link</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>