<div class="container-fluid">
	<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $lang['withdraw']; ?></h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body">
				<div class="response"></div>
				<form role="withdraw" class="form-horizontal" method="post" accept-charset="utf-8">
				<h3 class="text-center"><?= $lang['withdraw']; ?> <?= $lang['request']; ?></h3>
					<div class="form-group">
					<label for="UserWallet" class="col-sm-3 control-label control-label"><?= $lang['amount']; ?></label>
					
						<div class="col-sm-9">
						<div class="btc_response" style="text-align:left;"></div>
							<input name="amount" class="form-control" maxlength="64" placeholder="0.00$" type="text" id="UserWallet" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							<br>
							<input type="hidden" name="currency" value="">
							<label class="fancy-radio">
							<input name="currency" value="btc" type="radio">
							<span><i></i>BTC</span>
							</label>
							<label class="fancy-radio">
							<input name="currency" value="eth" type="radio">
							<span><i></i>ETH</span>
							</label>
							<label class="fancy-radio">
							<input name="currency" value="dash" type="radio">
							<span><i></i>DASH</span>
							</label>
							<label class="fancy-radio">
							<input name="currency" value="zec" type="radio">
							<span><i></i>ZEC</span>
							</label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-3">
							<input class="btn btn-primary" type="submit" value="<?= $lang['request']; ?>">
						</div>
					</div>
				</form>
				
				
				</div>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>