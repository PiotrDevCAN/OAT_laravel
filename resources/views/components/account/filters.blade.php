{{ Form::open(['route' => 'account.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-3">
            	
            	@if (request()->has('Account'))
            		{{ request()->input('Account') }}
            	@endif
            	
            	<x-ibmv18form-select name="Account" label="Account:" :arrayOfSelectableValues="$accounts"/>
            </div>
            <div class="ibm-col-12-3">
            
            	@if (request()->has('Approver:'))
            		{{ request()->input('Approver:') }}
            	@endif
            	
            	<x-ibmv18form-select name="Approver" label="Approver:" :arrayOfSelectableValues="$approvers"/>
            </div>
            <div class="ibm-col-12-3">
            	
            	@if (request()->has('Verified:'))
            		{{ request()->input('Verified:') }}
            	@endif
            	
            	<x-ibmv18form-select name="Verified" label="Verified:" :arrayOfSelectableValues="$verified"/>
            </div>
            <div class="ibm-col-12-3">
            	
            	@if (request()->has('Location'))
            		{{ request()->input('Location') }}
            	@endif
            	
            	<x-ibmv18form-select name="Location" label="Location" :arrayOfSelectableValues="$locations"/>
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