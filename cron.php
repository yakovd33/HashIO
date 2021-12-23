<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	ob_start();
	session_start();
	include("includes/class_lib.php");
	include("includes/config.php");
	$url = 'http://'.$_SERVER['HTTP_HOST'].'/';
	include("includes/functions.php");
	$_SETTINGS = get_settings();
	$timestamp = time();

	   $stmt = $link->query("SELECT * FROM `currencies`");
	   if($stmt->rowCount() > 0){
        while ($row = $stmt->fetch()) {
           updateCryptoPrice($row['name']);
        }
	   }
	   $stmt = $link->query("SELECT * FROM `packages` WHERE `status` = 0");
	   if($stmt->rowCount() > 0){
        while ($row = $stmt->fetch()) {
           $data = checkPayment($row['txn_id'])['result'];
		  // if($data['amountf'] == $data['receivedf']){$payment = "completed";}
		   if($data['time_expires'] < $timestamp){ $status = "2"; } else { $status = $data['status']; } // if time expired passed.
		   $confirms = $data['recv_confirms'];
		   $status_text = $data['status_text'];
		   $statement = $link->prepare("UPDATE packages SET confirms=?, status_text=?, status=? WHERE id={$row['id']}");
		   $statement->execute(array($confirms, $status_text, $status));
			//// ---- Debugging printing info ------
		   /*echo "Time created: ".$data['time_created']."<br><br>";
		   echo "Time expries: ".$data['time_expires']."<br><br>";
		   echo "Status: ".$data['status']."<br><br>";
		   echo "Status TEXT: ".$data['status_text']."<br><br>";
		   echo "amountf: ".$data['amountf']."<br><br>";
		   echo "receivedf: ".$data['receivedf']."<br><br>";
		   echo "recv_confirms: ".$data['recv_confirms']."<br><br>";
		   echo '------------------- Done -------------------<br><br>';*/
        }
	   }
	  // echo date('d-m-Y H:i', 1520432133)."<br>";
	  // echo date('d-m-Y H:i', $timestamp)."<br>";
	   
	if (date('H:i', time()) == "23:59" || isset($_GET['test'])) {
		// Midnight crons
		// types_revenues update
		$types_stmt = $link->query("SELECT * FROM `types`");

		while ($type = $types_stmt->fetch()) {
			$link->query("INSERT INTO `types_revenues`(`type_id`, `date`, `revenue`) VALUES ({$type['id']}, CURDATE(), {$type['revenue']})");
		}

		// Get revenues to balance
		// Loop through all users
		$users_stmt = $link->query("SELECT * FROM `users` WHERE 1");

		while ($user = $users_stmt->fetch()) {
			$types_stmt = $link->query("SELECT * FROM `types`");

			while ($type = $types_stmt->fetch()) {
				$revenue = get_user_daily_revenue_by_type($type['id'], $user['id']);
				// Update revenue
				$link->query("UPDATE `users` SET `balance` = `balance` + {$revenue} WHERE `id` = {$user['id']}");

				$currency_id = $type['revenue_currency'];
				$currency = get_currency_by_id($currency_id);

				// Insert payout
				$link->query("INSERT INTO `payouts`(`user_id`, `currency_id`, `date`, `amount`) VALUES ({$user['id']}, {$currency_id}, CURDATE(), {$revenue})");
				
				$new_balance = (float) $user[strtolower($currency['name']) . '_balance'] + $revenue;

				// Insert daily balance
				$link->query("INSERT INTO `user_daily_currencies_balances`(`user_id`, `currency_id`, `balance`, `date`) VALUES ({$user['id']}, {$currency_id}, {$new_balance}, CURDATE())");

				// Update user currency balance
				$link->query("UPDATE `users` SET `" . strtolower($currency['name']) . "_balance` = {$new_balance}");
			}
		}
	}
?>