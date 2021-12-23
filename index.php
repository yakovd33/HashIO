<?php	
	session_start();
	ob_start();

	if (isset($_SESSION['language'])) {
		include('languages/' . $_SESSION['language'] . '.php');
	} else {
		include('languages/en.php');
	}
	

	require_once("includes/class_lib.php");
	require_once("includes/config.php");
	include("includes/functions.php");

	$_SETTINGS = get_settings();

	$url = 'http://' . $_SERVER['HTTP_HOST'] . '/miner/';

	if (isset($_GET['page'])) {
		$page = $MBNL->protect($_GET['page']);
	} else {
		$page = '';
	}

	// Construct page
	if(isConnected()) {
		if(isset($_SESSION['language'])){ $language = $_SESSION['language'];} else {$language = "en";}
		$CUR_USER = get_user_row_by_id($_SESSION['user_id']);
		include("sources/views/header.php");
		UpdateLastActivity($_SESSION['user_id']);
		switch($page) {
			case "logout" :
				logout();
				header("Location: ../");
				break;	
			case "language" :
				if (isset($_GET['lang'])) { $language = $MBNL->protect($_GET['lang']); } else { $language = ''; }
				$lang = $link->query("SELECT * FROM `languages` WHERE short = '{$language}'");
				if($lang->rowCount() > 0) {
					$row = $lang->fetch();
					$_SESSION['language'] = $row['short'];
				} else { $_SESSION['language'] = "en"; }
				header("Location: ../");
				break;
			case "settings" :
				include("sources/views/account/settings.php");
				break;
			case "admin" :
				include("sources/views/admin/default.php");
				break;
			case "users" :
				include("sources/views/admin/users.php");
				break;
			case "withdraw" :
				include("sources/views/account/withdraw.php");
				break;
			case "history" :
				include("sources/views/account/history.php");
				break;
			case "buy" :
				include("sources/views/buy.php");
				break;
			case "transaction" :
				include("sources/views/transaction.php");
				break;
			case "withdraw-requests" :
				include("sources/views/admin/withdraw-requests.php");
				break;
			case "purchases" :
				include("sources/views/admin/purchases.php");
				break;
			case "asettings" :
				include("sources/views/admin/settings.php");
				break;
			case "user-add-package" :
				include("sources/views/admin/users.php");
				break;
			default:
				include("sources/views/default.php");
		}	
		include("sources/views/footer.php");		
	} else {		
		switch($page) {
			case "register" :
				include("sources/register.php");
				break;
			default:
				include("sources/login.php");
		}	
	}


?>