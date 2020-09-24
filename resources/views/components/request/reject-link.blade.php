@isset($record->reference)
	{{ link_to_route('request.reject', $title = 'Reject Request', $parameters = ['overtimeRequest' => $record->reference, 'lvl' => '1', 'status' => 'Approved', 'via' => 'online'], $attributes = ['class' => 'ibm-bold ibm-inlinelink ibm-reset-link ibm-textcolor-red-50', 'style' => 'color:#ff5050;']) }}
@endisset