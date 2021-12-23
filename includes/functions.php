<?php
	function protect ($string) {
		$protection = htmlspecialchars(trim($string), ENT_QUOTES);
		return $protection;
	}
	
	function isValidURL($url) {
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}

	function isValidUsername($str) {
		return preg_match('/^[a-zA-Z0-9-_]+$/',$str);
	}

	function isValidEmail($str) {
		return filter_var($str, FILTER_VALIDATE_EMAIL);
	}

	function msg($text,$type = false){
		if ($type == true){
			return '<div class="alert alert-success"><i class="fa fa-check"></i> '.$text.'</div>';
		}else {
			return '<div class="alert alert-danger"><i class="fa fa-times"></i> '.$text.'</div>';
		}	
	}

	function get_settings () {
		global $link;
		$settings = [];
		$stmt = $link->query("SELECT * FROM `settings`");
        while ($row = $stmt->fetch()) {
            $settings[$row['name']] = $row['value'];
		}

		return $settings;
	}

	function hash_pass ($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}

	function isConnected () {
		return isset($_SESSION['user_id']);
	}
	function emailExists($email) {
		global $link;
		return ($link->query("SELECT * FROM `users` WHERE `email` = '$email'")->rowCount() > 0);
	}
	
	function currencyExists($currency) {
		global $link;
		return ($link->query("SELECT * FROM `currencies` WHERE `name` = '$currency'")->rowCount() > 0);
	}
	function typeExists($type_id) {
		global $link;
		return ($link->query("SELECT * FROM `types` WHERE `id` = '$type_id'")->rowCount() > 0);
	}
	function get_revenue_by_type_id($type_id) {
		global $link;
		return ($link->query("SELECT * FROM `types` WHERE `id` = '$type_id'")->fetch()['revenue']);
	}
	
	
	function logout () {
		unset($_SESSION['user_id']);
		session_unset();
		session_destroy();
	}


	function get_user_row_by_id ($id) {
		global $link;
		return $link->query("SELECT * FROM `users` WHERE `id` = {$id}")->fetch();
	}
	function get_package_by_id ($id) {
		global $link;
		return $link->query("SELECT * FROM `packages` WHERE `id` = {$id}")->fetch();
	}
	
	function get_deposit_address ($currency) {
		global $link;
		return $link->query("SELECT * FROM `currencies` WHERE `name` = '{$currency}'")->fetch()['address'];
	}
	
	function CalculateBuyPrecents(){
		global $link;
		$users = $link->query("SELECT * FROM `users`")->rowCount();
		$packages = $link->query("SELECT DISTINCT user_id FROM `packages` WHERE status = 100")->rowCount();
		return number_format(($packages / $users) * 100, 1);
	}
	function get_user_row_by_username ($username) {
		global $link;
		return $link->query("SELECT * FROM `users` WHERE `username` = {$username}")->fetch();
	}
	
	function checkPayment($txn_id){
		global $_SETTINGS;
		$api_key = $_SETTINGS['coinpayments_public'];
		$private = $_SETTINGS['coinpayments_private'];
		$url = "https://www.coinpayments.net/api.php";
		$param = "txid={$txn_id}&cmd=get_tx_info&key={$api_key}&format=json&version=1";
		$hmac = hash_hmac('sha512', $param, $private);  

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$param);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"HMAC: {$hmac}",
				));
			$server_output = curl_exec ($ch);
			$data = json_decode($server_output, TRUE);

			curl_close ($ch);
			return json_decode($server_output, TRUE);
	}
	
	function request($url,$param=false){
		$json = file_get_contents($url);
		$data = json_decode($json, TRUE);
		return $data[$param];
		//return var_dump($data);
	}
	
	function getIP(){
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   
		{
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	
	function is_time_valid ($time) {
		return preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $time);
	}
	
	function checkCredentials($email, $password) {
		global $link;
		$stmt = $link->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
		if ($stmt->rowCount() > 0) { 
			$row = $stmt->fetch();
			return $row['id'];
		} else {
			return false;
		}
		
	}
	
	function title($var) {
		global $_SETTINGS;
		if($var == "settings") { return $_SETTINGS['name']." | Settings"; }
		elseif ($var == "buy"){ return $_SETTINGS['name']." | Buy Hashrates"; }
		elseif ($var == "withdraw"){ return $_SETTINGS['name']." | Withdraw Funds"; }
		elseif ($var == "users"){ return $_SETTINGS['name']." | Users"; }
		elseif ($var == "withdraw-requests"){ return $_SETTINGS['name']." | Withdraw Requests"; }
		else { return $_SETTINGS['name'].' | '.$_SETTINGS['desc']; }
	}

	function get_currency_to_usd ($currency) {
		global $link;
		return $link->query("SELECT * FROM `currencies` WHERE `name` = '{$currency}'")->fetch()['price'];
	}

	function btc_to_usd ($btc, $decimal_places) {
		global $link;
		$usd_cur = get_currency_to_usd('BTC');
		return $usd_cur * $btc;
	}

	function get_currency_by_id ($id) {
		global $link;
		return $link->query("SELECT * FROM `currencies` WHERE `id` = {$id}")->fetch();
	}

	function get_currency_by_name ($name) {
		global $link;
		return $link->query("SELECT * FROM `currencies` WHERE `name` = '{$name}'")->fetch();
	}
	
	function isAdmin(){
		global $link;
		if (!isConnected()) return false;
		$user_id = protect($_SESSION['user_id']);
		return($stmt = $link->query("SELECT * FROM `users` WHERE `id` = '$user_id' AND `level` = '2'")->rowCount() > 0);
	}
	
	function updateActivity($uid, $type){
		global $link;
		$timestamp = time();
		$statement = $link->prepare("INSERT INTO activity (uid,type,timestamp) VALUES(?, ?, ?)");
		$statement->execute(array($uid, $type, $timestamp));
	}
	
	function timeago($time){
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

		   $difference     = $now - $time;
		   $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		   $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
		   $periods[$j].= "s";
	   }

	   return "$difference $periods[$j] ago ";
	}
	
	function showActivity($type){
		if($type == "login") { return "successfuly logged in."; }
		elseif ($type == "register") { return "successfuly registerd."; }
		elseif ($type == "settings") { return "changed settings."; }
		elseif ($type == "password") { return "changed password."; }
	}
	
	function updateLogin($uid){
		global $link;
		$timestamp = time();
		$statement = $link->prepare("UPDATE users SET logged_at=? WHERE id={$uid}");
		$statement->execute(array($timestamp));
	}
	function UpdateLastActivity($uid){
		global $link;
		$timestamp = time();
		$statement = $link->prepare("UPDATE users SET last_activity=? WHERE id={$uid}");
		$statement->execute(array($timestamp));
	}
	
	function PedingWithdrawRequest($uid) {
		global $link;
		$stmt = $link->query("SELECT * FROM `withdraw_requests` WHERE `uid` = '$uid' AND `approved` = 0");
		if ($stmt->rowCount() > 0) { 
			$var = "";
			while($row = $stmt->fetch()){
				$var += $row['amount'];
			}
			return $var;
		} else {
			return "0";
		}
	}
	
	function updateCryptoPrice($name){
		global $link;
		$url = "https://min-api.cryptocompare.com/data/price?fsym={$name}&tsyms=USD";
		$json = file_get_contents($url);
		$data = json_decode($json, TRUE);
		$statement = $link->prepare("UPDATE currencies SET price=? WHERE name='{$name}'");
		$statement->execute(array($data['USD']));
		return true;
	}
	
	function get_type_by_id ($id) {
		global $link;
		return $link->query("SELECT * FROM `types` WHERE `id` = {$id}")->fetch();
	}

	function get_type_by_name ($name) {
		global $link;
		return $link->query("SELECT * FROM `types` WHERE `name` = '{$name}'")->fetch();
	}
	
	function usd_to_currency ($currency,$usd) {
		global $link;
		// TODO : Rate price
		  $rate_price = get_type_by_name ($currency)['price'];  
		  $rate = "11500";
		  return round( $usd / $rate , 8 );
	}
	
	function currency_to_usd($currency,$amount){
		global $link;
		$currency = get_currency_by_id($currency)['price'];  

		$convertedCost = $currency / $amount;

		return number_format( $convertedCost, 2);
	}

	function get_currency_to_btc_by_id ($id) {
		global $link;
		$currency = get_currency_by_id($id);
		$btc = get_currency_by_name('BTC');
		return $btc['price'] / $currency['price'];
	}

	function get_user_daily_revenue_by_type($type_id, $user_id = null) {
		global $link;

		$user_id = $user_id ? $user_id : $_SESSION['user_id'];
		$type = get_type_by_id($type_id);

		$revenue = 0.0;
		$user_type_packages = $link->query("SELECT * FROM `packages` WHERE `user_id` = {$user_id} AND `type_id` = {$type_id}");

		while ($package = $user_type_packages->fetch()) {
			$revenue += $package['amount'] * $package['revenue'];
		}

		return $revenue * get_currency_to_btc_by_id($type['revenue_currency']);
	}

	function get_user_hashrate_by_type($type_id) {
		global $link;

		$type = get_type_by_id($type_id);
		$hashrate = 0.0;
		$user_type_packages = $link->query("SELECT * FROM `packages` WHERE `user_id` = {$_SESSION['user_id']} AND `type_id` = {$type_id} AND ((`recived` AND `status` = 100) OR `is_bought_from_balance`)");

		while ($package = $user_type_packages->fetch()) {
			$hashrate += $package['amount'];
		}

		return $hashrate / 1000;
	}

	function get_type_revenue_by_date($type_id, $date) {
		global $link;
		return $link->query("SELECT `revenue` FROM `types_revenues` WHERE `type_id` = {$type_id} AND `date` = '{$date}'")->fetch()['revenue'];
	}

	function get_type_revenue_of_now($type_id) {
		global $link;
		return $link->query("SELECT `revenue` FROM `types` WHERE `id` = {$type_id}")->fetch()['revenue'];
	}

	function get_user_currency_balance_by_date($user_id, $currency_id, $date) {
		global $link;
		$balance = $link->query("SELECT `balance` FROM `user_daily_currencies_balances` WHERE `user_id` = {$user_id} AND `currency_id` = {$currency_id} AND `date` = {$date}");
		if ($balance->rowCount() > 0) {
			$balance = $balance->fetch()['balance'];

			if ($balance > 0) {
				return $balance;
			} else {
				return 0.0;
			}
		} else {
			return 0.0;
		}
	}

	function get_user_currency_payout_by_date($user_id, $currency_id, $date) {
		global $link;
		$payout = $link->query("SELECT `amount` FROM `payouts` WHERE `user_id` = {$user_id} AND `currency_id` = {$currency_id} AND `date` = {$date}");
		if ($payout->rowCount() > 0) {
			$payout = $payout->fetch()['balance'];

			if ($payout > 0) {
				return $payout;
			} else {
				return 0.0;
			}
		} else {
			return 0.0;
		}
	}

	function get_user_currency_balance ($user_id, $currency_id) {
		global $link;
		$currency = get_currency_by_id($currency_id);

		$stmt = $link->query("SELECT `" . strtolower($currency['name']) . "_balance` FROM `users` WHERE `id` = {$user_id}");
		if ($stmt->rowCount() > 0) {
			return $stmt->fetch()[strtolower($currency['name']) . "_balance"];
		} else {
			return false;
		}

	}

	function get_user_last_type_payout ($user_id, $currency_id) {
		global $link;
		return ($link->query("SELECT * FROM `payouts` WHERE `user_id` = {$user_id} AND `currency_id` = {$currency_id} ORDER BY `id` DESC LIMIT 1"));
	}
	
	function get_total_balance() {
		global $link;
		return($link->query("SELECT sum(balance) as total FROM `users`")->fetch()["total"]);
	}

	function get_word ($word, $get_capital) {
		global $lang;
		
		$rtn = $lang[$word];

		if ($get_capital) {
			$rtn = ucfirst($rtn);
		}

		return $rtn;
	}
?>