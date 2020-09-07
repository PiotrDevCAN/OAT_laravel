{{-- <td bgcolor="{{ $col1 }}">&nbsp;</td> --}}
<td align='center'>
	@empty(!$lvl1Line1)
    	<p class="ibm-padding-bottom-0">{{ $lvl1Line1 }}</p>
    @endempty
    @empty(!$lvl1Line2)
    	<p class="ibm-padding-bottom-0">
    	@if (Str::contains($lvl1Line2, '@'))
            {{ Html::mailto($lvl1Line2) }}
        @else
	        {{ $lvl1Line2 }}
        @endif
    	</p>
    @endempty
    @empty(!$lvl1Line3)
    	<p class="ibm-padding-bottom-0">
    	@if (Str::contains($lvl1Line3, '@'))
            {{ Html::mailto($lvl1Line3) }}
        @else
	        {{ $lvl1Line3 }}
        @endif
    	</p>
    @endempty
    @empty(!$lvl1Line4)
    	<p class="ibm-padding-bottom-0">{{ $lvl1Line4 }}</p>
    @endempty
</td>
{{-- <td bgcolor="{{ $col2 }}">&nbsp;</td> --}}
<td align='center'>
    @empty(!$lvl2Line1)
    	<p class="ibm-padding-bottom-0">{{ $lvl2Line1 }}</p>
    @endempty
    @empty(!$lvl2Line2)
    	<p class="ibm-padding-bottom-0">
    	@if (Str::contains($lvl2Line2, '@'))
            {{ Html::mailto($lvl2Line2) }}
        @else
	        {{ $lvl1Line2 }}
        @endif
    	</p>
    @endempty
    @empty(!$lvl2Line3)
    	<p class="ibm-padding-bottom-0">
    	@if (Str::contains($lvl2Line3, '@'))
            {{ Html::mailto($lvl2Line3) }}
        @else
	        {{ $lvl2Line3 }}
        @endif
    	</p>
    @endempty
    @empty(!$lvl2Line4)
    	<p class="ibm-padding-bottom-0">{{ $lvl2Line4 }}</p>
    @endempty
</td>
{{-- <td bgcolor="{{ $col3 }}">&nbsp;</td> --}}
<td align='center'>
	@empty(!$lvl3Line1)
    	<p class="ibm-padding-bottom-0">{{ $lvl3Line1 }}</p>
    @endempty
    @empty(!$lvl3Line2)
    	<p class="ibm-padding-bottom-0">
    	@if (Str::contains($lvl3Line2, '@'))
            {{ Html::mailto($lvl3Line2) }}
        @else
	        {{ $lvl3Line2 }}
        @endif
    	</p>
    @endempty
    @empty(!$lvl3Line3)
    	<p class="ibm-padding-bottom-0">
    	@if (Str::contains($lvl3Line3, '@'))
            {{ Html::mailto($lvl3Line3) }}
        @else
	        {{ $lvl3Line3 }}
        @endif
    	</p>
    @endempty
    @empty(!$lvl3Line4)
    	<p class="ibm-padding-bottom-0">{{ $lvl3Line4 }}</p>
    @endempty
</td>