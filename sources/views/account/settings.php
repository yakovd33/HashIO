
<div class="container-fluid">
	<div class="wrapper wrapper-content">
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-6">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><?= $lang['profile']; ?></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
					<div class="form-horizontal">
						<div class="form-group required">
							<label for="UserEmail" class="col-sm-3 control-label control-label"><?= $lang['email']; ?></label>
							<div class="col-sm-9">
								<input name="data[User][email]" class="form-control disabled" disabled="disabled" maxlength="150" type="email" value="<?php echo $CUR_USER['email']; ?>" id="UserEmail" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;);"><span class="help-block m-b-none text-warning">If you want to change your email, please contact support</span>
							</div>
						</div>
						<div class="form-group" style="display:none;">
							<label class="col-sm-3 control-label"><?= $lang['avatar']; ?></label>
							<div class="col-sm-9">
							</div>
						</div>
					</div>
					<hr>
					<form role="editBTC" class="form-horizontal" id="user_btc_wallet" method="post" accept-charset="utf-8">
						<div class="form-group">
						<label for="UserWallet" class="col-sm-3 control-label control-label">BTC <?= $lang['wallet']; ?></label>
						
							<div class="col-sm-9">
							<div class="btc_response" style="text-align:left;"></div>
								<input name="btc_address" class="form-control" maxlength="64" value="<?php echo $CUR_USER['btc']; ?>" type="text" id="UserWallet" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								<span class="help-block m-b-none text-warning"><?= $lang['make sure btc']; ?></span>
								<br>
								<span class="help-block m-b-none text-info"><a target="_blank" href="https://hashflare.zendesk.com/hc/en-us/articles/206691629-How-to-create-a-Bitcoin-wallet">How to create a Bitcoin wallet?</a></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-3">
								<input class="btn btn-primary" type="submit" value="Save">
							</div>
						</div>
					</form>
					<hr>
					
					<form role="editETH" class="form-horizontal" id="user_eth_wallet" method="post" accept-charset="utf-8">
						<div class="form-group">
						<label for="UserEthWallet" class="col-sm-3 control-label control-label">ETH <?= $lang['wallet']; ?></label>
						<div class="col-sm-9">
						<div class="eth_response" style="text-align:left;"></div>
							<input name="eth_wallet" class="form-control" value="<?php echo $CUR_USER['eth']; ?>" maxlength="64" type="text" id="UserEthWallet" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
							<span class="help-block m-b-none text-warning"><?= $lang['make sure eth']; ?></span>
							<br>
							<span class="help-block m-b-none text-info">
							<a target="_blank" href="https://hashflare.zendesk.com/hc/en-us/articles/207923705-How-to-create-an-Ethereum-wallet">How to create an Ethereum wallet?</a></span>
						</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
						</div>
					</form>
					<hr>
					
					<form role="editDASH" class="form-horizontal" id="user_eth_wallet" method="post" accept-charset="utf-8">
						<div class="form-group">
						<label for="UserEthWallet" class="col-sm-3 control-label control-label">DASH <?= $lang['wallet']; ?></label>
						<div class="col-sm-9">
						<div class="dash_response" style="text-align:left;"></div>
							<input name="dash_wallet" class="form-control" value="<?php echo $CUR_USER['dash']; ?>" maxlength="64" type="text" id="UserEthWallet" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
							<span class="help-block m-b-none text-warning"><?= $lang['make sure dash']; ?></span>
							<br>
							<span class="help-block m-b-none text-info">
							<a target="_blank" href="https://hashflare.zendesk.com/hc/en-us/articles/207923705-How-to-create-an-Ethereum-wallet">How to create an DASH wallet?</a></span>
						</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
						</div>
					</form>
					<hr>

					<form role="editZEC" class="form-horizontal" id="user_eth_wallet" method="post" accept-charset="utf-8">
						<div class="form-group">
						<label for="UserEthWallet" class="col-sm-3 control-label control-label">ZEC <?= $lang['wallet']; ?></label>
						<div class="col-sm-9">
						<div class="zec_response" style="text-align:left;"></div>
							<input name="zec_wallet" class="form-control" maxlength="64" value="<?php echo $CUR_USER['zec']; ?>" type="text" id="UserEthWallet" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
							<span class="help-block m-b-none text-warning"><?= $lang['make sure zec']; ?></span>
							<br>
							<span class="help-block m-b-none text-info">
							<a target="_blank" href="https://hashflare.zendesk.com/hc/en-us/articles/207923705-How-to-create-an-Ethereum-wallet">How to create an ZCash wallet?</a></span>
						</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
						</div>
					</form>
					
					</div>
				</div>
			</div>
			<div class="col-lg-6">
			<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><?= $lang['contact details']; ?></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
					<div class="contact_response" style="text-align:left;"></div>
						<form role="editContact" class="form-horizontal" id="user_profile" method="post" accept-charset="utf-8">
							<div class="form-group"><label for="UserFirstName" class="col-sm-3 control-label control-label"><?= $lang['first name']; ?></label>
							<div class="col-sm-9">
								<input name="first_name" class="form-control" value="<?php echo $CUR_USER['first_name']; ?>" maxlength="40" type="text" id="UserFirstName" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
							</div>
							<div class="form-group"><label for="UserLastName" class="col-sm-3 control-label control-label"><?= $lang['last name']; ?></label>
							<div class="col-sm-9">
								<input name="last_name" value="<?php echo $CUR_USER['last_name']; ?>" class="form-control" maxlength="40" type="text" id="UserLastName" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
							</div>
							<div class="form-group"><label for="UserContactCompanyName" class="col-sm-3 control-label control-label"><?= $lang['company']; ?></label>
							<div class="col-sm-9">
								<input name="company" value="<?php echo $CUR_USER['company']; ?>" class="form-control" maxlength="255" type="text" id="UserContactCompanyName" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
							</div>
							<div class="form-group"><label for="UserContactReg" class="col-sm-3 control-label control-label"><?= $lang['company code']; ?></label>
								<div class="col-sm-9">
								<input name="company_code" value="<?php echo $CUR_USER['company_code']; ?>" class="form-control" maxlength="15" type="text" id="UserContactReg" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							<div class="form-group"><label for="UserContactVat" class="col-sm-3 control-label control-label">VAT Code</label>
								<div class="col-sm-9">
									<div class="input-group"><span class="input-group-addon"><?php echo $CUR_USER['country']; ?></span>
									<input name="VAT" value="<?php echo $CUR_USER['VAT']; ?>" class="form-control" maxlength="50" type="text" id="UserContactVat" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
								</div>
							</div>
							<div class="form-group">
							<label for="UserContactVat" class="col-sm-3 control-label control-label"><?= $lang['phone number']; ?></label>
							<div class="col-sm-2">
								<div class="input-group">
									<input name="phone_extension" <?php if(empty($CUR_USER['phone_extension'])){echo "placeholder='Ext'";} else { echo "value='".$CUR_USER['phone_extension']."'"; } ?> class="form-control" maxlength="50" type="text" id="UserContactVat" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							<div class="col-sm-7">
								<div class="input-group">
									<input name="phone_number" value="<?php echo $CUR_USER['phone_number']; ?>" class="form-control" maxlength="50" type="text" id="UserContactVat" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							</div>
							<div class="form-group"><label for="UserContactAddress1" class="col-sm-3 control-label control-label"><?= $lang['address']; ?> 1</label>
								<div class="col-sm-9">
									<input name="address" value="<?php echo $CUR_USER['address']; ?>" class="form-control" maxlength="255" type="text" id="UserContactAddress1" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							<div class="form-group"><label for="UserContactAddress2" class="col-sm-3 control-label control-label"><?= $lang['address']; ?> 2</label>
								<div class="col-sm-9">
									<input name="address2" value="<?php echo $CUR_USER['address2']; ?>" class="form-control" maxlength="255" type="text" id="UserContactAddress2" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							<div class="form-group"><label for="UserContactCity" class="col-sm-3 control-label control-label"><?= $lang['city']; ?></label>
								<div class="col-sm-9">
									<input name="city" value="<?php echo $CUR_USER['city']; ?>" class="form-control" maxlength="50" type="text" id="UserContactCity" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							<div class="form-group"><label for="UserContactRegion" class="col-sm-3 control-label control-label"><?= $lang['region']; ?></label>
								<div class="col-sm-9">
									<input name="region" value="<?php echo $CUR_USER['region']; ?>" class="form-control" maxlength="50" type="text" id="UserContactRegion" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
								</div>
							</div>
							<div class="form-group">
							<label for="UserContactCountryId" class="col-sm-3 control-label control-label"><?= $lang['country']; ?></label>
							<div class="col-sm-9">
									<select name="country" class="form-control" id="sel1">
									<option value="<?php echo $CUR_USER['country']; ?>"><?php echo $countries[$CUR_USER['country']]; ?></option>
									<?php

										foreach($countries as $key => $value) {

										?>
										<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
										<?php

										}

									?>
									</select>
							</div>
							</div>
							<div class="form-group"><label for="UserContactPostCode" class="col-sm-3 control-label control-label"><?= $lang['postal code']; ?></label>
								<div class="col-sm-9">
								<input name="post_code" value="<?php echo $CUR_USER['post_code']; ?>" class="form-control" maxlength="10" type="text" id="UserContactPostCode" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-3"><input class="btn btn-primary" type="submit" value="Save"></div>
							</div>
						</form>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><?= $lang['change password']; ?></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
					<div class="cpass_response" style="text-align:left;"></div>
					<form  class="form-horizontal" id="user_password" method="post" role="ChangePassword" accept-charset="utf-8" _lpchecked="1">
						<div class="form-group">
						<label for="UserPasswordUpdate" class="col-sm-3 control-label control-label"><?= $lang['password']; ?></label>
						<div class="col-sm-9">
							<input name="password" class="form-control" type="password" id="UserPasswordUpdate">
						</div>
						</div>
						<div class="form-group required">
						<label for="UserPasswordConfirmUpdate" class="col-sm-3 control-label control-label"><?= $lang['repeat']; ?></label>
							<div class="col-sm-9">
								<input name="rpassword" class="form-control" type="password" id="UserPasswordConfirmUpdate" required="required">
							</div>
						</div>
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
	</div>
</div>