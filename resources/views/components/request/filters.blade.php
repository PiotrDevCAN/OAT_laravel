{{ Form::open(['route' => 'request.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts" :selectedValue="request()->input('Account')"/>
            	<x-ibmv18form-select name="Reason" label="Reason:" :arrayOfSelectableValues="$reasons" :selectedValue="request()->input('Reason')"/>
            	<x-ibmv18form-select name="Name" label="Name:" :arrayOfSelectableValues="$names" :selectedValue="request()->input('Name')"/>
            	<x-ibmv18form-select name="Type" label="Type" :arrayOfSelectableValues="$types" :selectedValue="request()->input('Type')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="ServiceLine" label="Service Line:" :arrayOfSelectableValues="$serviceLines" :selectedValue="request()->input('ServiceLine')"/>
            	<x-ibmv18form-select name="Status" label="Status:" :arrayOfSelectableValues="$statuses" :selectedValue="request()->input('Status')"/>
            	<x-ibmv18form-select name="Requestor" label="Requestor:" :arrayOfSelectableValues="$requestors" :selectedValue="request()->input('Requestor')"/>
            	<x-ibmv18form-select name="Location" label="Location:" :arrayOfSelectableValues="$locations" :selectedValue="request()->input('Location')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="WeekendStart" label="Weekend >=:" :arrayOfSelectableValues="$weekenddates" :selectedValue="request()->input('WeekendStart')"/>
            	<x-ibmv18form-select name="WeekendEnd" label="Weekend <=:" :arrayOfSelectableValues="$weekenddates" :selectedValue="request()->input('WeekendEnd')"/>
            	<x-ibmv18form-select name="Import" label="Import:" :arrayOfSelectableValues="$imports" :selectedValue="request()->input('Import')"/>
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
            	<x-ibmv18form-select name="FirstApprover" label="1st Level:" :arrayOfSelectableValues="$firstApprovers" :selectedValue="request()->input('FirstApprover')"/>
            </div>
            <div class="ibm-col-12-4">                	
            	<x-ibmv18form-select name="SecondApprover" label="2nd Level:" :arrayOfSelectableValues="$secondApprovers" :selectedValue="request()->input('SecondApprover')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="ThirdApprover" label="3rd Level:" :arrayOfSelectableValues="$thirdApprovers" :selectedValue="request()->input('ThirdApprover')"/>
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
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input name="AwaitingApprovalRequests" label="Awaiting Approval Requests:"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input name="ApprovedRequestsHours" label="Hours:"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input name="ApprovedRequests" label="Approved Requests:"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input name="AwaitingApprovalRequestsHours" label="Hours:"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input name="OtherRequests" label="Other Requests:"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-input name="OtherRequestsHours" label="Hours:"/>
            </div>
       	</div>
    </div>
</div>
{{ Form::close() }}