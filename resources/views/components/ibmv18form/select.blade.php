<p class="ibm-form-elem-grp">
    <label for="{{ $name }}">{{ $label }}</label>
    <span>
    	
    	selected value ({{ $selectedValue }})
    
        <select name="{{ $name }}" id="{{ $name }}" class="ibm-fullwidth">
            <option value="">Select...</option>
        	@foreach ($arrayOfSelectableValues as $key => $value)
        		<option value="{{ $key }}" @if($selectedValue == $key) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </span>
</p>