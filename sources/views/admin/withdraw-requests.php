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
	} 
	else {
	?>
		<h3 class="page-title">Withdraw Requests</h3>
		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Requests</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Currency</th>
								<th>Amount($)</th>
								<th>Address</th>
								<th>Timestamp</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$stmt = $link->query("SELECT * FROM `withdraw_requests` WHERE approved = 0 ORDER by id DESC");
							if($stmt->rowCount() > 0) {
								$i = 1;
								while ($row = $stmt->fetch()) {
									$user = get_user_row_by_id($_SESSION['user_id']);
						?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td> <?php echo $user['first_name']." ".$user['last_name']; ?></td>
								<td><?php echo $row['currency']; ?></td>
								<td><?php echo $row['amount']; ?>$</td>
								<td><?php echo $user[$row['currency']];  ?></td>
								<td><?php echo date('Y-m-d H:i:s',$row['timestamp']); ?></td>
								<td> <a href="<?php echo $url; ?>admin/users/edit/<?php echo $row['id']; ?>"><span class="label label-success"><i class="lnr lnr-checkmark-circle"></i></span></a>   <a href="<?php echo $url; ?>admin/users/delete/<?php echo $row['id']; ?>"><span class="label label-danger"><i class="lnr lnr-trash"></i></span></a></td>
							</tr>
						<?php 
								}
							} else {
								echo $MBNL->msg("Oh snap! We couldent find a peding requests.");
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END TABLE HOVER -->
		</div>
		<div class="col-md-1"></div>
		</div>
	<?php 
	}
?>
			</div>
