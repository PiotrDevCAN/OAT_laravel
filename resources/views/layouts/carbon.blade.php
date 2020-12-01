<!DOCTYPE html>
<html lang="en-UK" >
    <head>
        <meta charset="utf-8"/>
    	
        <meta name="viewport" content="width=device-width, initial-scale=1" />      
        <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
        
    	<link rel="canonical" href="http://www.ibm.com/link_label_1.html" />
    	<meta name="geo.country" content="UK" /> 
    	<meta name="dcterms.rights" content="© Copyright IBM Corp. 2020" /> 
    	<meta name="dcterms.date" content="REPLACE" /> 
    	<meta name="description" content="REPLACE" /> 
    	<meta name="keywords" content="REPLACE" /> 
    	<meta name="robots" content="index, follow" /> 
    
        <meta name="generator" content="IBM Northstar Template Generator 2.0" />
        <title>{{ config('app.name') }}</title>
        
    	<script type="text/javascript">
    		digitalData = {
            	page: {
                    category: {
                    	primaryCategory: "SB03"
                    },
                    pageInfo: {
                    	author: "Piotr Tajanowicz",
                        effectiveDate: "2014-11-19",
                        expiryDate: "2030-11-19",
                        language: "en-US",
                        publishDate: "2014-11-19",
                        publisher: "IBM Corporation",
                        version: "v18",
                        ibm: {
                            contentDelivery: "HTML",
                            contentProducer: "IBM Northstar Template Generator 2.0",
                            country: "UK",
                            industry: "______",
                            owner: "Piotr Tajanowicz/Poland/IBM",
                            owningPortal: "______",
                            siteID: "______",
                            subject: "______",
                            type: "CT###"
                        }
                    }
                }
        	}; 
    	</script>
    </head>
    <body id="ibm-com" class="ibm-type">
    	
    	<!-- Put HTML snippets of components here... -->	
	    <script src="{{ asset('js/carbon-components.min.js') }}"></script>
    
        <div id="ibm-top" class="ibm-landing-page">
        	
          	<x-master-head/>
        	
            <div id="ibm-content-wrapper">
                
                <x-lead-space/>
                
                <main role="main" aria-labelledby="ibm-pagetitle-h1">
                    <div id="ibm-pcon">
                        <div id="ibm-content">
                            <div id="ibm-content-body">
                                <div id="ibm-content-main">
                                                  
                                    <div class="ibm-fluid">
                                        <div class="ibm-col-12-2">
                                        
                                        <x-navigation/>
                                        
                                    	</div>
                                        <div class="ibm-col-12-10">
                                    	
                                    	@hasSection('content')
                                            @yield('content')
                                        @endif
                                    	
                                    	@hasSection('title')
                                            @yield('title')
                                        @endif
                                        
                                        @hasSection('code')
                                            @yield('code')
                                        @endif
                                    	
                                    	@hasSection('message')
                                            @yield('message')
                                        @endif
                                    	
                                    	</div>
                                    </div>
                                    <div class="ibm-fluid ibm-fullwidth">
                                        <div class="ibm-col-12-12">
                                        @hasSection('bottom-section')
                                            @yield('bottom-section')
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            
            <div id="ibm-related-content">
                <div id="ibm-merchandising-module">
                    <!-- MTE will generate this -->
                    <!-- <aside role="complementary" aria-label="Related content"> MTE dynamic modules populate in here. <aside> -->
                    <!-- /MTE -->
                </div>
            </div>
            
            </div>
          
        	@include('partials.footer')
        
        </div>
    
    </body>
</html>