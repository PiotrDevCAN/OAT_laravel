{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'summaryForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Summary</h3>
            </div>
        </div>
        <div class="ibm-fluid">
        	@isset($awaiting)
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input field-name="AwaitingApprovalRequests" label="Awaiting Approval Requests:" value="0" disabled="true"/>
                </div>
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input field-name="ApprovedRequestsHours" label="Hours:" :value="$awaitingHours" disabled="true"/>
                </div>
            @endisset
            
            @isset($approved)
            	<div class="ibm-col-12-6">
                	<x-ibmv18form-input field-name="ApprovedRequests" label="Approved Requests:" value="0" disabled="true"/>
                </div>
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input field-name="AwaitingApprovalRequestsHours" label="Hours:" :value="$approvedHours" disabled="true"/>
                </div>
            @endisset
            
            @isset($other)
            	<div class="ibm-col-12-6">
                	<x-ibmv18form-input field-name="OtherRequests" label="Other Requests:" value="0" disabled="true"/>
                </div>
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input field-name="OtherRequestsHours" label="Hours:" :value="$otherHours" disabled="true"/>
                </div>
            @endisset
       	</div>
    </div>
</div>
{{ Form::close() }}