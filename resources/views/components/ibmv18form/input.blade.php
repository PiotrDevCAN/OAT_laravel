<p class="ibm-form-elem-grp">
	<label for="{{ $label }}">{{ $label }}</label>
	<span>
	    <input type="text" value="{{ $selectedValue }}" size="40" name="{{ $label }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset @if($disabled == true) disabled @endif>
    </span>
</p>


@isset($fieldName) fieldName="{{ $fieldName }}" @endisset

@isset($field-name) field-name="{{ $fieldName }}" @endisset