<p class="ibm-form-elem-grp">
	<label for="{{ $name }}">{{ $label }}</label>
	<span>
        <input type="text" value="{{ $value }}" size="40" name="{{ $label }}" @if($disabled == true) disabled @endif>
    </span>
</p>