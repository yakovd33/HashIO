<link rel="stylesheet" href="<?php echo $url; ?>assets/css/index.css">
<script src="<?php echo $url; ?>assets/scripts/wNumb.js"></script>
<script src="<?php echo $url; ?>assets/scripts/nouislider.min.js"></script>
<link rel="stylesheet" href="<?php echo $url; ?>assets/css/nouislider.min.css">
<script src="<?php echo $url; ?>assets/flot/jquery.flot.js"></script>
<script src="<?php echo $url; ?>assets/flot/jquery.flot.time.js"></script>

<style>
    .noUi-pips,.noUi-pips *{-moz-box-sizing:border-box;box-sizing:border-box}.noUi-pips{position:absolute;font:400 12px Arial;color:#999}.noUi-value{width:40px;position:absolute;text-align:center}.noUi-value-sub{color:#ccc;font-size:10px}.noUi-marker{position:absolute;background:#CCC}.noUi-marker-large,.noUi-marker-sub{background:#AAA}.noUi-pips-horizontal{padding:10px 0;height:50px;top:100%;left:0;width:100%}.noUi-value-horizontal{margin-left:-20px;padding-top:20px}.noUi-value-horizontal.noUi-value-sub{padding-top:15px}.noUi-marker-horizontal.noUi-marker{margin-left:-1px;width:2px;height:5px}.noUi-marker-horizontal.noUi-marker-sub{height:10px}.noUi-marker-horizontal.noUi-marker-large{height:15px}.noUi-pips-vertical{padding:0 10px;height:100%;top:0;left:100%}.noUi-value-vertical{width:15px;margin-left:20px;margin-top:-5px}.noUi-marker-vertical.noUi-marker{width:5px;height:2px;margin-top:-1px}.noUi-marker-vertical.noUi-marker-sub{width:10px}.noUi-marker-vertical.noUi-marker-large{width:15px}
</style>

<div class="container-fluid">
	<div class="row">
		<?php if(empty($CUR_USER['btc'])){ echo $MBNL->msg("To successfully withdraw funds you may want to add a BTC wallet address to <a href='{$url}settings'>your profile</a>");} ?>
	</div>
<?php

$stmt = $link->query("SELECT * FROM `types`");
	if($stmt->rowCount() > 0) :
		while ($row = $stmt->fetch()) :
			$type_currency = get_currency_by_id($row['revenue_currency']);
?>
			
			<div class="panel" style="<?php if ($row['name'] == 'Scrypt') { echo 'display: none'; } ?>">
				<div class="panel-heading" style="border-bottom: 1px solid #ebebeb;">
					<h3 class="panel-title"><?php echo $type_currency['name']; ?> <?= $lang['balance']; ?></h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse" onclick="$(this).unbind('click').parent().parent().parent().find('.panel-body').toggle('fast')"><i class="lnr lnr-chevron-down"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>

				<div class="panel-body" style="/*display: none;*/">
					<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
					<ul class="stat-list">
						<li>
							<h2 class="m-l-md m-b-none" style="font-weight:400;"><?php echo get_user_currency_balance($_SESSION['user_id'], $type_currency['id']); ?> <?php echo $type_currency['name']; ?></h2>
							<small class="m-l-md"><?= $lang['balance']; ?></small>
						</li>
						<li><hr></li>
						<?php if (get_user_last_type_payout($_SESSION['user_id'], $type_currency['id'])) : ?>
							<li>
								<h3 class="m-l-md m-b-none" style="font-weight:400;"><?php echo get_user_last_type_payout($_SESSION['user_id'], $type_currency['id'])->fetch()['amount']; ?> <?php echo $type_currency['name']; ?></h3>
								<small class="m-l-md"><?= $lang['last']; ?> SHA-256 <?= $lang['payout']; ?></small>
							</li>
						<?php endif; ?>
						<li>
							<h3 class="m-l-md m-b-none" style="font-weight:400;">0 BTC</h3>
							<small class="m-l-md"><?= $lang['last']; ?> Scrypt <?= $lang['payout']; ?></small>
						</li>
					</ul>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-9 hidden-xxs">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-<?php echo strtolower($type_currency['name']) ?>-balance" style="min-width: 320px; height: 100%; min-height: 200px; margin-top: 20px;">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<script>
				//var <?php //echo strtolower($type_currency['name']); ?>_payouts = [[1521417600000,0.00000695], [1521504000000,0.00000667], [1521590400000,0.00000631], [1521676800000,0.00000598], [1521763200000,0.00000631], [1521849600000,0.00000661], [1521936000000,0.00000652], [1522022400000,0.00000679], [1522108800000,0.0000059], [1522195200000,0.00000649], [1522281600000,0.00000606], [1522368000000,0.00000628], [1522454400000,0.00000628], [1522540800000,0.00000607]];
				//var <?php //echo strtolower($type_currency['name']); ?>_balances = [[1521417600000, 0.00007779], [1521504000000, 0.00008079], [1521590400000, 0.0000836], [1521676800000, 0.00008611], [1521763200000, 0.00008869], [1521849600000, 0.00009176], [1521936000000, 0.00009461], [1522022400000, 0.00009768], [1522108800000, 0.00009961], [1522195200000, 0.00010208], [1522281600000, 0.00010416], [1522368000000, 0.00010586], [1522454400000, 0.00010768], [1522540800000, 0.00010926]];
				//var <?php //echo strtolower($type_currency['name']); ?>_payouts = [[1521417600000, 0], [1521504000000, 0], [1521590400000,0.00000631], [1521676800000,0.00000598], [1521763200000,0.00000631], [1521849600000,0.00000661], [1521936000000,0.00000652], [1522022400000,0.00000679], [1522108800000,0.0000059], [1522195200000,0.00000649], [1522281600000,0.00000606], [1522368000000,0.00000628], [1522454400000,0.00000628], [1522540800000,0.00000607]];

				var <?php echo strtolower($type_currency['name']); ?>_balances = [
					<?php for ($i = -14; $i <= 0; $i++) : ?>
						[<?php echo strtotime($i . " day GMT midnight"); ?>000, <?php echo get_user_currency_balance_by_date($_SESSION['user_id'], $type_currency['id'], date('Y-m-d', strtotime($i . " day GMT midnight"))); ?>], 
					<?php endfor; ?>
				];

				var <?php echo strtolower($type_currency['name']); ?>_payouts = [
					<?php for ($i = -14; $i <= 0; $i++) : ?>
						[<?php echo strtotime($i . " day GMT midnight"); ?>000, <?php echo get_user_currency_payout_by_date($_SESSION['user_id'], $type_currency['id'], date('Y-m-d', strtotime($i . " day GMT midnight"))); ?>], 
					<?php endfor; ?>
				];


				var balanceoptions = {
					xaxis: {
						mode: "time",
						tickSize: [1, "day"],
						tickLength: 0,
						axisLabel: "Date",
						axisLabelUseCanvas: true,
						axisLabelFontSizePixels: 12,
						axisLabelFontFamily: "Arial",
						axisLabelPadding: 10,
						color: "#d5d5d5",
						timeformat: "%d.%m"
					},
					yaxes: [
						{
							position: "left",
							//max: 1070,
							color: "#f5f5f5",
							axisLabelUseCanvas: true,
							axisLabelFontSizePixels: 12,
							axisLabelFontFamily: "Arial",
							axisLabelPadding: 3
						},
						{
							position: "right",
							color: "#f5f5f5",
							axisLabelUseCanvas: true,
							axisLabelFontSizePixels: 12,
							axisLabelFontFamily: "Arial",
							axisLabelPadding: 67
						}
					],
					legend: false,
					grid: {
						hoverable: true,
						borderWidth: 0
					},
					tooltip: true,
					tooltipOpts: {
						content: tooltipper,
						xDateFormat: "%d.%m.%y"
					}
				};
				var pooloptions = {
					series: {
						pie: {
							show: true,
							//radius: 1/2,
							radius: 1,
							label: {
								show: false,
								radius: 1,
								formatter: labelFormatter,
								threshold: 0.1
							},
							stroke: {
								width: 2
							},
							shadow: {
								top: 5
							}
						}
					},
					legend: {
						show: true
					},
					grid: {
						hoverable: true
					},
					tooltip: true,
					tooltipOpts: {
						content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
						shifts: {
							x: 20,
							y: 0
						},
						defaultTheme: true
					}
				};
				var profitoptions = {
					xaxis: {
						mode: "time",
						tickSize: [1, "day"],
						tickLength: 0,
						axisLabel: "Date",
						axisLabelUseCanvas: true,
						axisLabelFontSizePixels: 12,
						axisLabelFontFamily: "Arial",
						axisLabelPadding: 10,
						color: "#d5d5d5",
						timeformat: "%d.%m"
					},
					yaxes: [
						{
							position: "left",
							color: "#f5f5f5",
							axisLabelUseCanvas: true,
							axisLabelFontSizePixels: 12,
							axisLabelFontFamily: "Arial",
							axisLabelPadding: 3
						}
					],
					legend: false,
					grid: {
						hoverable: true,
						borderWidth: 0
					},
					tooltip: true,
					tooltipOpts: {
						content: tooltipper,
						xDateFormat: "%d.%m.%y"
					}
				};

				var <?php echo strtolower($type_currency['name']); ?>_balancedata = [{
					label: "<?php echo $type_currency['name']; ?> payout&nbsp;",
					data: <?php echo strtolower($type_currency['name']); ?>_payouts,
					color: "#84defb",
					bars: {
						show: true,
						align: "center",
						barWidth: 24 * 60 * 60 * 600,
						lineWidth: 0,
						fill: 1.0,
						fillColor: "rgba(199,237,252,0.5)"
					},
					yaxis: 1,
					highlightColor: "rgba(199,237,252,0.5)"
				},{
					label: "<?php echo $type_currency['name']; ?> balance",
					data: <?php echo strtolower($type_currency['name']); ?>_balances,
					yaxis: 2,
					color: "#5A93c4",
					lines: {
						lineWidth: 2,
						show: true,
						fill: false,
						fillColor: {
							colors: [{
								opacity: 0.2
							}, {
								opacity: 0
							}]
						}
					},
					splines: {
						show: false,
						tension: 0.6,
						lineWidth: 1,
						fill: 0.1
					}
				}];

				$.plot($("#flot-<?php echo strtolower($type_currency['name']); ?>-balance"), <?php echo strtolower($type_currency['name']); ?>_balancedata, balanceoptions);
			</script>

			<div id="<?php echo $row['name']; ?>"></div>
			<input type="hidden" id="<?php echo $row['name']; ?>price" value="<?php echo $row['price']; ?>">
			<a href="#">
				<h2><?php echo $row['name']; ?>
					<a class="purchase-toggle" data-target=".buy-<?php echo $row['name']; ?>" data-toggle="collapse" aria-expanded="false" aria-controls="purchase-sha">
						<i class="fa fa-shopping-cart text-success"></i>
					</a>
				</h2>
			</a>
			
			<div class="buy-widget row collapse buy-<?php echo $row['name']; ?>">
				<?php include('buy/slider.php'); ?>
			</div>
			
			<div class="row row-eq-height type-container">
				<div class="col-xs-3 text-center">
					<div class="panel hashrate-panel">
						<div class="panel-body">
							<br><br>
							<h1><i class="fas fa-bolt"></i></h1>
							<h1 class="m-xs"><?php echo get_user_hashrate_by_type($row['id']); ?> <?php echo $row['thousand']; ?></h1>
							<h3 class="font-bold no-margins">
							<?= $lang['hashrate']; ?><br><br>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><?= $lang['pools']; ?></h3>
						</div>
						<div class="panel-body">
						</div>
					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><?= $lang['revenue']; ?> <?= $lang['per']; ?> 1 <?php echo $row['thousand']; ?></h3>
						</div>
						<div class="panel-body">
							<div id="<?php echo $row['shortname']; ?>-revenue-chart" style="min-height: 180px; font-size: 12px">
							</div>
						</div>
						<script>
							var <?php echo $row['shortname']; ?>profitdata = [
								{
									label: "USD per 1 <?php echo $row['thousand']; ?>",
									data: [[<?php echo strtotime("-4 day GMT midnight"); ?>000, <?php echo get_type_revenue_by_date($row['id'], date('Y-m-d', strtotime("-4 day GMT midnight"))); ?>],
									[<?php echo strtotime("-3 day GMT midnight"); ?>000, <?php echo get_type_revenue_by_date($row['id'], date('Y-m-d', strtotime("-3 day GMT midnight"))); ?>],
									[<?php echo strtotime("-2 day GMT midnight"); ?>000, <?php echo get_type_revenue_by_date($row['id'], date('Y-m-d', strtotime("-2 day GMT midnight"))); ?>],
									[<?php echo strtotime("-1 day GMT midnight"); ?>000, <?php echo get_type_revenue_by_date($row['id'], date('Y-m-d', strtotime("-1 day GMT midnight"))); ?>],
									[<?php echo strtotime("today GMT midnight"); ?>000, <?php echo get_type_revenue_of_now($row['id']); ?>]],
									color: "#DBEAF9",
									bars: {
										show: true,
										align: "center",
										barWidth: 24 * 60 * 60 * 600,
										lineWidth: 0,
										fillColor: "rgba(199,237,252,0.5)"
									},
									highlightColor: "rgba(199,237,252,0.5)"
								}
							];

							$.plot($("#<?php echo $row['shortname']; ?>-revenue-chart"), <?php echo $row['shortname']; ?>profitdata, profitoptions);
						</script>
					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><?= $lang['revenue forcast']; ?></h3>
						</div>
						<div class="panel-body">
							<ul id="revenue-list">
								<?php
									$daily_revenue = get_user_daily_revenue_by_type($row['id']);
									$weekly_revenue = $daily_revenue * 7;
									$monthly_revenue = $daily_revenue * 30;
									$semi_annual_revenue = $monthly_revenue * 6;
									$annual_revenue = $daily_revenue * 365;
								?>
								<li>
									<span class="text"><?php echo $daily_revenue; ?> BTC = <?php echo btc_to_usd($daily_revenue, 2); ?> USD</span>
									<span class="pull-right badge badge-info" style="background-color: #9ad1ed" rel="tooltip" data-toggle="tooltip" data-placement="left" title="" data-original-title="1 day">1d </span>
								</li>

								<li>
									<span class="text"><?php echo $weekly_revenue; ?> BTC = <?php echo btc_to_usd($weekly_revenue, 2); ?> USD</span>
									<span class="pull-right badge badge-primary" style="background-color: #809fb9" rel="tooltip" data-toggle="tooltip" data-placement="left" title="" data-original-title="1 day">1w </span>
								</li>

								<li>
									<span class="text"><?php echo $monthly_revenue; ?> BTC = <?php echo btc_to_usd($monthly_revenue, 2); ?> USD</span>
									<span class="pull-right badge badge-success" style="background-color: #93da54" rel="tooltip" data-toggle="tooltip" data-placement="left" title="" data-original-title="1 day">1m </span>
								</li>

								<li>
									<span class="text"><?php echo $semi_annual_revenue; ?> BTC = <?php echo btc_to_usd($semi_annual_revenue, 2); ?> USD</span>
									<span class="pull-right badge badge-danger" style="background-color: #f174a3" rel="tooltip" data-toggle="tooltip" data-placement="left" title="" data-original-title="1 day">6m </span>
								</li>

								<li>
									<span class="text"><?php echo $annual_revenue; ?> BTC = <?php echo btc_to_usd($annual_revenue, 2); ?> USD</span>
									<span class="pull-right badge badge-warning" style="background-color: #f5b35c" rel="tooltip" data-toggle="tooltip" data-placement="left" title="" data-original-title="1 day">1y </span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	<?php
		endwhile;
	endif;
	?>
</div>

<script>
$(function () {
    $.each($(".uislider"), function () {
        var self = $($(this)[0]);
        var $btn = $("#" + $(this).attr("id") + "-btn");
		self = document.getElementById($(this).attr("id"));
		window.step = $(this).data("step");
		slider_id = $(this).attr("id");

		var baseUnit = $(this).data('baseunit');
		var kUnit = $(this).data('kunit');

        noUiSlider.create(self, {
            start: $(this).data("start"),
            behaviour: "tap",
            connect: "lower",
            step: $(this).data("step"),
			tooltips: [{
				to (value) {
					var prefix = Math.round(value) >= 1000 ? value.toFixed(1) / 1000 : value;
					var postfix = value >= 1000 ? kUnit : baseUnit;
					
					return prefix + ' ' + postfix;
				}
			}],
            range: {
                "min": $(this).data("min"),
                "25%": [$(this).data("max") * 0.01, $(this).data("step") * 10],
                "50%": [$(this).data("max") * 0.05, $(this).data("step") * 50],
                "75%": [$(this).data("max") * 0.25, $(this).data("step") * 100],
                "max": $(this).data("max")
			},
			pips: {
				mode: "steps",
				density: window.step * 10,
					filter: function (value, type) {
						if (value == 0) return 1;
						if (value < 1000 && value % 100 == 0) return 2;
						if (value >= 1000 && value <= 5000 && value % 1000 == 0) return 1;
						if (value >= 1000 && value <= 5000 && value % 1000 == 500) return 2;
						if (value > 5000 && value <= 25000 && value % 2500 == 0 && value % 1000 != 0) return 2;
						if (value > 5000 && value <= 25000 && value % 5000 == 0) return 1;
						if (value > 25000 && value % 10000 == 0) return 1;
				},
				format: wNumb({
					decimals: 0,
					edit: function (number) {
						if (number >= 1000) return number / 1000;
						return number;
					}
				})
			},
            format: wNumb({
                decimals: 0,
                encoder: function (number) {
                    return number >= 1000 ? number / 1000 : number;
                },
                edit: function (text, value) {
                    if (value == 0) $btn.prop("disabled", true).addClass("disabled");
                    else $btn.prop("disabled", false).removeClass("disabled");

					var postfix = value >= 1000 ? kUnit : baseUnit;

                    var postfix = value >= 1000 ? kUnit : baseUnit;
					var price = parseFloat(Math.round(value) * $("#" + $('#' + self.id).data("type") + "price").val()).toFixed(2);
					
					$("." + self.id + "-btc").text(price);
                    $("." + self.id + "-usd").text(price * parseInt($("#BTCprice").val()));

                    $("#" + $('#' + self.id).data('type') + "-amount").val(Math.round(value));

                    return (value >= 1000 ? parseFloat((value / 1000).toFixed(2)) : text) + " " + postfix;
                }
            })
        });
    });
});
</script>