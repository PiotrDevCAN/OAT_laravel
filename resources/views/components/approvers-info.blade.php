{{-- <td bgcolor="{{ $col1 }}">&nbsp;</td> --}}
<td align='center'>
	{{ $lvl1 }}
	{{ $app1 }}
</td>
{{-- <td bgcolor="{{ $col2 }}">&nbsp;</td> --}}
<td align='center'>
	{{ $lvl2 }}
	{{ $app2 }}
</td>
{{-- <td bgcolor="{{ $col3 }}">&nbsp;</td> --}}
<td align='center'>
	{{ $lvl3 }}
	{{ $app3 }}
</td>




@switch($record->status)
	@case('bb')
	
	@break
	@case('aa')
	
	@break
	
	$default
	
@endswitch