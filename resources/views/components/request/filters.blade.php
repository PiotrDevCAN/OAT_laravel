{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
	            <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$accounts" label="Account:" field-name="account" :selected-value="request()->input('account')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$reasons" label="Reason:" field-name="reason" :selected-value="request()->input('reason')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$names" label="Name:" field-name="worker" :selected-value="request()->input('worker')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$types" label="Type:" field-name="approvaltype" :selected-value="request()->input('approvaltype')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$serviceLines" label="Service Line:" field-name="competency" :selected-value="request()->input('competency')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$statuses" label="Status:" field-name="status" :selected-value="request()->input('status')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$requestors" label="Requestor:" field-name="requestor" :selected-value="request()->input('requestor')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$locations" label="Location:" field-name="location" :selected-value="request()->input('location')"/>
            </div>
            <div class="ibm-col-12-4">
        		<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$weekenddates" label="Weekend >=:" field-name="WeekendStart" :selected-value="request()->input('WeekendStart')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$weekenddates" label="Weekend <=:" field-name="WeekendEnd" :selected-value="request()->input('WeekendEnd')"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$imports" label="Import:" field-name="import" :selected-value="request()->input('import')"/>
            </div>
		</div>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
	            <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approvalModes" label="Approval Mode" field-name="approval_mode" :selected-value="request()->input('approval_mode')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approverSquadLeaders" label="Squad Leader:" field-name="approver_squad_leader" :selected-value="request()->input('approver_squad_leader')"/>
            </div>
            <div class="ibm-col-12-4">
        		<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approverTribeLeaders" label="Tribe Leader:" field-name="approver_tribe_leader" :selected-value="request()->input('approver_tribe_leader')"/>
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
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$firstApprovers" label="1st Level Approver:" field-name="approver_first_level" :selected-value="request()->input('approver_first_level')"/>
            </div>
            <div class="ibm-col-12-4">                	
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$secondApprovers" label="2nd Level Approver:" field-name="approver_second_level" :selected-value="request()->input('approver_second_level')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$thirdApprovers" label="3rd Level Approver:" field-name="approver_third_level" :selected-value="request()->input('approver_third_level')"/>
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
{{ Form::close() }}