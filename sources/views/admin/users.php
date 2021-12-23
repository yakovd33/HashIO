	<?php
	if($CUR_USER['level'] != 2){echo $MBNL->MoveTo($url); die;}
	
	if(isset($_GET['b'])){
		$b = $MBNL->protect($_GET['b']);
	} else {
		$b = "";
	}
	?>

		<div class="container-fluid">
	<?php
	if ($b == "edit") {
		$error = "";
		$id = $MBNL->protect($_GET['id']);
		$stmt = $link->query("SELECT * FROM `users` WHERE `id` = {$id}");
		if($stmt->rowCount() == 0) {echo $MBNL->MoveTo($url);die; }
		$user = $stmt->fetch();
		$name = $user['first_name']." ".$user['last_name'];
		
		if(isset($_POST['submit'])){
			$first_name = $MBNL->protect($_POST['first_name']);
			$last_name = $MBNL->protect($_POST['last_name']);
			$email = $MBNL->protect($_POST['email']);
			$level = $MBNL->protect($_POST['level']);
			$btc = $MBNL->protect($_POST['btc']);
			$eth = $MBNL->protect($_POST['eth']);
			$dash = $MBNL->protect($_POST['dash']);
			$zec = $MBNL->protect($_POST['zec']);
			
			
			if(empty($first_name) OR empty($last_name) OR empty($email) OR empty($level)){ $error = $MBNL->msg("Please fill the required fields."); }
			elseif(!is_numeric($level)){ $error = $MBNL->msg("ERROR"); }
			elseif(!isValidEmail($email)) { $error = $MBNL->msg("Please enter a valid email.");}
			else{
				try{
					$statement = $link->prepare("UPDATE users SET first_name=?, last_name=?, email=?, level=?, btc=?, eth=?, dash=?, zec=? WHERE id={$id}");
					$statement->execute(array($first_name, $last_name, $email, $level, $btc, $eth, $dash, $zec));
					$error = $MBNL->msg("Changes updated successfuly.", true);
				}
				catch(PDOException $e){
					//$sql . "<br>" . $e->getMessage();
					$error = $MBNL->msg("SERVER ERROR"); 
				}
	}
		}
	?>
		<h3 class="page-title">Edit User</h3>
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<!-- PANEL DEFAULT -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit <?php echo $name; ?></h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body">
				<?php echo $error; ?>
				<form role="editUser" class="form-horizontal" method="post" accept-charset="utf-8">
					<div class="form-group">
						<label for="UserFirstName" class="col-sm-3 control-label control-label">First Name</label>
						<div class="col-sm-9">
							<input name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" maxlength="40" type="text"  style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<label for="userlastname" class="col-sm-3 control-label control-label">Last Name</label>
						<div class="col-sm-9">
							<input name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" maxlength="40" type="text"  style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label control-label">Email</label>
						<div class="col-sm-9">
							<input name="email" class="form-control" value="<?php echo $user['email']; ?>" maxlength="40" type="email" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<label for="level" class="col-sm-3 control-label control-label">Level</label>
						<div class="col-sm-9">
						<select name="level" class="form-control" id="sel1">
							<option value="1" <?php if($user['level'] == 1){ echo "selected";} ?>>USER</option>
							<option value="2" <?php if($user['level'] == 2){ echo "selected";} ?>>ADMIN</option>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label for="btc" class="col-sm-3 control-label control-label">BTC Wallet</label>
						<div class="col-sm-9">
							<input name="btc" class="form-control" value="<?php echo $user['btc']; ?>" maxlength="64" type="text" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<label for="eth" class="col-sm-3 control-label control-label">ETH Wallet</label>
						<div class="col-sm-9">
							<input name="eth" class="form-control" value="<?php echo $user['eth']; ?>" maxlength="64" type="text" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<label for="dash" class="col-sm-3 control-label control-label">DASH Wallet</label>
						<div class="col-sm-9">
							<input name="dash" class="form-control" value="<?php echo $user['dash']; ?>" maxlength="64" type="text" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<label for="zec" class="col-sm-3 control-label control-label">ZEC Wallet</label>
						<div class="col-sm-9">
							<input name="zec" class="form-control" value="<?php echo $user['zec']; ?>" maxlength="64" type="text" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" name="submit" type="submit" value="Save"></div>
					</div>
				<form>
				</div>
			</div>
			<!-- END PANEL DEFAULT -->
		</div>
		<div class="col-md-3"></div>
		</div>
	<?php	
	} 
	elseif ($b == "delete") {
		$id = $MBNL->protect($_GET['id']);
		$stmt = $link->query("SELECT * FROM `users` WHERE `id` = {$id}");
		if($stmt->rowCount() == 0) {echo $MBNL->MoveTo($url);die; }
		$user = $stmt->fetch();
		$name = $user['first_name']." ".$user['last_name'];
	?>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-headline">
				<?php 
					if(isset($_POST['submit'])){
						$stmt = $link->query("DELETE FROM `users` WHERE `id` = {$id}");
					echo "<div class='panel-heading'><h3 class='panel-title text-center'>";	echo $MBNL->msg("The user {$name} deleted successfuly.", true); echo "</h3></div>";
					}
					else {
				?>
				<div class="panel-heading">
					<h3 class="panel-title text-center">Delete user <?php echo $user['first_name']." ".$user['last_name']; ?>?</h3>
				</div>
				<div class="panel-body text-center">
					<h4>By deleting the user you can't undo the changes.</h4>
					<form method="POST" action="">
						<input type="submit" name="submit" class="btn btn-danger" value="Delete">
						<a href="<?php echo $url;?>admin/users"><button type="button" class="btn btn-primary">Cancel</button></a>
					</form>
				</div>
				<?php } ?> 
			</div>
		</div>
		<div class="col-md-2"></div>
		</div>
		
		
	<?php
	} else if ($b == 'user-add-package') {
		if (isset($_GET['user_id'])) {
			$user_details = get_user_row_by_id($_GET['user_id']);
			if (isset($_POST['add-package-to-user'])) {
				$amount = $MBNL->protect($_POST['amount']);
				$type = get_type_by_id($_POST['type_id']);
				$timestamp = time();
				$amount_currency = usd_to_currency($currency,$amount);
				$revenue = get_revenue_by_type_id($_POST['type_id']);
				$amount = $_POST['amount'];
				$price = $amount * $type['price'];
				$statement = $link->prepare("INSERT INTO `packages` (`type_id`, `user_id`, `amount`, `price`, `price_usd`, `txn_id`, `timestamp`, `revenue`, `is_bought_from_balance`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$statement->execute(array($_POST['type_id'], $_GET['user_id'], $amount, $price, $amount_currency, md5(time() + rand(0, 100000000)), $timestamp, $revenue, 1));
			}
		}
	?>

		<div class="row">
			<div class="col-md-3"></div>
			<div class="panel col-md-6">
				<div class="panel-heading">
					<h3 class="panel-title">Add package to <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>

					<div class="panel-body">
						<form role="addpackagetouser" class="form-horizontal" method="post" accept-charset="utf-8">
							<input type="hidden" name="add-package-to-user">

							<div class="form-group">
								<div class="row">
									<label for="type" class="col-sm-3 control-label control-label">Type</label>

									<div class="col-sm-9">
										<select name="type_id" id="type" class="form-control">
											<option value="">Select type...</option>
											<?php $types_stmt = $link->query("SELECT * FROM `types`"); ?>
											<?php while ($type = $types_stmt->fetch()) : ?>
												<option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
											<?php endwhile; ?>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<label for="amount" class="col-sm-3 control-label control-label">Amount</label>

									<div class="col-sm-9">
										<input type="number" id="amount" name="amount" class="form-control">
									</div>
								</div>
							</div>

							<?php if (isset($_POST['add-package-to-user'])) : ?>
								<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<i class="fa fa-check-circle"></i> Package added to user successfuly.
								</div>
							<?php endif; ?>

							<div class="row">
								<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" name="submit" type="submit" value="Save"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	<?php
	}
	else {
	?>
		<h3 class="page-title">Users Management</h3>
		<div class="row">
			<div class="col-md-12	">
				<!-- TABLE HOVER -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Users</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email Address</th>
									<th>Level</th>
									<th>Last Activity</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$users_per_page = 10;

								if (isset($_GET['pagination']) && $_GET['pagination'] != 1) {
									$pagination = $_GET['pagination'];
									$users_limit = " ORDER BY `id` DESC LIMIT " . ($_GET['pagination'] * $users_per_page - $users_per_page) . ", " . $users_per_page;;
								} else {
									$pagination = 1;
									$users_limit = " ORDER BY `id` DESC LIMIT " . $users_per_page;
								}

								$total_users_num = $link->query("SELECT * FROM `users`")->rowCount();
								$stmt = $link->query("SELECT * FROM `users` " . $users_limit);
							
								if($stmt->rowCount() > 0) {
									while ($row = $stmt->fetch()) {
							?>
								<tr>
									<td><?php echo $row['id']; ?></td>
									<td> <?php echo $row['first_name']." ".$row['last_name']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php if ($row['level'] == 2) { echo " <span class='label label-primary'>ADMIN</span>";} else { echo " <span class='label label-info'>USER</span>";} ?></td>
									<td><?php if($row['logged_at'] == 0) {echo "No Activity";} else {  echo timeago($row['last_activity']);} ?></td>
									<td>
										<a href="<?php echo $url; ?>admin/users/edit/<?php echo $row['id']; ?>"><span class="label label-primary"><i class="lnr lnr-pencil"></i></span></a>
										<a href="<?php echo $url; ?>admin/users/delete/<?php echo $row['id']; ?>"><span class="label label-danger"><i class="lnr lnr-trash"></i></span></a>
										<a href="<?php echo $url; ?>admin/user-add-package/<?php echo $row['id']; ?>"><span class="label label-success"><i class="fas fa-plus"></i></span></a>
									</td>
								</tr>
							<?php 
									}
								} else {
									echo $MBNL->msg("Oh snap! We couldent find users.");
								}
							?>
							</tbody>
						</table>

						<nav>
							<ul class="pagination">
								<li class="page-item">
								<a class="page-link" href="<?php echo $url; ?>admin/users/" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
								</li>

								<?php for ($i = 1; $i <= ceil((float) $total_users_num / (float) $users_per_page); $i++) : ?>
									<li class="page-item <?php echo $pagination == $i ? 'active' : ''; ?>"><a class="page-link" href="<?php echo $url; ?>admin/users/page/<?php echo $i; ?>/"><?php echo $i; ?></a></li>
								<?php endfor; ?>

								<li class="page-item">
									<a class="page-link" href="<?php echo $url; ?>/admin/users/<?php echo ceil((float) $total_users_num / (float) $users_per_page); ?>/" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- END TABLE HOVER -->
			</div>
		</div>
	<?php 
	}
?>
			</div>
