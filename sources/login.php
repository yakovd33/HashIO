<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title><?php echo $_SETTINGS['name']; ?> | <?php echo $_SETTINGS['desc']; ?> </title>
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
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?php echo $url; ?>assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<div class="response" style="text-align:left;" ></div>
							<div class="redirect"></div>
							<form class="form-auth-small" role="login">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" name="email" id="signin-email" placeholder="samuel.gold@domain.com" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="signin-password" placeholder="*******" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a> &bull;  <a href="<?php echo $url; ?>register">Register</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"><?php echo $_SETTINGS['desc']; ?> </h1>
							<p><?php echo $_SETTINGS['name']; ?> </p>
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
