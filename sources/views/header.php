<!doctype html>
<html lang="en">

<head>
	<title><?php echo title($page); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $url; ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $url; ?>assets/img/favicon.png">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="<?php echo $url; ?>assets/scripts/custom.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/"><img src="<?php echo $url; ?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>


				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
				
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $link->query("SELECT * FROM `languages` WHERE short = '{$language}'")->fetch()['img']; ?>" class="img-thumbnail" style="width:36px;" alt="Avatar"> <span></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu" style="min-width: 90px;">
								<?php 
								$lang_query = $link->query("SELECT * FROM `languages`");
									if($lang_query->rowCount() > 0) {
									 while($row = $lang_query->fetch()) {
								?>
									<li style="text-align:center;"><a href="<?php echo $url; ?>language/<?php echo $row['short']; ?>"> <img style=" width: 36px; " src="<?php echo $row['img']; ?>"></img></a></li>
								<?php 
									 }
									}
								?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $url; ?>assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $CUR_USER['first_name'].' '.$CUR_USER['last_name']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a ><i class="fas fa-dollar-sign"></i> <span><?= $lang['balance']; ?>: <?php echo number_format($CUR_USER['balance'],2); ?>$</span></a></li>
								<li><a href="<?php echo $url; ?>settings"><i class="lnr lnr-cog"></i> <span><?= $lang['settings']; ?></span></a></li>
								<li><a href="<?php echo $url; ?>logout"><i class="lnr lnr-exit"></i> <span><?= $lang['logout']; ?></span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cart"></i> <span><?= $lang['buy hashrate']; ?></span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
								<?php
								$stmt = $link->query("SELECT * FROM `types`");
								if($stmt->rowCount() > 0) {
									while ($row = $stmt->fetch()) {
								?>
									<li><a href="<?php echo $url; ?>#<?php echo $row['name']; ?>" class=""><?php echo $row['name']; ?></a></li>
								<?php 
									}
									}
								?>
								</ul>
							</div>
						</li>
						<li><a href="<?php echo $url; ?>" class="<?php if($page == ""){ echo "active"; } ?>"><i class="lnr lnr-home"></i> <span><?= $lang['dashboard']; ?></span></a></li>
						<li><a href="<?php echo $url; ?>history" class="<?php if($page == "history"){ echo "active"; } ?>"><i class="lnr lnr-history"></i> <span><?= $lang['history']; ?></span></a></li>
						<li><a href="<?php echo $url; ?>withdraw" class="<?php if($page == "withdraw"){ echo "active"; } ?>"><i class="lnr lnr-download"></i> <span><?= $lang['withdraw']; ?></span></a></li>
						<li><a href="<?php echo $url; ?>settings" class="<?php if($page == "settings"){ echo "active"; }?>"><i class="lnr lnr-cog"></i> <span><?= $lang['settings']; ?></span></a></li>
						<?php if(isAdmin()) { ?>
						<hr>
						<li><a href="<?php echo $url; ?>admin" class="<?php if($page == "admin"){ echo "active"; }?>" ><i class="lnr lnr-eye"></i> <span>Admin</span></a></li>
						<li><a href="<?php echo $url; ?>admin/asettings" class="<?php if($page == "asettings"){ echo "active"; }?>" ><i class="lnr lnr-cog"></i> <span>Site Prefences</span></a></li>
						<li><a href="<?php echo $url; ?>admin/users" class="<?php if($page == "users"){ echo "active"; }?>" ><i class="lnr lnr-users"></i> <span>Users Management</span></a></li>
						<li><a href="<?php echo $url; ?>admin/withdraw-requests" class="<?php if($page == "withdraw-requests"){ echo "active"; }?>" ><i class="lnr lnr-layers"></i> <span>Withdraw Requests</span></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</div>

		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<?php $currencies = $link->query("SELECT * FROM `currencies`"); ?>

				<?php while ($currency = $currencies->fetch()) : ?>
					<input type="hidden" id="<?php echo $currency['name']; ?>price" value="<?php echo $currency['price']; ?>">
				<?php endwhile; ?>