{{ Form::open(['route' => 'log.list', 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Logs List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="LogEntry" label="Log Entry:" :arrayOfSelectableValues="$logEntries"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="LastUpdated" label="Last Updated:" :arrayOfSelectableValues="$lastUpdates"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select name="LastUpdater" label="Last Updater:" :arrayOfSelectableValues="$lastUpdaters"/>
            </div>
		</div>
    </div>
</div>
{{ Form::close() }}