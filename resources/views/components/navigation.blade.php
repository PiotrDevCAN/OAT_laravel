<nav aria-labelledby="ibm-pagetitle-h1" role="navigation">
    <div class="ibm-parent" id="ibm-navigation">
 
        <ul aria-labelledby="ibm-pagetitle-h1" role="tree" id="ibm-primary-links">
            <li id="ibm-overview" role="presentation"><a href="/" role="treeitem">Home</a></li>
            @foreach ($menuList as $key => $value)
                @if (is_array($value))
    			<li role="presentation"><span class="ibm-subnav-heading">{{ $key }}</span>
        			<ul role="group">
        				@foreach ($value as $subKey => $subValue)
                        <li role="presentation"> <a href="{{ $value }}" role="treeitem">{{ $key }}</a> </li>
                    	@endforeach
                    </ul>
                @else
                <li role="presentation"><a href="{{ $value }}" role="treeitem">{{ $key }}</a></li>
                @endif
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