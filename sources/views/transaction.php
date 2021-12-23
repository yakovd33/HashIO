<?php
    if (!isset($_GET['txn_id'])) {
        header("Location: /");
    } else {
        $txn_id = $_GET['txn_id'];
    }

    $package = $link->query("SELECT * FROM `packages` WHERE `txn_id` = '{$txn_id}'")->fetch();

    // Check if package exists
    if ($package) :
        // Check if package was bought by user
        if ($package['user_id'] != $_SESSION['user_id'] && $CUR_USER['level'] != 2) header("Location: /");

        if (!$package['is_bought_from_balance']) :
?>
            <div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert'>
                <span aria-hidden='true'>×</span>
                </button>
                <strong><?= $lang['transaction rule']; ?></strong>
            </div>
            
            <?php if (!$package['status'] == 100) : ?>
                <p class="text-center"><?= $lang['please transfer']; ?> <strong><?php echo $package['price'] . ' ' . get_currency_by_id($package['currency'])['name'];?></strong> <?= $lang['to']; ?> <strong><?php echo $package['address']; ?></strong> <?= $lang['to finalize your purchase']; ?></p>
                <hr>
            <?php endif; ?>

            <div class="col-md-3"></div>
            <div class="col-md-3">
            <img src="<?php echo $package['qrcode']; ?>" height="250px">
            </div>
            <div class="col-md-3" style="height: 250px; position: relative">
                <span style="position: absolute; top: 50%; transform: translateY(-50%);">
                    <?= $lang['status']; ?> : <?php if($package['status'] == 100) { echo "<span style=;color:green;;>Completed</span>"; } else { echo "<span style=;color:gray;>{$package['status_text']}</span>"; } ?>
                    <br>
                    <?= $lang['received']; ?>  : <strong><?php echo $package['recived'] != '' ? $package['recived'] : '0.000000 ' . get_currency_by_id($package['currency'])['name']; ?> <?php echo $currency; ?></strong>
                    <?php if ($package['status'] == 0) : ?>
                    <br>
                    <?= $lang['timeout']; ?>: <strong id="timer"></strong>

                    <script>
                        var countDownDate = new Date("<?php echo date("Y-m-d H:i:s", $package['timeout'] + $package['timestamp']); ?>").getTime();

                        function timer () {
                            var now = new Date().getTime();
                            var distance = countDownDate - now;
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            $("#timer").html(hours + "h " + minutes + "m " + seconds + "s");
                        }

                        var x = setInterval(timer, 1000);
                        timer();
                    </script>
                    <?php endif; ?>
                </span>
            </div>
            <div class="col-md-3"></div>
            <hr>
<?php
        else :
?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-check-circle"></i>  <?= $lang['package bought with']; ?> <?php echo $package['price']; ?> BTC (<?php echo btc_to_usd($package['price'], 2); ?>$) <?= $lang['with balance']; ?>.
            </div>
<?php
        endif;
    endif;
?>