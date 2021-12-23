<?php
	if (isset($_POST['buy'])) {
		if (!isset($_POST['type_id'])) {
			header("Location: /");
		} else {
			$type_id = $_POST['type_id'];
			$type = get_type_by_id($type_id);
            $price_per_one = $type['price'];
            $amount = $_POST['amount'];
            $price = $amount * $price_per_one;
		}
	} else {
        header("Location: /");
    }
?>

<table class="table invoice-table">
    <thead>
        <tr>
            <th style="width:70%;min-width:100px"><?= $lang['items']; ?></th>
            <th><?= $lang['quantity']; ?></th>
            <th style="min-width:200px;"><?= $lang['unit price']; ?></th>
            <th style="min-width:200px;"><?= $lang['total price']; ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div><strong><?php echo $type['name']; ?> - <?php echo $price; ?></strong></div>
            </td>
            <td>
                <?php echo $amount < 1000 ? $amount : number_format($amount / 1000, 1, '.', ''); ?> <?php echo $amount < 1000 ? $type['unit'] : $type['thousand']; ?>
            </td>
            <td><?php echo $type['price']; ?> BTC (<?php echo currency_to_usd('1',$price_per_one); ?> USD)</td>
            <td class="total"><?php echo $price; ?> BTC (<?php echo currency_to_usd('1',$price); ?> USD)</td>
        </tr>
    </tbody>
</table>

<table class="table invoice-total">
    <tbody>
        <tr>
            <td>VAT (0%): </td>
            <td>0</td>
        </tr>
        <tr>
            <td><strong><?= $lang['total']; ?> :</strong></td>
            <td><strong class="subtotal"><?php //echo number_format($price, 2, ',', ''); ?> <?php echo $price; ?> BTC (<?php echo currency_to_usd('1',$price); ?> USD)</strong></td>
        </tr>
    </tbody>
</table>

<div class="col-xs-12">
    <div class="row">
        <div class="col-lg-5 col-lg-push-7">
            <button id="btn-proceed" class="btn btn-success btn-block m-b-sm" data-toggle="modal" data-target="#myModal">
            <?= $lang['select payment method']; ?> </button>
            <button id="btn-update" class="btn btn-warning btn-block m-b-sm" style="display:none; margin-top: 0;">
            <?= $lang['update']; ?> </button>
            </div>
            <div class="col-lg-7 col-lg-pull-5">
            <div class="row">
            <div class="col-lg-4 col-lg-push-4">
            </div>
            <div class="col-lg-4 col-lg-pull-4">
            <a class="btn btn-white btn-block m-b-sm" href="<?php echo $url; ?>">
            <?= $lang['cancel']; ?> </a>
            </div>
            </div>
        </div>
    </div>
</div>

<div id="modals"></div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $lang['choose currency']; ?></h4> </div>
            <div class="modal-body text-center">
                <div id="buy-choose-currency-feedback"></div>
                <button onclick="generate_payment('balance', '<?php echo $price; ?>','<?php echo $type_id ?>','<?php echo $amount < 1000 ? $amount : number_format($amount / 1000, 1, '.', ''); ?>');" class="btn btn-default">
                    <?= $lang['balance']; ?>
                </button>

                <?php
                    $stmt = $link->query("SELECT id,name FROM currencies");
                    if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){		?>
                            <button onclick="generate_payment('<?php echo $row['name']; ?>','<?php echo $price; ?>','<?php echo $type_id ?>','<?php echo $amount < 1000 ? $amount : number_format($amount / 1000, 1, '.', ''); ?>');" class="btn btn-default">
                                <?php echo $row['name']; ?>
                            </button>
                    <?php }} else { echo "<p>No currency found</p>";} ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= $lang['close']; ?></button>
            </div>
        </div>
    </div>
</div>