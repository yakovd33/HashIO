<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	ob_start();
	session_start();
	include("../../includes/class_lib.php");
	include("../../includes/config.php");
	$url = 'http://'.$_SERVER['HTTP_HOST'].'/';
	include("../../includes/functions.php");
	$_SETTINGS = get_settings();
	$type = protect($_GET['type']);
	if (isConnected()) {
		$user_id = $MBNL->protect($_SESSION['user_id']);
		$CUR_USER = get_user_row_by_id($user_id);
		if($type == "ChangePassword") { 
			$password = $MBNL->protect($_POST['password']);
			$rpassword = $MBNL->protect($_POST['rpassword']);
			
			if(empty ($password) OR empty($rpassword)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You have to type password."); }
			elseif($password != $rpassword){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Passwords not match."); }
			elseif(strlen($password)<8) { $data['status'] = "error"; $data['msg'] = msg("Password have to be atleast 8 characters"); }
			else {
				$password = $MBNL->enc($password);
				$statement = $link->prepare("UPDATE users SET password=? WHERE id={$user_id}");
				$statement->execute(array($password));
				
				updateActivity($_SESSION['user_id'], "password");
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "Your password has been changed.", true);
			}
			echo json_encode($data);
		}
		elseif ($type == "editBTC") { 
			$BTC = $MBNL->protect($_POST['btc_address']);
			if(empty($BTC)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave it empty."); }
			elseif(strlen($BTC) > 64){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Maximum 64 characters"); }
			else {
				$statement = $link->prepare("UPDATE users SET btc=? WHERE id={$user_id}");
				$statement->execute(array($BTC));
				updateActivity($_SESSION['user_id'], "settings");
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "BTC address updated successfuly", true);
			}
			echo json_encode($data);
		}
		elseif ($type == "editETH") { 
			$ETH = $MBNL->protect($_POST['eth_wallet']);
			if(empty($ETH)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave it empty."); }
			elseif(strlen($ETH) > 64){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Maximum 64 characters"); }
			else {
				$statement = $link->prepare("UPDATE users SET eth=? WHERE id={$user_id}");
				$statement->execute(array($ETH));
				updateActivity($_SESSION['user_id'], "settings");
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "ETH address updated successfuly", true);
			}
			echo json_encode($data);
		}
		elseif ($type == "editDASH") { 
			$DASH = $MBNL->protect($_POST['dash_wallet']);
			if(empty($DASH)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave it empty."); }
			elseif(strlen($DASH) > 64){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Maximum 64 characters"); }
			else {
				$statement = $link->prepare("UPDATE users SET dash=? WHERE id={$user_id}");
				$statement->execute(array($DASH));
				updateActivity($_SESSION['user_id'], "settings");
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "DASH address updated successfuly", true);
			}
			echo json_encode($data);
		}
		elseif ($type == "editZEC") { 
			$ZEC = $MBNL->protect($_POST['zec_wallet']);
			if(empty($ZEC)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave it empty."); }
			elseif(strlen($ZEC) > 64){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Maximum 64 characters"); }
			else {
				$statement = $link->prepare("UPDATE users SET zec=? WHERE id={$user_id}");
				$statement->execute(array($ZEC));
				updateActivity($_SESSION['user_id'], "settings");
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "ZEC address updated successfuly", true);
			}
			echo json_encode($data);
		}
		elseif ($type == "editContact") {
			$first_name = $MBNL->protect($_POST['first_name']);
			$last_name = $MBNL->protect($_POST['last_name']);
			$company = $MBNL->protect($_POST['company']);
			$company_code = $MBNL->protect($_POST['company_code']);
			$VAT = $MBNL->protect($_POST['VAT']);
			$address = $MBNL->protect($_POST['address']);
			$address2 = $MBNL->protect($_POST['address2']);
			$city = $MBNL->protect($_POST['city']);
			$region = $MBNL->protect($_POST['region']);
			$country = $MBNL->protect($_POST['country']);
			$post_code = $MBNL->protect($_POST['post_code']);
			$phone_extension = $MBNL->protect($_POST['phone_extension']);
			$phone_number = $MBNL->protect($_POST['phone_number']);
			
			if(empty($first_name) OR empty($last_name) OR empty($company) OR empty($address) OR empty($city) OR empty($region) OR empty($country) OR empty($post_code)){$data['status'] = "error"; $data['msg'] = $MBNL->msg("Please fill all the required fields.");}
			elseif(!is_numeric($post_code) OR !is_numeric($company_code)){$data['status'] = "error"; $data['msg'] = $MBNL->msg("ERROR");}
			else {
				$statement = $link->prepare("UPDATE users SET first_name=?, last_name=?, company=?, company_code=?, VAT=?, address=?, address2=?, city=?, region=?, country=?, post_code=?,phone_extension=?,phone_number=? WHERE id={$user_id}");
				$statement->execute(array($first_name, $last_name, $company, $company_code, $VAT, $address, $address2, $city, $region, $country, $post_code, $phone_extension, $phone_number));
				updateActivity($_SESSION['user_id'], "settings");
				
				
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "Your contact information updated successfuly.", true);
			}
			echo json_encode($data);
		}
		elseif ($type == "withdraw") { 
			$amount = $MBNL->protect($_POST['amount']);
			$currency = $MBNL->protect($_POST['currency']);
			
			$peding_requests = PedingWithdrawRequest($user_id);
			$balance = $CUR_USER['balance'] - $peding_requests;
			
			if(empty($amount) OR empty($currency)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave empty fields."); }
			elseif(!is_numeric($amount)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Amount must be numbers only."); }
			elseif($amount > $balance){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You don't have enough balance to withdraw this amount."); }
			elseif($amount < $_SETTINGS['min_withdraw']){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Minimum withdraw amount {$_SETTINGS['min_withdraw']}$"); }
			else{
				$timestamp = time();
				try{
					$statement = $link->prepare("INSERT INTO withdraw_requests (uid,amount,currency,timestamp) VALUES(?, ?, ?, ?)");
					$statement->execute(array($user_id, $amount, $currency, $timestamp));
					$data['status'] = "success";
					$data['msg'] = $MBNL->msg("Your withdraw request of {$amount}$ sent to approve, its usually takes 24 hours.", true);
				}
				catch(PDOException $e){
					//$sql . "<br>" . $e->getMessage();
					$data['status'] = "error";
					$data['msg'] = $MBNL->msg("SERVER ERROR"); 
				}
			}
			echo json_encode($data);
		}
		elseif ($type == "generate_payment") {
			$data = [ 'status' => 'success' ];

			$currency = $MBNL->protect($_POST['currency']);
			$amount = $MBNL->protect($_POST['amount']);
			$type_id = $MBNL->protect($_POST['type_id']);
			$quantity = $MBNL->protect($_POST['quantity']);
			$type = get_type_by_id($type_id);
			$timestamp = time();
			$quantity = $_POST['amount'];
			$amount_currency = usd_to_currency($currency,$amount);
			$revenue = get_revenue_by_type_id($type_id);

			if ($currency != 'balance') {		
				if(!currencyExists($currency)){}
				elseif(!is_numeric($amount) OR !is_numeric($type_id) OR !is_numeric($quantity)){}
				elseif(!typeExists($type_id)){}
				else {
					$address = get_deposit_address($currency);
					$api_key = $_SETTINGS['coinpayments_public'];
					$private = $_SETTINGS['coinpayments_private'];
					$url = "https://www.coinpayments.net/api.php";
					$param = "amount={$amount}&currency1=USD&currency2={$currency}&address={$address}&cmd=create_transaction&key={$api_key}&format=json&version=1";
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
					if($data['error'] == "ok"){
						$data = $data['result'];
						$statement = $link->prepare("INSERT INTO packages (type_id,user_id,amount,price,price_usd,txn_id,timestamp,revenue, qrcode, address, currency, timeout) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
						$statement->execute(array($type_id, $user_id, $quantity, $amount_currency, $amount, $data['txn_id'], $timestamp, $revenue, $data['qrcode_url'], $data['address'], get_currency_by_name($currency)['id'], $data['timeout']));
						$package = get_package_by_id($link->lastInsertId());
						echo json_encode(['txn_id' => $package['txn_id']]);
					}
				}
			} else {
				$price = $amount * $type['price'];
				get_currency_by_name($currency)['id'];
				$peding_requests = PedingWithdrawRequest($user_id);
				$balance = $CUR_USER['balance'] - $peding_requests;
				
				if(empty($amount) OR empty($currency)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave empty fields."); }
				elseif(!is_numeric($amount)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Amount must be numbers only."); }
				elseif($amount > $balance){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You don't have enough balance to withdraw this amount."); }
				elseif($amount < $_SETTINGS['min_withdraw']){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Minimum withdraw amount {$_SETTINGS['min_withdraw']}$"); }
				else {
					$statement = $link->prepare("INSERT INTO `packages` (`type_id`, `user_id`, `amount`, `price`, `price_usd`, `txn_id`, `timestamp`, `revenue`, `is_bought_from_balance`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$statement->execute(array($type_id, $user_id, $amount, $price, $amount_currency, md5(time() + rand(0, 100000000)), $timestamp, $revenue, 1));
					$package = get_package_by_id($link->lastInsertId());
					
					// Take money from balance
					$link->query("UPDATE `users` SET `balance` = `balance` - {$price} WHERE `id` = {$_SESSION['user_id']}");
					echo json_encode(['txn_id' => $package['txn_id']]);
				}

				if ($data['status'] == 'error') {
					echo json_encode($data);
				}
			}
		} elseif($type == "editSettings"){
			if($CUR_USER['level'] != 2){die();}
			$settings_stmt = $link->query("SELECT * FROM `settings`");
			if($settings_stmt->rowCount() > 0) {
				while($row = $settings_stmt->fetch()){
					$var = $_POST[$row['name']];
					if(empty($var)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("You cant leave empty fields"); }
					else {
						$link->query("UPDATE `settings` SET `value`= '{$var}' WHERE `name` = '{$row['name']}'");
						$data['status'] = "success";
						$data['msg'] = $MBNL->msg("Settings updated successfuly.", true);
					}
				}
				
			}
			echo json_encode($data);
			
		} elseif($type == "editRevenue"){
			if($CUR_USER['level'] != 2){die();}
			$settings_stmt = $link->query("SELECT * FROM `types`");
			if($settings_stmt->rowCount() > 0) {
				while($row = $settings_stmt->fetch()){
					$price = $_POST[$row['name']."-Price"];
					$revenue = $_POST[$row['name']."-Revenue"];
//					echo $price.' '.$revenue."<br>";
					$link->query("UPDATE `types` SET `price`= '{$price}', `revenue`= '{$revenue}' WHERE `id` = '{$row['id']}'");
					$data['status'] = "success";
					$data['msg'] = $MBNL->msg("Changes updated successfuly.", true);
				}
				
			}
			echo json_encode($data);
			
		} elseif($type == "editWallet"){
			if($CUR_USER['level'] != 2){die();}
			$curr_stmt = $link->query("SELECT * FROM `currencies`");
			if($curr_stmt->rowCount() > 0) {
				while($row = $curr_stmt->fetch()){
					$var = $_POST[$row['name']];
//					echo $price.' '.$revenue."<br>";
					$link->query("UPDATE `currencies` SET `address`= '{$var}' WHERE `id` = '{$row['id']}'");
					$data['status'] = "success";
					$data['msg'] = $MBNL->msg("Changes updated successfuly.", true);
				}
				
			}
			echo json_encode($data);
		}
	} else {
		if ($type == "register") {
			$first_name = protect($_POST['firstname']);
			$last_name = protect($_POST['lastname']);
			$email = protect($_POST['email']);
			$country = protect($_POST['country']);
			$bday = protect($_POST['bday']);
			$bmonth = protect($_POST['bmonth']);
			$byear = protect($_POST['byear']);
			$password = protect($_POST['password']);
			$rpassword = protect($_POST['rpassword']);
			
			if(empty($first_name) OR empty($last_name) OR empty($email) OR empty($password) OR empty($rpassword) OR empty($country) OR empty($bday) OR empty($bmonth) OR empty($byear)){$data['status'] = "error"; $data['msg'] = $MBNL->msg("Please fill all the required fields.");}
			elseif(!is_numeric($bday) OR !is_numeric($bmonth) OR !is_numeric($byear)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("ERROR");}
			elseif(is_numeric($country)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("ERROR");}
			elseif(!isValidEmail($email)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Please enter valid email.");}
			elseif($password != $rpassword){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Passwords not match");}
			elseif(emailExists($email)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("We are sorry, the email address you entered already exists.");}
			elseif(strlen($password)<8) { $data['status'] = "error"; $data['msg'] = msg("Password have to be atleast 8 characters"); }
			else{
				$password = $MBNL->enc($password);
				$timestamp = time();
				$statement = $link->prepare("INSERT INTO users (first_name,last_name,email,password,country,bday,bmonth,byear,registerd_at) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$statement->execute(array($first_name, $last_name, $email, $password, $country, $bday, $bmonth, $byear,$timestamp));
				$_SESSION['user_id'] = $link->lastInsertId();
				updateActivity($_SESSION['user_id'], "register");
				SetDefaultBalance($_SESSION['user_id']);
				
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "Your account created successfuly, you will redirect in 2 seconds.", true);
				$data['redirect'] = $MBNL->MoveTo($url, 2);
			}
			echo json_encode($data);
		}
		elseif ($type == "login") {
			$email = protect($_POST['email']);
			$password = protect($_POST['password']);
			$password = $MBNL->enc($password);
			
			if (empty($email) OR empty ($password)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Please fill all the required fields.");}
			elseif(!isValidEmail($email)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Please enter valid email.");}
			elseif(!checkCredentials($email, $password)){ $data['status'] = "error"; $data['msg'] = $MBNL->msg("Invalid Credentials");}
			else {
				$_SESSION['user_id'] = checkCredentials($email, $password);
				updateActivity($_SESSION['user_id'], "login");
				updateLogin($_SESSION['user_id']);

				
				$data['status'] = "success";
				$data['msg'] = $MBNL->msg( "Logged in successfuly, redirecting...", true);
				$data['redirect'] = $MBNL->MoveTo($url, 2);
			}
			echo json_encode($data);
		}
		
	}
?>