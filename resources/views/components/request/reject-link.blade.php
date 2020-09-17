@isset($record->reference)
	<a href="{{ route('request.reject', ['ref' => $record->reference, 'cat' => '1', 'status' => 'Approved', 'via' => 'online']) }}" target="_blank" title="Reject Request" class="ibm-bold ibm-inlinelink ibm-reset-link ibm-textcolor-green-50" style="color:#ff5050;">Reject</a>
@endisset