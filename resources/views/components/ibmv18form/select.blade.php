<p class='ibm-form-elem-grp' id='{{ $fieldName }}."FormGroup"?>'>
    <label for='{{ $fieldName }}'>{{ $label }}</label>
    <span>
        <select 
        	name='{{ $fieldName }}' 
        	id='{{ $fieldName}}' 
        	class='{{ $classCSS }} ibm-fullwidth'
			required='required' 
			@isset($onChange) {{!! $onChange !!}} @endisset
            data-tags="true" 
            data-placeholder="{{ $placeHolder }}" 
            data-allow-clear="true"
    	>
            @isset($placeHolder)
            	<option value=''>{{ $placeHolder }}></option>
            @endisset
            
        	@foreach ($arrayOfSelectableValues as $key => $value)
        		
        		{{ $prepareOption($key, $value) }}
        		
        		<option value='{{ $returnValue }}'>{{ $displayValue }}</option>
        	@endforeach
        </select>
    </span>
</p>