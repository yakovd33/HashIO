	<?php
	if($CUR_USER['level'] != 2){echo $MBNL->MoveTo($url); die;}
	
	if(isset($_GET['b'])){
		$b = $MBNL->protect($_GET['b']);
	} else {
		$b = "";
	}
	$recent_purchase = $link->query("SELECT * FROM `packages` ORDER by `id` DESC LIMIT 6");

	?>

		<div class="container-fluid">
		<h3 class="page-title">Recent Purchases</h3>
		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Recent Purchases</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body no-padding">
					<table class="table table-striped">
					<?php if($recent_purchase->rowCount() > 0){ ?>
						<thead>
							<tr>
								<th>Order No.</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Date &amp; Time</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php while ($row = $recent_purchase->fetch()){ ?>
							<?php $user = get_user_row_by_id($row['user_id']); ?>
							<tr>
								<td><a href="<?php echo $url; ?>transaction/<?php echo $row['txn_id']; ?>"></a></td>
								<td><?php echo $user['first_name']." ".$user['last_name']; ?></td>
								<td><?php echo $row['price_usd']; ?>$</td>
								<td><?php echo date("M", $row['timestamp']); echo " ".date("d", $row['timestamp']).", "; echo date("Y | H:i", $row['timestamp']); ?></td>
								<td><?php if($row['status'] == 100){ echo '<span class="label label-success">COMPLETED</span>'; } elseif($row['status'] == 2) { echo '<span class="label label-danger">Timeout</span>'; } else { echo '<span class="label label-info">Proccesing</span>';} ?></td>
							</tr>
						<?php } ?>
						</tbody>
					<?php } else { echo "<p>There is no transactions available.</p>"; } ?>
					</table>
				</div>
				<div class="panel-footer">
					<div class="row">

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
		</div>

			</div>
