{{ Form::open(['route' => 'delegate.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Delegates List Filters</h3>
		<div class="ibm-fluid">
			<div class="ibm-col-12-4">
            	<x-ibmv18form-select name="UserIntranet" label="User Intranet:" :arrayOfSelectableValues="$userIntranets"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="DelegateIntranet" label="Delegate Intranet:" :arrayOfSelectableValues="$delegateIntranets"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="DelegateNotesId" label="Delegate Notes Id:" :arrayOfSelectableValues="$delegateNotesIds"/>
            </div>
		</div>
    </div>
</div>
{{ Form::close() }}