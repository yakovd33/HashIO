				<?php 
				$recent_purchase = $link->query("SELECT * FROM `packages` ORDER by `id` DESC LIMIT 6");

				?>
				<div class="container-fluid">
					<!-- OVERVIEW -->
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php echo $link->query("SELECT * FROM `users`")->rowCount(); ?></span>
											<span class="title">Users</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?php echo $link->query("SELECT * FROM `packages` WHERE status = 100")->rowCount(); ?></span>
											<span class="title">Purchases Packages</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="far fa-money-bill-alt"></i></span>
										<p style="display: flex; flex-direction: column;">
											<span class="number"><?php echo number_format(get_total_balance(), 3); ?>$</span>
											<span class="title">Total balance</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fas fa-percent"></i></span>
										<p>
											<span class="number"><?php echo CalculateBuyPrecents(); ?>%</span>
											<span class="title">Conversions</span>
										</p>
									</div>
								</div>
							</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-7">
							<!-- RECENT PURCHASES -->
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
												<td><a href="<?php echo $url; ?>transaction/<?php echo $row['txn_id']; ?>">78<?php echo $row['id']; ?></a></td>
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
										<div class="col-md-6"><span class="panel-note"></span></div>
										<div class="col-md-6 text-right"><a href="<?php echo $url; ?>admin/purchases" class="btn btn-primary">View All Purchases</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
						<div class="col-md-5">
							<!-- TIMELINE -->
							<div class="panel panel-scrolling">
								<div class="panel-heading">
									<h3 class="panel-title">Recent User Activity</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled activity-list">
									<?php 
									$stmt = $link->query("SELECT * FROM `activity` ORDER by id DESC LIMIT 10");
									if($stmt->rowCount() > 0) {
										while($row = $stmt->fetch()){
											$user = get_user_row_by_id($row['uid']);
									?>
										<li>
											<p><a href="#"><?php echo $user['first_name']." ".$user['last_name']; ?></a> has <?php echo showActivity($row['type']); ?> <span class="timestamp"><?php echo timeago($row['timestamp']); ?></span></p>
										</li>
									<?php 
										}
									}
									?>
									</ul>
								</div>
							</div>
							<!-- END TIMELINE -->
						</div>
					</div>
				</div>
		<style>
		ul.activity-list li p {
			padding-left: 1.5em;
		}
		</style>