<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 @if($expand == true)data-open="true"@endif>{{ $name }} Requests</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small ibm-small" 
        	
        	
        	data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatableReady" id="{{ $name }}">
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
        </table>
    </div>
</div>