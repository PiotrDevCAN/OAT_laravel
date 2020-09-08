{{ Form::open(['route' => 'list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Accounts List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Approver" label="Approver:" :arrayOfSelectableValues="$approvers"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Verified" label="Verified:" :arrayOfSelectableValues="$verified"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Location" label="Location" :arrayOfSelectableValues="$locations"/>
            </div>
		</div>
    </div>
</div>
{{ Form::close() }}