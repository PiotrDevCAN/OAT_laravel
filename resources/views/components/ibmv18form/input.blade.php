<p class="ibm-form-elem-grp">
	<label for="{{ $fieldName }}">{{ $label }}</label>
	<span>
        <input type="text" value="{{ $record->$fieldName }}" size="40" name="{{ $label }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset @if($disabled == true) disabled @endif>
    </span>
</p>