<p class="ibm-form-elem-grp">
    {{ Form::label($fieldName, $label) }}
    <span>
    	{{ Form::text($fieldName, $selectedValue, ['size' => '40'
    		@isset($placeholder) , 'placeholder' => $placeholder @endisset 
        	@if($disabled == true), 'disabled' => 'disabled' @endif
    	]) }}
    </span>
</p>