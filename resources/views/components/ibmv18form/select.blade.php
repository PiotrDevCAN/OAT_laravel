<p class="ibm-form-elem-grp">
    <label for="{{ $name }}">{{ $label }}</label>
    <span>
        <select name="{{ $name }}" id="{{ $name }}" class="ibm-fullwidth">
            <option value="" selected>Select...</option>
        	@foreach ($arrayOfSelectableValues as $key => $value)
        		<option value="{{ $key }}" @if($selectedValue == $key) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </span>
</p>