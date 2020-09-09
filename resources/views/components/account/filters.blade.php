{{ Form::open(['route' => 'account.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
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
            <div class="ibm-col-12-12">
            	<p class="ibm-btn-row ibm-button-link">
                   <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Submit</button>
                   <button type="button" class="ibm-btn-sec ibm-btn-blue-50">Reset</button>
               </p>
            </div>
		</div>
    </div>
</div>
{{ Form::close() }}