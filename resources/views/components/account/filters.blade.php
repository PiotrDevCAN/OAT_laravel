{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts" :selectedValue="request()->input('Account')"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Approver" label="Approver:" :arrayOfSelectableValues="$approvers" :selectedValue="request()->input('Approver')"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Verified" label="Verified:" :arrayOfSelectableValues="$verified" :selectedValue="request()->input('Verified')"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select name="Location" label="Location" :arrayOfSelectableValues="$locations" :selectedValue="request()->input('Location')"/>
            </div>
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