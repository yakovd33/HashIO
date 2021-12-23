<?php
    //print_r($_GET);
    $packages_per_page = 10;
    $packages_limit = " ORDER BY `id` DESC";

    $withdrawls_per_page = 5;
    $withdrawls_limit = " ORDER BY `id` DESC";

    $activities_per_page = 10;
    $activities_limit = " ORDER BY `id` DESC";

    if (isset($_GET['pagination'], $_GET['panel'])) {
        $page = $_GET['pagination'];

        if ($_GET['panel'] == 'packages') {
            $_GET['packages'] = 'packages';
            $packages_limit .= " LIMIT " . ($_GET['pagination'] * $packages_per_page - $packages_per_page) . ", " . $packages_per_page;
        } else {
            $packages_limit .= " LIMIT " . $packages_per_page;
        }

        if ($_GET['panel'] == 'withdrawls') {
            $withdrawls_limit .= " LIMIT " . ($_GET['pagination'] * $withdrawls_per_page - $withdrawls_per_page) . ", " . $withdrawls_per_page;
        } else {
            $withdrawls_limit .= " LIMIT " . $withdrawls_per_page;
        }

        if ($_GET['panel'] == 'log') {
            $activities_limit .= " LIMIT " . ($_GET['pagination'] * $activities_per_page - $activities_per_page) . ", " . $activities_per_page;
        } else {
            $activities_limit .= " LIMIT " . $activities_per_page;
        }
    } else {
        $page = 1;
        $packages_limit .= " LIMIT " . $packages_per_page;
        $withdrawls_limit .= " LIMIT " . $withdrawls_per_page;
        $activities_limit .= " LIMIT " . $activities_per_page;

        $_GET['packages'] = 'packages';
        $_GET['panel'] = 'packages';
    }


    $packages_history_stmt = $link->query("SELECT * FROM `packages` WHERE `user_id` = {$_SESSION['user_id']}" . $packages_limit); 
    $withdrawls_history_stmt = $link->query("SELECT * FROM `withdraw_requests` WHERE `uid` = {$_SESSION['user_id']}" . $withdrawls_limit);
    $activities_history_stmt = $link->query("SELECT * FROM `activity` WHERE `uid` = {$_SESSION['user_id']}" . $activities_limit);

    $user_total_packages_num = $link->query("SELECT * FROM `packages` WHERE `user_id` = {$_SESSION['user_id']}")->rowCount();
    $user_total_withdrawls_num = $link->query("SELECT * FROM `withdraw_requests` WHERE `uid` = {$_SESSION['user_id']}")->rowCount();
    $user_total_activities = $link->query("SELECT * FROM `activity` WHERE `uid` = {$_SESSION['user_id']}")->rowCount();
?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang['packages']; ?></h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
	    <?php if($packages_history_stmt->rowCount() > 0) { ?>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th><?= $lang['product']; ?></th>
                    <th><?= $lang['quantity']; ?></th>
                    <th><?= $lang['total']; ?></th>
                    <th><?= $lang['method']; ?></th>
                    <th><?= $lang['time']; ?></th>
                    <th><?= $lang['status']; ?></th>
                    <th><?= $lang['transaction']; ?></th>
                </thead>

                <tbody>
                        <?php while ($package = $packages_history_stmt->fetch()) : ?>
                            <?php $type = get_type_by_id($package['type_id']); ?>
                            <tr>
                                <td>78<?php echo $package['id']; ?></td>
                                <td><?php echo $type['name']; ?></td>
                                <td><?php echo $package['amount']; ?> <?php echo $type['unit']; ?></td>
                                <td><?php echo $package['price_usd']; ?> USD (<?php echo $package['price']; ?> BTC)	</td>
                                <td><?php echo $package['is_bought_from_balance'] ? 'Balance' : get_currency_by_id($package['currency'])['name'] . ' Transfer'; ?></td>
                                <td><?php echo date("d-m-Y H:i", $package['timestamp']); ?></td>
                                <td><?php if($package['status'] == 100) {echo "<span style=;color:green;;>Completed</span>";} elseif($package['status'] == 2){ echo "<span style=;color:red;;>Expired</span>"; } else { echo "<span style=;color:gray;>{$package['status_text']}</span>"; } ?></td>
                                <td><a href="<?php echo $url; ?>transaction/<?php echo $package['txn_id']; ?>"> <?= $lang['view transaction']; ?></a></td>
                            </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="<?php echo $url; ?>history/" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only"><?= $lang['previous']; ?></span>
                    </a>
                    </li>

                    <?php for ($i = 1; $i <= ceil((float) $user_total_packages_num / (float) $packages_per_page); $i++) : ?>
                        <li class="page-item <?php echo $page == $i && $_GET['packages'] == 'log' ? 'active' : ''; ?>"><a class="page-link" href="<?php echo $url; ?>history/packages/<?php echo $i; ?>/"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="<?php echo $url; ?>history/packages/<?php echo ceil((float) $user_total_packages_num / (float) $packages_per_page); ?>/" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only"><?= $lang['next']; ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
		<?php } else { echo $MBNL->msg("Oh Snap!, you dont have any purchases."); } ?>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang['withdrawals']; ?></h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
	    <?php if($withdrawls_history_stmt->rowCount() > 0) { ?>
            <table class="table">
                <thead>
                    <th><?= $lang['amount']; ?></th>
                    <th><?= $lang['currency']; ?></th>
                    <th><?= $lang['is approved']; ?></th>
                    <th><?= $lang['time']; ?></th>
                </thead>

                <tbody>
                        <?php while ($withdrawl = $withdrawls_history_stmt->fetch()) : ?>
                            <tr>
                                <td><?php echo $withdrawl['amount']; ?>$</td>
                                <td><?php echo $withdrawl['currency']; ?></td>
                                <td><?php echo $withdrawl['approved'] ? '<span class="label label-success">Approved</span>' : '<span class="label label-danger">Not Approved</span>'; ?></td>
                                <td><?php echo gmdate("Y-m-d H:i:s", $withdrawl['timestamp']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="<?php echo $url; ?>history/" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only"><?= $lang['previous']; ?></span>
                    </a>
                    </li>

                    <?php for ($i = 1; $i <= ceil((float) $user_total_withdrawls_num / (float) $withdrawls_per_page); $i++) : ?>
                        <li class="page-item <?php echo $page == $i && $_GET['panel'] == 'withdrawls' ? 'active' : ''; ?>"><a class="page-link" href="<?php echo $url; ?>history/withdrawls/<?php echo $i; ?>/"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="<?php echo $url; ?>history/withdrawls/<?php echo ceil((float) $user_total_withdrawls_num / (float) $withdrawls_per_page); ?>/" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only"><?= $lang['next']; ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
		<?php } else { echo $MBNL->msg("Oh Snap!, you dont have withdrawal requests"); } ?>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang['log']; ?></h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
	    <?php if($activities_history_stmt->rowCount() > 0) { ?>
            <table class="table">
                <thead>
                    <th><?= $lang['description']; ?></th>
                    <th><?= $lang['time']; ?></th>
                </thead>

                <tbody>
                        <?php while ($activity = $activities_history_stmt->fetch()) : ?>
                            <tr>
                                <td>
                                    <p><a href="#"><?php echo $CUR_USER['first_name'] ." ". $CUR_USER['last_name']; ?></a> has <?php echo showActivity($activity['type']); ?></p>
                                </td>
                                <td>
                                    <span class="timestamp"><?php echo timeago($activity['timestamp']); ?></span>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="<?php echo $url; ?>history/" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only"><?= $lang['previous']; ?></span>
                    </a>
                    </li>

                    <?php for ($i = 1; $i <= ceil((float) $user_total_activities / (float) $activities_per_page); $i++) : ?>
                        <li class="page-item <?php echo $page == $i && $_GET['panel'] == 'log' ? 'active' : ''; ?>"><a class="page-link" href="<?php echo $url; ?>history/log/<?php echo $i; ?>/"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="<?php echo $url; ?>history/log/<?php echo ceil((float) $user_total_activities / (float) $activities_per_page); ?>/" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only"><?= $lang['next']; ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
		<?php } else { echo $MBNL->msg("Oh Snap!, you dont have withdrawal requests"); } ?>
    </div>
</div>