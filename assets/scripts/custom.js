	$(function() {
		
	if ($("form[role=register]").length){
		$("form[role=register]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=register";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=register]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=login]").length){
		$("form[role=login]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=login";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=login]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=ChangePassword]").length){
		$("form[role=ChangePassword]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=ChangePassword";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=ChangePassword]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.cpass_response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=editBTC]").length){
		$("form[role=editBTC]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editBTC";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editBTC]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.btc_response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=editETH]").length){
		$("form[role=editETH]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editETH";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editETH]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.eth_response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=editDASH]").length){
		$("form[role=editDASH]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editDASH";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editDASH]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.dash_response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=editZEC]").length){
		$("form[role=editZEC]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editZEC";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editZEC]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.zec_response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}

	if ($("form[role=editContact]").length){
		$("form[role=editContact]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editContact";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editContact]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.contact_response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=withdraw]").length){
		$("form[role=withdraw]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=withdraw";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=withdraw]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.response').html(data.msg);
				if(data.status == "success") {
					$('.redirect').html(data.redirect);
				} 
				}
			});
			return false;
		});
	}
	if ($("form[role=editSettings]").length){
		$("form[role=editSettings]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editSettings";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editSettings]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.settings_response').html(data.msg);

				}
			});
			return false;
		});
	}
	if ($("form[role=editRevenue]").length){
		$("form[role=editRevenue]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editRevenue";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editRevenue]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.revenue_response').html(data.msg);

				}
			});
			return false;
		});
	}
	if ($("form[role=editWallet]").length){
		$("form[role=editWallet]").submit(function(event) {
			event.preventDefault()
			var url = $("#url").val();
			var data_url = url + "sources/requests/ajax.php?type=editWallet";
			$.ajax({
				type: "POST",
				url: data_url,
				data: $('form[role=editWallet]').serialize(),
				dataType: "json",
				success: function(data) {
				$('.wallet_response').html(data.msg);

				}
			});
			return false;
		});
	}
	
	
	});

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

	function labelFormatter(label, series) {
		return "<div class='badge badge-white'>" + label + "</div>";
	}

	function tooltipper(label, xval, yval, flotItem) {
		return (yval.toFixed(8).replace(/([0-9]+(\.[0-9]+[1-9])?)(\.?0+$)/,"$1")) + " %s " + "on %x";
	}
	
	function generate_payment(currency,amount,type_id,quantity) {
		var url = $("#url").val();
		var data_url = url + "sources/requests/ajax.php?type=generate_payment";
		$.ajax({
			type: "POST",
			url: data_url,
			data: "currency=" + currency + "&amount=" + amount + "&type_id=" + type_id + "&quantity=" + quantity,
			//dataType: "json",
			success: function(data) {
				console.log(data);
				data = JSON.parse(data);
				if (data.status != "error") {
					//window.location = url + "transaction/" + data.txn_id;
				} else {
					$("#buy-choose-currency-feedback").html(data.msg);
				}
			}
		});

		return false;
	}