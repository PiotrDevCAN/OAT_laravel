<p class="ibm-form-elem-grp">
    <label for="{{ $name }}">{{ $label }}</label>
    <span>
    
		    @foreach ($arrayOfSelectableValues as $key => $value)
		    	{{ $key }}
		    	{{ $value }}
        	@endforeach
    
        <select name="{{ $name }}" id="{{ $name }}" class="ibm-fullwidth">
            <option value="" selected>Select...</option>
        	@foreach ($arrayOfSelectableValues as $key => $value)
        	<option value="{{ trim($value->value) }}" @if($selectedValue == trim($value->value)) selected="selected" @endif>{{ trim($value->value) }}</option>
        	@endforeach
        </select>
    </span>
</p>