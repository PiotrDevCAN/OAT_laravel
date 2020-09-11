<!-- LEADSPACE_BEGIN -->
<header role="banner" aria-labelledby="ibm-pagetitle-h1">
  	<div id="ibm-leadspace-head" class="ibm-background-blue-core ibm-alternate-background ibm-alternate"  style="" >
        <div id="ibm-leadspace-body" class="ibm-padding-bottom-1">
            <nav role="navigation" aria-label="Breadcrumb">
                <ul id="ibm-navigation-trail">                    
					@foreach (url()->current()->explode('\') as $key => $value)
                        <li itemscope="" itemtype="//data-vocabulary.org/Breadcrumb">
                    		<a href="#" itemprop="url">
                     		<span itemprop="title">{{ $value }}</span>
                    		</a>
                     	</li>
                    @endforeach
                </ul>
            </nav>
            <div class="ibm-columns">
                <div class="ibm-col-1-1">        
                    <h1 id="ibm-pagetitle-h1" class="ibm-h1 ibm-light">Welcome to {{ config('app.name') }}</h1>
                	<p>This tool is for managing the process for gaining approval for planned paid overtime</p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- LEADSPACE_END -->