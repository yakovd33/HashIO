<?php 
	if($CUR_USER['level'] != 2){echo $MBNL->MoveTo($url); die;}
	if (isset($_POST['types'])) {
		foreach ($_POST['types'] as $name => $revenue) {
			$link->query("UPDATE `types` SET `revenue` = {$revenue} WHERE `name` = '{$name}'");
		}
	}
	
	$settings_query = $link->query("SELECT * FROM `settings`");
	$revenue_query = $link->query("SELECT * FROM `types`");
	$price_query = $link->query("SELECT * FROM `types`");
	$currencies_query = $link->query("SELECT * FROM `currencies`");
?>

<div class="container-fluid">
	
	<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Site Prefences</h3>
				<div class="right">
					<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
					<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
				</div>
			</div>
			<div class="panel-body">
			<div class="settings_response" style="text-align:left;"></div>
				<form role="editSettings" class="form-horizontal" id="user_profile" method="post" accept-charset="utf-8">
				<?php if($settings_query->rowCount() > 0){ ?>
				<?php while($row = $settings_query->fetch()){ ?>
					<div class="form-group"><label for="UserFirstName" class="col-sm-3 control-label control-label"><?php echo $row['description']; ?></label>
					<div class="col-sm-9">
						<input name="<?php echo $row['name']; ?>" class="form-control" value="<?php echo $row['value']; ?>" maxlength="40" type="text" id="UserFirstName" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
					</div>
					</div>
				<?php  } ?>
				<?php  } ?>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
					</div>
				</form>
				
				<hr>
				<div class="panel-heading"><h3 class="panel-title">Price & Daily Revenue (BTC)</h3></div>
				<form role="editRevenue" class="form-horizontal" id="user_profile" method="post" accept-charset="utf-8">
				<div class="revenue_response" style="text-align:left;"></div>
				<?php if($revenue_query->rowCount() > 0){ ?>
				<div class="form-group" style=" text-align: center; ">
					<div class="col-sm-3"></div>
					<div class="col-sm-3">
					<p>Price  (1 hashrate)<p>
					</div>
					<div class="col-sm-3">
					<p >Revenue</p>
					</div>
				</div>
				<?php while($row = $revenue_query->fetch()){ ?>
				<div class="form-group">
					<label for="UserFirstName" class="col-sm-3 control-label control-label"><?php echo $row['name']; ?></label>
						<div class="col-sm-4">
							<input name="<?php echo $row['name']; ?>-Price" class="form-control" value="<?php echo $row['price']; ?>" maxlength="40" type="text" id="UserFirstName" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>
						<div class="col-sm-4">
							<input name="<?php echo $row['name']; ?>-Revenue" class="form-control" value="<?php echo $row['revenue']; ?>" maxlength="40" type="text" id="UserFirstName" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>

				</div>
				<?php  } ?>
				<?php  } ?>

				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
				</div>
				</form>
				<hr>
				<div class="panel-heading"><h3 class="panel-title">Reciver wallet addresses</h3></div>
				<form role="editWallet" class="form-horizontal" id="user_profile" method="post" accept-charset="utf-8">
				<div class="wallet_response" style="text-align:left;"></div>
				<?php if($revenue_query->rowCount() > 0){ ?>
				<div class="form-group" style=" text-align: center; ">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
					<p>Price (per 1)</p>
					</div>
					<div class="col-sm-4">
					<p>Address (Coinpayments wallet)</p>
					</div>
				</div>
				<?php while($row = $currencies_query->fetch()){ ?>
				<div class="form-group">
					<label for="UserFirstName" class="col-sm-3 control-label control-label"><?php echo $row['name']; ?></label>
						<div class="col-sm-2" style="text-align:center;">
							<p><?php echo $row['price']; ?>$</p>
						</div>
						<div class="col-sm-4">
							<input name="<?php echo $row['name']; ?>" class="form-control" value="<?php echo $row['address']; ?>" maxlength="64" type="text" id="UserFirstName" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>

				</div>
				<?php  } ?>
				<?php  } ?>

				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
				</div>
				</form>
				
			</div>
			</div>
		</div>
		</div>
		</div>
</div>