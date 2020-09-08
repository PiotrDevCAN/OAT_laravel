{{ Form::open(['route' => 'list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Requests List Filters{{ $title }}</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts"/>
            	<x-ibmv18form-select name="Reason" label="Reason:" :arrayOfSelectableValues="$reasons"/>
            	<x-ibmv18form-select name="Name" label="Name:" :arrayOfSelectableValues="$names"/>
            	<x-ibmv18form-select name="Type" label="Type" :arrayOfSelectableValues="$types"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="Service Line" label="ServiceLine:" :arrayOfSelectableValues="$serviceLines"/>
            	<x-ibmv18form-select name="Status" label="Status:" :arrayOfSelectableValues="$statuses"/>
            	<x-ibmv18form-select name="Requestor" label="Requestor:" :arrayOfSelectableValues="$requestors"/>
            	<x-ibmv18form-select name="Location" label="Location:" :arrayOfSelectableValues="$locations"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="WeekendStart" label="Weekend >=:" :arrayOfSelectableValues="$weekenddates"/>
            	<x-ibmv18form-select name="WeekendEnd" label="Weekend <=:" :arrayOfSelectableValues="$weekenddates"/>
            	<x-ibmv18form-select name="Import" label="Import:" :arrayOfSelectableValues="$imports"/>
            </div>
		</div>
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Approvers</h3>
            </div>
        </div>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="FirstApprover" label="1st Level:" :arrayOfSelectableValues="$firstApprovers"/>
            </div>
            <div class="ibm-col-12-4">                	
            	<x-ibmv18form-select name="SecondApprover" label="2nd Level:" :arrayOfSelectableValues="$secondApprovers"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="ThirdApprover" label="3rd Level:" :arrayOfSelectableValues="$thirdApprovers"/>
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