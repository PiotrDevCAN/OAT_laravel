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
        		@switch($wayToHandleArray)
                    @case($selectDisplayValueReturnKey)
                   		<option value='{{ $key }}' @if(in_array($key, $selectedValues)) selected='selected' @endif disabled='disabled'>{{ $value }}</option>
                        @break
                    @case($selectDisplayKeyReturnValue)
                        <option value='{{ $value }}' @if(in_array($value, $selectedValues)) selected='selected' @endif disabled='disabled'>{{ $key }}</option>
                  		@break
              		@case($selectDisplayKeyReturnKey)
              			<option value='{{ $key }}' @if(in_array($key, $selectedValues)) selected='selected' @endif disabled='disabled'>{{ $key }}</option>
                  		@break
                	@case($selectDisplayValueReturnValue)
                    @default
                    	<option value='{{ $value }}' @if(in_array($value, $selectedValues)) selected='selected' @endif disabled='disabled'>{{ $value }}</option>
                @endswitch
            @endforeach
        </select>
    </span>
</p>