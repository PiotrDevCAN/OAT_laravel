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
        
    	<script> 
		digitalData = {
            "page":{
                "category":{
                	"primaryCategory":"REPLACE"
                },
                "pageInfo":{
                    "effectiveDate":"REPLACE",
                    "expiryDate":"REPLACE",
                    "language":"en-UK",
                    "publishDate":"REPLACE",
                    "publisher":"IBM Corporation",
                    "version":"v18",
                    "pageID":"REPLACE",
                    "ibm":{
                        "contentDelivery":"HTML",
                        "contentProducer":"IBM Northstar Template Generator 2.0",
                        "country":"UK",
                        "industry":"REPLACE",
                        "owner":"REPLACE",
                        "siteID":"REPLACE",
                        "subject":"REPLACE",
                        "type":"REPLACE"
                    }
                }
            }
    	}; 
    	</script>
        <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
        <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
        <link href="//1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
        <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    
    	<link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
    	<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
        
        <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
        <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
        
    	<script type="text/javascript">
        	IBMCore.common.util.config.set({
        		masthead: {
                  type: "mobile"
                },
                backtotop: {
                    enabled: true
                },
        		footer: {
        	        socialLinks: {
        	            enabled: false
        	        }
        	    },
        	});
    	 </script>
    </head>
    <body id="ibm-com" class="ibm-type">
        <div id="ibm-top" class="ibm-landing-page">
        	
          	<x-maste-rhead/>
        	
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
                                    	
                                    	@yield('content')
                                    	
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