<p class="ibm-form-elem-grp">
    {{ Form::label($fieldName, $label) }}
    <span>
    
    TEST {{ $selectedValue }} TEST
    
    	{{ Form::text($fieldName, $selectedValue, $options) }}
    </span>
</p>