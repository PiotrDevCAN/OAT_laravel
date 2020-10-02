<!DOCTYPE html>
<html lang="en-US">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
<link rel="canonical" href="{{ route('home') }}" />

<meta name="geo.country" value="GB" />
<meta name="dcterms.rights" value="" />
<meta name="dcterms.date" value="2015-12-04" />
<meta name="description" value="" />
<meta name="keywords" value="OAT_laraver" />
<meta name="robots" value="index, follow" />

<title>{{ config('app.name') }}</title>

<link href="https://1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
<link href="https://1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">

<style type="text/css">
html, body {
	background: url({{ secure_asset('public/img/logon/think_travel_hero.png') }}) no-repeat
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
				<p class="ibm-h3 ibm-light ibm-textcolor-blue-60 ibm-padding-bottom-0">{{ config('app.name') }}</p>
			</div>
		</div>
	</div>
	
	<div class="ibm-col-12-9"></div>
	
	<div class="ibm-col-12-6">
		<div class="ibm-card">
			<div class="ibm-card__content">

				<p class="ibm-h3 ibm-light ibm-textcolor-red-60">Sign In</p>
				{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'signinForm', 'class'  => 'ibm-column-form' ]) }}
				
				<!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>
				
				<p>
					{{ Form::label('email', 'Email Address') }}
			 		{{ Form::text('email', old('email'), array('placeholder' => 'awesome@awesome.com')) }}
				</p>
				
				<p>
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
                </p>
				
				<p>
					{{ Form::submit('Submit!') }}
				</p>
				
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
				?>
				<p>You will be redirected to: {{ $targetPageTitle ?? '' }} page</p>
				<input id="cameFrom" name="cameFrom" type="hidden" value="{{ $cameFrom ?? '' }}">
			
				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>