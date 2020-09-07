<p class="ibm-form-elem-grp">
    <label for="{{ $name }}">{{ $label }}</label>
    <span>
        <select name="{{ $name }}" id="{{ $name }}" class="ibm-fullwidth">
            <option value="" selected>Select...</option>
        	@foreach ($arrayOfSelectableValues  as $key => $value)
        	<option value="{{ $value->value }}">{{ $value->value\\ }}</option>
        	@endforeach
        </select>
    </span>
</p>