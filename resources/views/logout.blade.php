<?php
// use sessions to store authentication and authorization state
@session_start();
ob_start();
$ajaxCall = isset($ajaxCall) ? $ajaxCall : false;
$https = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == "on");

// Only keep login data available via secure sessions
if (isset($_SESSION['ltcuser']) && $https === FALSE) {
    //unset($_SESSION['ltcuser']);
}
// restore cached logins if not expired (expiry was set at last logon)
// if (isset($_SESSION['ltcuser']['expire'])) {
//     if ($_SESSION['ltcuser']['expire'] > time()) {
		if (isset($_SESSION['ltcuser'])) {
        	$GLOBALS['ltcuser'] = $_SESSION['ltcuser'];
		}
//     } else {
//         unset($GLOBALS['ltcuser']);
//         unset($_SESSION['ltcuser']);
//     }
// }

?>

<style type="text/css">
html, body {
	background: url(../public/img/logon/think_travel_hero.png) no-repeat
		center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>
</head>
<body>

<?php
session_destroy();
unset($GLOBALS['ltcuser']);
unset($_SESSION['ltcuser']);
?>

<div class="ibm-fluid ibm-padding-top-90 ibm-padding-bottom-90" data-always="true" data-items=".ibm-card">
	<div class="ibm-col-12-6">
		<div class="ibm-card">
			<div class="ibm-card__content">
				<p class="ibm-h3 ibm-light ibm-textcolor-blue-60 ibm-padding-bottom-0"><?php echo $site['site_title'];?></p>
			</div>
		</div>
	</div>
	
	<div class="ibm-col-12-9"></div>
	
	<div class="ibm-col-12-6">
		<div class="ibm-card">
			<div class="ibm-card__content">
				
				<p class="ibm-h3 ibm-light ibm-textcolor-red-60">Logged off</p>
				<h3 class="ibm-h3">You are now signed off.</h3>
				<p>To sign in again, click the link below</p>
				<p class="ibm-ind-link"><a class="ibm-forward-link" href="index.html">Sign in</a></p>
			
			</div>
		</div>
	</div>	
</div>