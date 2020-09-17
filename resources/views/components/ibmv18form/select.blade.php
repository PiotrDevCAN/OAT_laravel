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
        	
        		<option value=""></option>
        	
        	@else
        	
        		<option value="{{ $key }}" @if($selectedValue == $key) selected="selected" @endif>{{ $key }}</option>
        	
        	@endisset
        	
        	
        	@endforeach
        </select>
    </span>
</p>