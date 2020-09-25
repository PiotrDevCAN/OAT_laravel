<p class="ibm-form-elem-grp">
    {{ Form::label($fieldName, $label) }}
    <span>
    	{{ Form::text($fieldName, $selectedValue, $attributes = ['te' => 'tt']) }}
    </span>
</p>