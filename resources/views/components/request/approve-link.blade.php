@isset($record->reference)
	<a href="{{ route('request.approve', ['ref' => $record->reference, 'cat' => '1', 'status' => 'Approved', 'via' => 'online']) }}" target="_blank" title="Approve Request" class="ibm-bold ibm-inlinelink ibm-confirm-link ibm-textcolor-red-50" style="color:#5aa700;">Approve</a>
@endisset