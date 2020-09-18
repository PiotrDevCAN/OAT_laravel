<p class="ibm-form-elem-grp">
	<label for="{{ $field-name }}">{{ $label }}</label>
	<span>
        <input type="text" value="{{ $record->$field-name }}" size="40" name="{{ $label }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset @if($disabled == true) disabled @endif>
    </span>
</p>