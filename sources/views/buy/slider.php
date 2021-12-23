<div class="widget slider-widget">
    <div class="col-xs-12">
        <h3 class="text-center p-xs" style="color:#5a93c4;">
        Select amount to purchase </h3>
        <br>
        <div class="col-xs-12">
            <div id="slider-<?php echo $row['name']; ?>" data-baseunit="<?php echo $row['unit']; ?>" data-kunit="<?php echo $row['thousand']; ?>"  class="uislider" data-step="10" data-start="0" data-min="0" data-max="100000" data-unit="<?php echo $row['unit_name']; ?>" data-type="<?php echo $row['name']; ?>">
            </div>
            <br><br><br>
        </div>
    </div>
    </div>

    <div class="col-xs-12">
    <div class="widget style1">
        <form action="<?php echo $url; ?>buy/" class="form-horizontal" id="PurchaseIndexForm" method="post" accept-charset="utf-8">
            <input type="hidden" name="buy">
            <input type="hidden" name="type_id" value="<?php echo $row['id']; ?>">

            <div style="display:none;"><input type="hidden" name="_method" value="POST"></div><input type="hidden" name="data[Purchase][product]" value="1" id="PurchaseProduct"><input type="hidden" name="data[Purchase][amount]" class="slider-sha-total" value="400" id="PurchaseAmount"><input type="hidden" name="data[Purchase][years]" id="product_years" value="1"> <div class="hidden-md hidden-lg text-center well well-sm m-b-sm" style="padding: 7px;">
                <span class="slider-<?php echo $row['name']; ?>-usd">72.00</span> USD or <span class="slider-<?php echo $row['name']; ?>-btc">0.00700560</span> BTC
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 m-b-sm">
                    <div class="input-group">
                        <input name="amount" class="form-control slider-sha-total" value="0" id="<?php echo $row['name']; ?>-amount" type="text" required="required">
                        <span class="input-group-addon">
                            <?php echo $row['unit']; ?>
                        </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-3 m-b-sm pull-right">
                    <button type="submit" class="btn btn-success btn-block">Proceed</button>
                </div>

                <div class="hidden-xs hidden-sm col-md-offset-1 col-md-3 text-center well well-sm pull-right" style="padding: 7px;">
                    <span class="slider-<?php echo $row['name']; ?>-usd">72.00</span> USD or <span class="slider-<?php echo $row['name']; ?>-btc">0.00700560</span> BTC
                </div>
            </div>
        </form>
    </div>
</div>