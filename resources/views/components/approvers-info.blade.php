{{-- <td bgcolor="{{ $col1 }}">&nbsp;</td> --}}
<td align='center'>
	@empty(!$lvl1Line1)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl1Line1"/>
    	</p>
    @endempty
    @empty(!$lvl1Line2)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl1Line2"/>
    	</p>
    @endempty
    @empty(!$lvl1Line3)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl1Line3"/>
    	</p>
    @endempty
    @empty(!$lvl1Line4)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl1Line4"/>
    	</p>
    @endempty
</td>
{{-- <td bgcolor="{{ $col2 }}">&nbsp;</td> --}}
<td align='center'>
    @empty(!$lvl2Line1)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl2Line1"/>
    	</p>
    @endempty
    @empty(!$lvl2Line2)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl2Line2"/>
    	</p>
    @endempty
    @empty(!$lvl2Line3)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl2Line3"/>
    	</p>
    @endempty
    @empty(!$lvl2Line4)
    	<p class="ibm-padding-bottom-0">
		<x-mailto-link :email="$lvl2Line4"/>
		</p>
    @endempty
</td>
{{-- <td bgcolor="{{ $col3 }}">&nbsp;</td> --}}
<td align='center'>
	@empty(!$lvl3Line1)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl3Line1"/>
    	</p>
    @endempty
    @empty(!$lvl3Line2)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl3Line2"/>
    	</p>
    @endempty
    @empty(!$lvl3Line3)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl3Line3"/>
    	</p>
    @endempty
    @empty(!$lvl3Line4)
    	<p class="ibm-padding-bottom-0">
    	<x-mailto-link :email="$lvl3Line4"/>
    	</p>
    @endempty
</td>