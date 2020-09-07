<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Status List Filters</h3>
    	{{ Form::open(['route' => 'list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
   			<div class="ibm-fluid">
                <div class="ibm-col-12-4">
                	
                	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts"/>
                	
                    <x-ibmv18form-select name="Reason" label="Reason:" :arrayOfSelectableValues="$reasons"/>
                	
                	<x-ibmv18form-select name="Name" label="Name:" :arrayOfSelectableValues="$names"/>
                	
                    <x-ibmv18form-select name="Type" label="Type" :arrayOfSelectableValues="$types"/>
                	
                </div>
                <div class="ibm-col-12-4">
                
                	<x-ibmv18form-select name="Service Line" label="ServiceLine:" :arrayOfSelectableValues="$serviceLine"/>
                
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
                	
                	<x-ibmv18form-select name="SecondApprover" label="2nd Level:" :arrayOfSelectableValues="$secondApprovers"/>
                	
                	<x-ibmv18form-select name="ThirdApprover" label="3rd Level:" :arrayOfSelectableValues="$thirdApprovers"/>
                	
                </div>
           	</div>
           	<div class="ibm-fluid">
                <div class="ibm-col-12-12">
                	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Summary</h3>
                </div>
            </div>
			<div class="ibm-fluid">
                <div class="ibm-col-12-6">
                	<p>
                        <label for="AwaitingApprovalRequests">Awaiting Approval Requests:</label>
                        <span>
                            <input type="text" value="" size="40" name="AwaitingApprovalRequests" disabled>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-6">
                	<p>
                        <label for="AwaitingApprovalRequestsHours">Hours:</label>
                        <span>
                            <input type="text" value="" size="40" name="AwaitingApprovalRequestsHours" disabled>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-6">
                	<p>
                        <label for="ApprovedRequests">Approved Requests:</label>
                        <span>
                            <input type="text" value="" size="40" name="ApprovedRequests" disabled>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-6">
                	<p>
                        <label for="ApprovedRequestsHours">Hours:</label>
                        <span>
                            <input type="text" value="" size="40" name="ApprovedRequestsHours" disabled>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-6">
                	<p>
                        <label for="OtherRequests">Other Requests:</label>
                        <span>
                            <input type="text" value="" size="40" name="OtherRequests" disabled>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-6">
                	<p>
                        <label for="OtherRequestsHours">Hours:</label>
                        <span>
                            <input type="text" value="" size="40" name="OtherRequestsHours" disabled>
                        </span>
                    </p>
                </div>
           	</div>
		{{ Form::close() }}

		{{ Html::mailto('foo@bar.baz') }}
        
    </div>
</div>