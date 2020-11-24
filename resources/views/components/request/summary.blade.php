{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'summaryForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Summary</h3>
            </div>
        </div>
        <div class="ibm-fluid">
        	<div class="ibm-col-12-6">
            	<x-ibmv18form-input field-name="AwaitingApprovalRequests" label="Awaiting Approval Requests:" :value="{{ $awaitingTotal ?? '0' }}" disabled="true"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input field-name="ApprovedRequestsHours" label="Hours:" :value="{{ $awaitingHours ?? '0' }}" disabled="true"/>
            </div>
        	
        	<div class="ibm-col-12-6">
            	<x-ibmv18form-input field-name="ApprovedRequests" label="Approved Requests:" :value="{{ $approvedTotal ?? '0' }}" disabled="true"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input field-name="AwaitingApprovalRequestsHours" label="Hours:" :value="{{ $approvedHours ?? 0 }}" disabled="true"/>
            </div>
        	
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input field-name="OtherRequests" label="Other Requests:" :value="{{ $otherTotal ?? '0' }}" disabled="true"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input field-name="OtherRequestsHours" label="Hours:" :value="{{ $otherHours ?? '0' }}" disabled="true"/>
            </div>
       	</div>
    </div>
</div>
{{ Form::close() }}