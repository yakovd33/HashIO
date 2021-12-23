<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title><?php echo $_SETTINGS['name']; ?> | Register </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/demo.css">
	<script src="<?php echo $url; ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/scripts/custom.js"></script>
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left" style="width:100%;">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Register as new user</p>
							</div>
							<div class="response" style="text-align:left;" ></div>
							<div class="redirect"></div>
							<form class="form-auth-small" role="register">
								<div class="form-group col-md-6">
									<label for="signin-text" class="control-label sr-only">First Name</label>
									<input type="text" name="firstname" class="form-control" id="signin-text" placeholder="First Name">
								</div>
								<div class="form-group col-md-6">
									<label for="signin-text" class="control-label sr-only">Last Name</label>
									<input type="text" name="lastname" class="form-control" id="signin-text" placeholder="Last Name">
								</div>
								<div class="form-group col-md-6">
									<label for="signin-email" class="control-label sr-only">Email address</label>
									<input type="email" name="email" class="form-control" id="signin-email" placeholder="Email Address">
								</div>
								<div class="form-group col-md-6">
								  <select name="country" class="form-control" id="sel1">
									<option value="">Select Country</option>
									<?php

										foreach($countries as $key => $value) {

										?>
										<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
										<?php

										}

									?>
								  </select>
								</div>
									<div class="form-group col-md-6">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control" id="signin-password" placeholder="Password">
								</div>
								<div class="form-group col-md-6">
									<label for="signin-repeat" class="control-label sr-only">Repeat Password</label>
									<input type="password" name="rpassword" class="form-control" id="signin-repeat" placeholder="Repeat Password">
								</div>
								<div class="col-md-12">
									<div class="form-group">
									<?php
										echo '<select class="form-control" name="byear" style="width: 33%;float: right;margin: 0px 2px;" id="sel4" name="year">';
										  echo '<option>Year</option>';
											for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
											  echo "<option value='$i'>$i</option>";
											} 
											echo '</select>';
									?>
									<?php
										echo '<select class="form-control" name="bday" style=" width: 33%;float: right; " id="sel2" name="day">';
										  echo '<option>Day</option>';
											for($i = 1; $i <= 31; $i++){
											  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
												echo "<option value='$i'>$i</option>";
											}
										echo '</select>';
									?>
									<?php
								
										echo '<select class="form-control" name="bmonth" style="width:33%;" id="sel3" name="month">';
											echo '<option>Month</option>';
											for($i = 1; $i <= 12; $i++){
											  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
												echo "<option value='$i'>$i</option>";
											}
										echo '</select>';
										?>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#"> Already registerd? Sign in</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="url" value="<?php echo $url; ?>">

	<!-- END WRAPPER -->
</body>

</html>
