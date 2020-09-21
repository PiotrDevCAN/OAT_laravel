<p class='ibm-form-elem-grp' id='{{ $field-name }}."FormGroup"?>'>
    <label for='{{ $fieldName }}'>{{ $label }}</label>
    <span>
        <select 
        	name='{{ $field-name }}' 
        	id='{{ $field-name}}' 
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
        		<option value='{{ $getReturnValue($key, $value) }}' {{ $isSelected($value) ? 'selected="selected"' : '' }} {{ $isDisabled($value) ? '"disabled"="disabled"' : '' }}>{{ $getDisplayValue($key, $value) }}</option>
        	@endforeach
        </select>
    </span>
</p>