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
        	
            	@if (is_array($value))
            	
            		<option value="{{ $key }}">Array given</option>
            	
            	@else
            	
            		<option value="{{ $key }}" @if($selectedValue == $key) selected="selected" @endif>{{ $value }}</option>
            	
            	@endisset
        	
        	
        	@endforeach
        </select>
    </span>
</p>