<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Service Lines List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Service Line</th>
                    <th>Approver</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                	<td><p class="ibm-ind-link ibm-icononly ibm-nospacing">
                    @isset($record->competency)
                    	{{ link_to_route('admin.competency.edit', '', ['competency_name' => Str::of($record->competency)->trim(), 'approver' => Str::of($record->approver)->trim()], ['class' => 'ibm-edit-link']) }}
                    @endisset
                    </p></td>
                	<td>{{ $record->competency }}</td>
                    <td>{{ $record->approver }}</td>
                    <td><p class="ibm-ind-link ibm-icononly ibm-nospacing"><a class="ibm-close-link" href="{{-- route('admin.competency.delete', ['ref' => '1']) --}}"></a></p></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Edit</th>
                    <th>Service Line</th>
                    <th>Approver</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>