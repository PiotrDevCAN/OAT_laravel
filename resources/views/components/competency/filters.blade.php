{{ Form::open(['route' => 'competency.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Service Lines List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-6">
            	<x-ibmv18form-select name="ServiceLine" label="Service Line:" :arrayOfSelectableValues="$serviceLines"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-select name="Approver" label="Approver:" :arrayOfSelectableValues="$approvers"/>
            </div>
		</div>
    </div>
</div>
{{ Form::close() }}