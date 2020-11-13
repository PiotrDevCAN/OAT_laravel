<p class="ibm-form-elem-grp">
    {{ Form::label($fieldName, $label) }}
    <span>
    
    {{ $selectedValue }}
    
    	{{ Form::text($fieldName, $selectedValue, $options) }}
    </span>
</p>