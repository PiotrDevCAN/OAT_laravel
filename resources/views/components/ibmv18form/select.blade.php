<p class="ibm-form-elem-grp">
    <label>{{ $label }}</label>
    <span>
        <select id="{{ $name }}" class="ibm-fullwidth">
            <option value="" selected>Select...</option>
        	@foreach ($arrayOfSelectableValues  as $key => $value)
        	<option value="{{ $value }}">{{ $value }}</option>
        	@endforeach
        </select>
    </span>
</p>