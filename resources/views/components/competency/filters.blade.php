{{ Form::open(['route' => 'competency.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-6">
            	<x-ibmv18form-select name="ServiceLine" label="Service Line:" :arrayOfSelectableValues="$serviceLines" :selectedValue="request()->input('ServiceLine')"/>
            </div>
            <div class="ibm-col-12-6">
            	<x-ibmv18form-select name="Approver" label="Approver:" :arrayOfSelectableValues="$approvers" :selectedValue="request()->input('Approver')"/>
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