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
                	<x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Service Line:</label>
                        <span>
                            <select id="ServiceLine" class="ibm-fullwidth">
                                <option value="" selected>All SL</option>
                            	@foreach ($serviceLines as $serviceLine)
                            	<option value="{{ $serviceLine->competency }}">{{ $serviceLine->competency }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                    <x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Status:</label>
                        <span>
                            <select id="Status" class="ibm-fullwidth">
                                <option value="" selected>All Statuses</option>
                            	@foreach ($statuses as $status)
                            	<option value="{{ $status->status }}">{{ $status->status }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                    <x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Requestor:</label>
                        <span>
                            <select id="Requestor" class="ibm-fullwidth">
                                <option value="" selected>All Requestors</option>
                            	@foreach ($requestors as $requestor)
                            	<option value="{{ $requestor->requestor }}">{{ $requestor->requestor }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                    <x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Location:</label>
                        <span>
                            <select id="Location" class="ibm-fullwidth">
                                <option value="" selected>All Locations</option>
                            	@foreach ($locations as $location)
                            	<option value="{{ $location->location }}">{{ $location->location }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-4">
                	<x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Weekend >=:</label>
                        <span>
                            <select id="WeekendStart" class="ibm-fullwidth">
                                <option value="" selected>All Dates</option>
                            	@foreach ($weekenddates as $weekenddate)
                            	<option value="{{ $weekenddate->weekenddate }}">{{ $weekenddate->weekenddate }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                    <x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Weekend <=:</label>
                        <span>
                            <select id="WeekendEnd" class="ibm-fullwidth">
                                <option value="" selected>All Dates</option>
                            	@foreach ($weekenddates as $weekenddate)
                            	<option value="{{ $weekenddate->weekenddate }}">{{ $weekenddate->weekenddate }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                    <x-ibmv18form-select/>
                    <p class="ibm-form-elem-grp">
                        <label>Import:</label>
                        <span>
                            <select id="Import" class="ibm-fullwidth">
                                <option value="" selected>All</option>
                            	@foreach ($imports as $import)
                            	<option value="{{ $import->import }}">{{ $import->import }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                </div>
    		</div>
			<div class="ibm-fluid">
                <div class="ibm-col-12-12">
                	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Approvers</h3>
                </div>
            </div>
			<div class="ibm-fluid">
                <div class="ibm-col-12-4">
                	<x-ibmv18form-select/>
                	<p class="ibm-form-elem-grp">
                        <label>1st Level:</label>
                        <span>
                            <select id="FirstApprover" class="ibm-fullwidth">
                                <option value="" selected>All Approvers</option>
                            	@foreach ($firstApprovers as $firstApprover)
                            	<option value="{{ $firstApprover->approver_first_level }}">{{ $firstApprover->approver_first_level }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-4">
                	<x-ibmv18form-select/>
                	<p class="ibm-form-elem-grp">
                        <label>2nd Level:</label>
                        <span>
                            <select id="SecondApprover" class="ibm-fullwidth">
                                <option value="" selected>All Approvers</option>
                            	@foreach ($secondApprovers as $secondApprover)
                            	<option value="{{ $secondApprover->approver_second_level }}">{{ $secondApprover->approver_second_level }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
                </div>
                <div class="ibm-col-12-4">
                	<x-ibmv18form-select/>
                	<p class="ibm-form-elem-grp">
                        <label>3rd Level:</label>
                        <span>
                            <select id="ThirdApprover" class="ibm-fullwidth">
                                <option value="" selected>All Approvers</option>
                            	@foreach ($thirdApprovers as $thirdApprover)
                            	<option value="{{ $thirdApprover->approver_third_level }}">{{ $thirdApprover->approver_third_level }}</option>
                            	@endforeach
                            </select>
                        </span>
                    </p>
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