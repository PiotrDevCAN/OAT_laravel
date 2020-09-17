<p class="ibm-form-elem-grp">
    <label for="{{ $name }}">{{ $label }}</label>
    <span>
    		
		    @foreach ($arrayOfSelectableValues as $key => $value)
		    	{{ $key }}
		    	@isset($value) {{ $value }} @endisset
        	@endforeach
    
        <select name="{{ $name }}" id="{{ $name }}" class="ibm-fullwidth">
            <option value="" selected>Select...</option>
        	@foreach ($arrayOfSelectableValues as $key => $value)
        	
        	@isset($value)
        	
        		<option value="{{ trim($value->value) }}" @if($selectedValue == trim($value->value)) selected="selected" @endif>{{ trim($value->value) }}</option>
        	
        	@else
        	
        		<option value="{{ trim($key) }}" @if($selectedValue == trim($key)) selected="selected" @endif>{{ trim($key) }}</option>
        	
        	@endisset
        	
        	
        	@endforeach
        </select>
    </span>
</p>