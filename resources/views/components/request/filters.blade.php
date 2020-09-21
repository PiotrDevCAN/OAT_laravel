{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$accounts" label="Account:" :field-name="Account" :selected-value="request()->input('Account')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$reasons" label="Reason:" :field-name="Reason" :selected-value="request()->input('Reason')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$names" label="Name:" :field-name="Name" :selected-value="request()->input('Name')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$types" label="Type:" :field-name="Type" :selected-value="request()->input('Type')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$serviceLines" label="Service Line:" :field-name="ServiceLine" :selected-value="request()->input('ServiceLine')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$statuses" label="Status:" :field-name="Status" :selected-value="request()->input('Status')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$requestors" label="Requestor:" :field-name="Requestor" :selected-value="request()->input('Requestor')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$locations" label="Location:" :field-name="Location" :selected-value="request()->input('Location')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$weekenddates" label="Weekend >=:" :field-name="WeekendStart" :selected-value="request()->input('WeekendStart')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$weekenddates" label="Weekend <=:" :field-name="WeekendEnd" :selected-value="request()->input('WeekendEnd')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$imports" label="Import:" :field-name="Import" :selected-value="request()->input('Import')"/>
            </div>
		</div>
	</div>
</div>
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Approvers</h3>
            </div>
        </div>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$firstApprovers" label="Nature" :field-name="FirstApprover" :selected-value="request()->input('FirstApprover')"/>
            </div>
            <div class="ibm-col-12-4">                	
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$secondApprovers" label="Nature" :field-name="SecondApprover" :selected-value="request()->input('SecondApprover')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$thirdApprovers" label="Nature" :field-name="ThirdApprover" :selected-value="request()->input('ThirdApprover')"/>
            </div>
       	</div>
    </div>
</div>
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<p class="ibm-button-link ibm-ind-link">
            		<a id="filterFormSubmit" class="ibm-btn-pri ibm-btn-blue-50 ibm-confirm-link" href="javascript:;" onclick="jQuery('#myForm').submit();">Apply filters</a>
                	<a id="filterFormReset" class="ibm-btn-sec ibm-btn-blue-50 ibm-reset-link" href="javascript:;" onclick="commonDocumentList.resetFilters('#myForm')">Reset filters</a>
               	</p>
            </div>
		</div>
	</div>
</div>
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
                	<x-ibmv18form-input :field-name="AwaitingApprovalRequests" label="Awaiting Approval Requests:" :value="$awaiting->count()" disabled="true"/>
                </div>
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input :field-name="ApprovedRequestsHours" label="Hours:" :value="$awaitingHours" disabled="true"/>
                </div>
            @endisset
            
            @isset($approved)
            	<div class="ibm-col-12-6">
                	<x-ibmv18form-input :field-name="ApprovedRequests" label="Approved Requests:" :value="$approved->count()" disabled="true"/>
                </div>
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input :field-name="AwaitingApprovalRequestsHours" label="Hours:" :value="$approvedHours" disabled="true"/>
                </div>
            @endisset
            
            @isset($other)
            	<div class="ibm-col-12-6">
                	<x-ibmv18form-input :field-name="OtherRequests" label="Other Requests:" :value="$other->count()" disabled="true"/>
                </div>
                <div class="ibm-col-12-6">
                	<x-ibmv18form-input :field-name="OtherRequestsHours" label="Hours:" :value="$otherHours" disabled="true"/>
                </div>
            @endisset
       	</div>
    </div>
</div>
{{ Form::close() }}