@extends('layout')

@section('content')

<x-request.filters/>
    
    @hasSection('summary')
        @yield('summary')
    @endif

@endsection

@section('bottom-section')

    @isset($awaiting)
    	<x-request.table name="Awaiting Approval" id="awaiting" :records="$awaiting" expand="true"/>
    @endisset
    
    

<script type="text/javascript">
jQuery( document ).ready(function() {

	var tableData = jQuery('.ibm-data-table');
	
	if (typeof (tableData) !== 'undefined') {
		for (n=0;n<tableData.length;n++){

			console.log(tableData.eq(n).attr("id"));

//			console.log(tableData.eq(n));
			
			// default object settings
			var tabletDataObject = tableData.eq(n).data();

			alert(tabletDataObject.widget);
			
			switch(tabletDataObject.widget){
				case 'datatableReady':

					break;
				default:
					break;
			}
		}
	}
	
});
</script>

@endsection