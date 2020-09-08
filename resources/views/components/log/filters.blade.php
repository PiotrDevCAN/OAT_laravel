{{ Form::open(['route' => 'list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Logs List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts"/>
            	<x-ibmv18form-select name="Reason" label="Reason:" :arrayOfSelectableValues="$reasons"/>
            	<x-ibmv18form-select name="Name" label="Name:" :arrayOfSelectableValues="$names"/>
            </div>
		</div>
    </div>
</div>
{{ Form::close() }}