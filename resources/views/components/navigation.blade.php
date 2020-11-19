<nav aria-labelledby="ibm-pagetitle-h1" role="navigation">
    <div class="ibm-parent" id="ibm-navigation">
         <ul aria-labelledby="ibm-pagetitle-h1" role="tree" id="ibm-primary-links">
            @foreach ($menuList as $key => $value)
            	@isset($value['route'])
                    @if (is_array($value['route']))
                    	<li role="presentation">
                        	<span class="ibm-subnav-heading">{{ $key }}</span>
                        	<ul role="group">
                        		@foreach ($value['route'] as $subKey => $subValue)
                        			@isset($subValue['route'])
                        				@if (is_array($subValue['route']))
                            				<li role="presentation">
                            					<span class="ibm-subnav-heading" style="padding-left: 10px;">{{ $subKey }}</span>
                            					<ul role="group">
                            						@foreach ($subValue['route'] as $subSubKey => $subSubValue)
                            							@isset($subSubValue['route'])
                            								<li role="presentation"><a href="{{ route($subSubValue['route']) }}" role="treeitem" @isset($subSubValue['selected']) aria-selected="true" @endisset>{{ $subSubKey }}</a> </li>
                            							@endisset
                            						@endforeach
                            					</ul>
                            				</li>
                            			@else
                            				<li role="presentation"><a href="{{ route($subValue['route']) }}" role="treeitem" @isset($subValue['selected']) aria-selected="true" @endisset>{{ $subKey }}</a></li>
                            			@endif
                        			@endisset
                        		@endforeach
                        	</ul>
                        <li>                    	
                    @else
                    	<li @if ($loop->first) id="ibm-overview" @endif role="presentation"><a href="{{ route($value['route']) }}" role="treeitem" @isset($value['selected']) aria-selected="true" @endisset>{{ $key }}</a></li>
                    @endif
                @endisset
            @endforeach
		</ul>
        <div id="ibm-secondary-navigation">
           	<h2>Related links</h2>
            <ul id="ibm-related-links">
                <li role="presentation"><a href="https://w3-connections.ibm.com/wikis/home?lang=en-us#!/wiki/ITDBO/page/OVERTIME%20APPROVAL%20TOOL%20%28OAT%29%20Guidance">OAT Tool Guidance</a></li>
                <li role="presentation"><a href="http://w3.ibm.com/tools/groups">Bluegroups</a></li>
                <li role="presentation"><a href="https://w3.webahead.ibm.com/w3ki/display/PHPatIBM/Home">PHP@IBM Wiki</a></li>
            </ul>
        </div>
    </div>
</nav>