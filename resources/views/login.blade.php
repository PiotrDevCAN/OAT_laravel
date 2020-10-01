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

				<p class="ibm-h3 ibm-light ibm-textcolor-red-60">Sign In</p>
				<form id="signinForm" action="check_auth.php" method="POST" class="ibm-column-form">
		
				<?php
				 
				if (!isset($_GET["e"])){
				//logon not attempted yet
				?>
					<p>
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p>
						<label for="password">Password<span class="ibm-required">*</span></label>
						 <input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="noUser") {
				//login again
				?>
					<p class="has-error">
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p class="has-error">
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="nothingReturned") {
				//a credentials are incorrect
				?>
					<p>username or password was incorrect. Please check and try again. Your password may have expired.</p>
					<p class="has-error">
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p class="has-error">
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="0") {
				//no session started
				?>
					<p>Session couldn't start. Please check and try again.</p>
					<p class="has-error">
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p class="has-error">
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="1") {
				//a credentials are incorrect
				?>
					<p>Your email address was not entered correctly. Please check and try again.</p>
					<p class="has-error">
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p>
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="2") {
				// the id is too short to be real
				?>
					<p>username was incorrect. Please check and try again.</p>
					<p class="has-error">
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p>
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="3") {
				//the the password is too short
				?>
					<p>Password was incorrect. Please check and try again.</p>
					<p>
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p class="has-error">
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else if ($_GET["e"]=="4") {
				//if the id doesn't have .ibm.com on the end
				?>
					<p>username was incorrect. Please check that you have entered your email address as the username and try again.</p>
					<p class="has-error">
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p>
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				} else {
				//a credentials are incorrect
				?>
					<p>username or password was incorrect. Please check and try again. Your password may have expired.</p>
					<p>
						<label for="username">User Name<span class="ibm-required">*</span></label>
						<input id="username" name="username" type="email" placeholder="Email">
					</p>
					<p>
						<label for="password">Password<span class="ibm-required">*</span></label>
						<input id="password" name="password" type="password" placeholder="Password">
					</p>
					<p>
						<button class="ibm-btn-pri ibm-btn-small ibm-btn-green-50"
							name="submitForm" type="submit">OK</button>
						<button class="ibm-btn-sec ibm-btn-small ibm-btn-green-50"
							name="cancel" type="button"
							onclick="window.open('p_loginCancelled.html','_self');">Cancel</button>
					</p>
				<?php
				}
				if(isset($_COOKIE['cameFrom']) && !empty($_COOKIE['cameFrom'])){
					$cameFrom = $_COOKIE['cameFrom'];
				} else {
					$country = $_SERVER['environment'];
					switch ($country) {
    					case 'SOIW':
							$cameFrom = '/TTCOOKBOOK/';
							break;
						case 'SOIW_NORDIC':
							$cameFrom = '/TTCOOKBOOK_NORDIC/';
							break;
						case 'SOIW_EUROPE':
							$cameFrom = '/TTCOOKBOOK/';
							break;
					}
				}

$targetPageTitle = 'The Main';
$navBar_data = array(

    array("View",'dropDown'),
    array("Master Cookbook",'p_masterCookbook.php'), //open access
    array("My Approvals",'p_myApprovals.php'), //open access
    array("My Active Account Cookbooks",'p_myAccountCookbooks.php'), //open only
    array("My Archieved Account Cookbooks",'p_myAccountCookbooksArchieved.php'), //open only
    array("My Account Delegates",'p_myDelegates.php'), //open only
    array("Help",'p_help.php'), //open access
    array("Log off",'login/p_logoffConfirmed.php'), //open access
    array("",'endOfDropDown'),

    array("Administration",'dropDown'),
    array("Create Master Cookbook Entry","p_masterCookbookEntry.php"),  //admins only
    array("Manage Master Cookbook","p_masterCookbook.php"),  //admins only
	array("Active Account Cookbooks",'p_accountCookbooks.php'),  //admins only
    array("Archieved Account Cookbooks",'p_accountCookbooksArchieved.php'),  //admins only
    array("Manage Accounts","p_accounts.php"), //admins only
	array("Manage Account BC Inputs","p_accountBCInputs.php"), //admins only
    array("Manage Accounts Delegates",'p_delegates.php'), //admins only
    array("BC Team Lead User","p_leadUser.php"), //admins only
	array("Manage Users","p_users.php"), //admins only
    array("Review Users Roles","p_usersRoles.php"), //admins only
    array("Manage Competencies","p_competencies.php"), //admins only
    array("Manage Categories","p_categories.php"), //admins only
    array("Manage Admin Messages","p_adminMessages.php"), //admins only
    array("Work Instruction Documents","p_instructions.php"), //admins only
    array("Internal Settings of Tool","p_toolSettings.php"), //admins only
    array("",'endOfDropDown'),

	array("Diary",'dropDown'),
	array("Master Cookbook", "p_masterCookbookDiary.php"),  //admins only
	array("Account Cookbooks", "p_accountCookbookDiary.php"),  //admins only
	array("Account Cookbooks Rejections", "p_accountCookbookRejectionsDiary.php"),  //admins only
    array("Account Cookbooks Comments", "p_accountCookbookCommentsDiary.php"),  //admins only
    array("Account Cookbooks Extension", "p_accountCookbookExtensionDiary.php"),  //admins only
    array("Account Cookbooks Extension Rejections", "p_accountCookbookExtensionRejectionsDiary.php"),  //admins only
    array("Accounts", "p_accountDiary.php"),  //admins only
	array("BC Team Lead User","p_leadUserDiary.php"), //admins only
	array("Users", "p_userDiary.php"),  //admins only
	array("",'endOfDropDown'),
	
	array("Report",'dropDown'),
    array("Processes Scorecard", "p_scorecardProcesses.php"),  //admins only
    array("Scorecard", "p_scorecard.php"),  //admins only
    array("Scorecard Graph", "p_scorecardGraph.php"),  //admins only
    array("Scorecard Snapshot Review", "p_scorecardSnapshotReview.php"),  //admins only
    array("Scorecard Snapshot Account Graph", "p_scorecardSnapshotGraph.php"),  //admins only
    array("Scorecard Snapshot Monthly Graph", "p_scorecardSnapshotMonthlyGraph.php"),  //admins only
	array("Processes", "p_processesReport.php"),  //admins only
    array("Account Cookbooks", "p_cmcReport.php"),  //admins only
    array("Tracker", "p_tracker.php"),  //admins only
    array("Account Factsheets","p_accountFactsheets.php"), //admins only
	array("Users by Account", "p_usersReport.php"),  //admins only
    array("",'endOfDropDown'),
	
    array('Planned Outages','p_plannedOutages.php'),

);

foreach ($navBar_data as $key => $value) {
	if (!empty($value[0]) && strpos($cameFrom, $value[1]) !== false) {
		$targetPageTitle = $value[0];
	}
}
				?>
				<p>You will be redirected to: <?=$targetPageTitle;?> page</p>
				<input id="cameFrom" name="cameFrom" type="hidden" value="<?=$cameFrom;?>">
			
				</form>

			</div>
		</div>
	</div>
</div>