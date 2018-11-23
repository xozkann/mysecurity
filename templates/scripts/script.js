function alert(message) {
    alertify.okBtn("Kapat");
    alertify.alert(message)
}

function log(log, delay = 5000) {
    alertify.delay(delay).log(log)
}

function success(message, delay = 5000) {
    alertify.delay(delay).success(message)
}

function error(message, delay = 5000) {
    alertify.delay(delay).error(message)
}

function login() {
    var data = $('#login').serialize();
    var request_url = _url + "login";
    $.post(request_url, data, function(response) {
        if (response.error) {
            error(response.error)
        } else {
            window.location.reload(!0)
        }
    }, 'json')
}

function register() {
    var data = $('#register').serialize();
    var request_url = _url + "register";
    $.post(request_url, data, function(response) {
        if (response.error) {
            error(response.error)
        } else {
            window.location.reload(!0)
        }
    }, 'json')
}

function forgot_password() {
    var data = $('#forgot_password').serialize();
    var form = $('#forgot_password');
    form.addClass('loading');
    var request_url = _url + "forgot_password";
    $.post(request_url, data, function(response) {
        form.removeClass('loading');
        $('#forgot_password')[0].reset();
        if (response.error) {
            error(response.error)
        } else {
            success(response.success)
        }
    }, 'json')
}

function reset_password() {
    var data = $('#reset_password').serialize();
    var request_url = _url + "reset_password";
    $.post(request_url, data, function(response) {
        if (response.error) {
            error(response.error)
        } else {
            $(".panel-body").addClass("text-center");
            $(".panel-body").html('<div class="alert alert-success">' + response.success + '</div>')
        }
    }, 'json')
}

function add_ticket() {
    var data = $('#add_ticket_form').serialize();
    var form = $('#add_ticket_form');
    if (!form.hasClass("loading")) {
        form.addClass('loading');
        var request_url = _url + "add_ticket";
        $.post(request_url, data, function(response) {
            form.removeClass('loading');
            if (response.error) {
                error(response.error)
            } else {
                success(response.success);
                $("input[name='title']").val("");
                $("textarea[name='message']").val("");
                $("table>tbody").prepend("<tr><td>" + response.ticket_id + "</td><td><a href=" + response.ticket_url + " class='text-primary'>" + response.ticket_title + "</a></td><td><span class='text-success'>AÃ§Ä±k</span></td></tr>");
                $("#add_ticket").collapse("hide")
            }
        }, 'json')
    }
}

function ticket_reply() {
    var data = $('#ticket_reply').serialize();
    var form = $('#ticket_reply');
    form.addClass('loading');
    var request_url = _url + "ticket_reply";
    $.post(request_url, data, function(response) {
        form.removeClass('loading');
        if (response.error) {
            error(response.error)
        } else {
            success(response.success);
            $("textarea[name='reply']").val("");
            $("#messageScroll>.row").append('<div class="col-md-8 col-xs-10 col-md-offset-4 col-xs-offset-2"><div class="well pull-right">' + response.message + '<div class="hr"></div><div class="font75">' + response.date + '</div></div></div>');
            $("#messageScroll").animate({
                scrollTop: 10000
            }, 500)
        }
    }, 'json')
}

function update_password() {
    var data = $('#update_password').serialize();
    var form = $('#update_password');
    form.addClass('loading');
    var request_url = _url + "update_password";
    $.post(request_url, data, function(response) {
        form.removeClass('loading');
        if (response.error) {
            error(response.error)
        } else {
            success(response.success);
            $("input").val("")
        }
    }, 'json')
}

function update_key() {
    var data = {
        update_key: "update_key"
    };
    var form = $("#update_key");
    form.attr("disabled", "disabled");
    var request_url = _url + "update_key";
    $.post(request_url, data, function(response) {
        form.removeAttr('disabled');
        if (response.error) {
            error(response.error)
        } else {
            success(response.success);
            $("#api_key").val(response.key)
        }
    }, 'json')
}

function add_oto_order() {
	var data = $('#add_order').serialize();
    var form = $('#add_order');
    if (!form.hasClass("loading")) {
        form.addClass('loading');
        var request_url = _url + "add_oto_order";
        $.post(request_url, data, function(response) {
            form.removeClass('loading');
            if (response.error) {
                error(response.error)
            } else {
                success(response.success);
                form[0].reset();
            }
        }, 'json');
    }
}

function add_order() {
    var data = $('#add_order').serialize();
    var form = $('#add_order');
    if (!form.hasClass("loading")) {
        form.addClass('loading');
        var request_url = _url + "add_order";
        $.post(request_url, data, function(response) {
            form.removeClass('loading');
            if (response.error) {
                error(response.error)
            } else {
                success(response.success);
                form[0].reset();
				$("#quantity").removeAttr("readonly");
				$("#comment_div").slideUp();
                $(".badge").html("â‚º" + response.balance)
            }
        }, 'json')
    }
}

function add_funds() {
    var data = $('#add_funds').serialize();
    var form = $('#add_funds');
    if (!form.hasClass("loading")) {
        form.addClass('loading');
        var request_url = _url + "add_funds";
        $.post(request_url, data, function(response) {
            form.removeClass('loading');
            if (response.error) {
                error(response.error)
            } else {
                success(response.success);
                form[0].reset()
            }
        }, 'json')
    }
}

function pay_online() {
    var data = $('#pay_online').serialize();
    var form = $('#pay_online');
    if (!form.hasClass("loading")) {
        form.addClass('loading');
        var request_url = _url + "pay_online";
        $.post(request_url, data, function(response) {
            form.removeClass('loading');
            if (response.error) {
                error(response.error)
            } else if(response.method) {
				if (response.method == "paywant") {
					window.location.href = response.go
				} else if(response.method == "paytr") {
					$("#paytriframe").attr("src", "https://www.paytr.com/odeme/guvenli/"+response.token);
					$("#online_modal").modal();
				} else if(response.method == "buypayer") {
					window.open(response.buypayer, "_top");
				}
			}
        }, 'json')
    }
}

function show_account(account) {
    $("#account_info>span").slideUp();
    $(".account").slideUp();
    $("#" + account.value).slideDown()
}

function stopAuto(id) {
	alertify.okBtn("Durdur");
	alertify.cancelBtn("VazgeÃ§");
	alertify.confirm("Oto sipariÅŸi durdurmak istediÄŸinize emin misiniz?", function () {
		var data = {auto_id:id};
		var request_url = _url + "stop_auto";
		$(".btn").attr("disabled", "disabled");
		$.post(request_url, data, function(response) {
			$(".btn").removeAttr("disabled");
			if (response.error) {
				error(response.error);
			} else {
				success(response.success);
				$("tr#auto_"+id+">td:nth-child(7)").html("Durduruldu");
				$("tr#auto_"+id+">td:nth-child(8)").html("-");
			}
		}, 'json');
	}, function() {
		
	});
}
$(function() {
    var url = window.location;
    var element = $('ul.navbar-nav li a').filter(function() {
        return this.href == url
    }).parent().addClass('active');
    $("#category").change(function() {
        var category = $(this).val();
        var request_url = _url + "get_subs";
        $.post(request_url, {
            id: category
        }, function(response) {
            if (response.error) {
                $("#sub_category").html("<option>Kategori SeÃ§iniz</option>");
                $("#sub_category").attr("disabled", "disabled");
                error(response.error)
            } else if (response.log) {
                if (response.status == "success") {
                    var subs = "<option disabled selected>SeÃ§im yapÄ±nÄ±z</option>";
                    for (sub in response.subs) {
                        subs += '<option value="' + response.subs[sub].sub_id + '">' + response.subs[sub].sub_name + '</option>'
                    }
                    $("#sub_category").html(subs);
                    $("#sub_category").removeAttr("disabled")
                } else {
                    $("#sub_category").html("<option>Kategori SeÃ§iniz</option>");
                    $("#sub_category").attr("disabled", "disabled")
                }
                log(response.log, 1500)
            }
        }, 'json');
        $("#service").html("<option>Alt Kategori SeÃ§iniz</option>");
        $("#service").attr("disabled", "disabled");
        $("#description").slideUp();
        $("#description>textarea").val("");
        $("#link").val("");
        $("#quantity").val("");
        $("#price").val("");
		$('#check').prop("checked", false);
		$("#auto").slideUp();
		$("#drip_feed").slideUp();
		$("#quantity").removeAttr("readonly");
		$("#comment_div").slideUp();
    });
	$('#check').change(function() {
		if(this.checked) {
			$("#auto").slideDown();
		} else {
			$("#auto").slideUp();
		}
	});
	$('#runs, #quantity').keyup(function() {
		calculate2();	
	});
    $("#sub_category").change(function() {
        var sub_category = $(this).val();
        var request_url = _url + "get_services";
        $.post(request_url, {
            id: sub_category
        }, function(response) {
            if (response.error) {
                $("#service").html("<option>Alt kategori SeÃ§iniz</option>");
                $("#service").attr("disabled", "disabled");
                error(response.error)
            } else if (response.log) {
                if (response.status == "success") {
                    var services = "<option disabled selected>SeÃ§im yapÄ±nÄ±z</option>";
                    for (service in response.services) {
                        services += '<option value="' + response.services[service].service_id + '" data-price="' + response.services[service].service_price + '" data-drip="' + response.services[service].service_is_drip + '" data-comment="' + response.services[service].service_is_comment + '">' + response.services[service].service_name + '</option>'
                    }
                    $("#service").html(services);
                    $("#service").removeAttr("disabled")
                } else {
                    $("#service").html("<option>Alt Kategori SeÃ§iniz</option>");
                    $("#service").attr("disabled", "disabled")
                }
                log(response.log, 1500)
            }
        }, 'json');
		$("#description").slideUp();
        $("#description>textarea").val("");
        $("#link").val("");
        $("#quantity").val("");
        $("#price").val("");
		$('#check').prop("checked", false);
		$("#auto").slideUp();
		$("#drip_feed").slideUp();
		$("#quantity").removeAttr("readonly");
		$("#comment_div").slideUp();
    });
    $("#service").change(function() {
		if($(this).val() != "") {
			var request_url = _url + "get_description";
			$.post(request_url, {service:$(this).val()}, function(response) {
				if(response.error) {
					$("#description").slideUp();
					$("#description>textarea").val("");
				} else {
					$("#description>textarea").val(response.description);
					$("#description>textarea").attr("readonly", "readonly");
					$("#description").slideDown();
				}
			}, 'json');
			var selected = $("#service").find('option:selected');
			var is_drip = selected.data('drip');
			var is_comment = selected.data('comment');
			if(is_drip == "1") {
				$("#drip_feed").slideDown();
			} else {
				$("#drip_feed").slideUp();
			}
			if(is_comment == "1") {
				$("#quantity").attr("readonly", true);
				$("#comment_div").slideDown();
			} else {
				$("#quantity").removeAttr("readonly");
				$("#comment_div").slideUp();
			}
		} else {
			$("#drip_feed").slideUp();
			$("#quantity").removeAttr("readonly");
			$("#comment_div").slideUp();
		}
        $("#link").val("");
        $("#quantity").val("");
        $("#price").val("");
		$('#check').prop("checked", false);
		$("#auto").slideUp();
    });
    $("#quantity").keyup(function() {
        var quantity = $(this).val();
        if (quantity == "") {
            $("#price").val("")
        } else {
			if($('#check').is(':checked')) {
				calculate2();
			} else {
				var selected = $("#service").find('option:selected');
				var price = selected.data('price');
				var service = selected.val();
				var request_url = _url + "calculate";
				if ($.isNumeric(quantity)) {
					$.post(request_url, {
						quantity: quantity,
						price: price,
						service: service
					}, function(response) {
						if (response.status == "ok") {
							$("#price").val("â‚º" + response.price)
						}
					}, "json")
				} else {
					$("#price").val("");
				}
			}
        }
    });
	$("textarea[name='comments']").keyup(function() {
        var comments = $(this).val();
        if (comments == "") {
            $("#quantity").val("");
        } else {
			comments = $.trim(comments);
			var lines = comments.split(/\r|\r\n|\n/);
			var count = lines.length;
			$("#quantity").val(count);
			var selected = $("#service").find('option:selected');
			var price = selected.data('price');
			var service = selected.val();
			var request_url = _url + "calculate";
			if ($.isNumeric(count)) {
				$.post(request_url, {
					quantity: count,
					price: price,
					service: service
				}, function(response) {
					if (response.status == "ok") {
						$("#price").val("â‚º" + response.price)
					}
				}, "json")
			} else {
				$("#price").val("");
			}
        }
    });
    $("#messageScroll").animate({
        scrollTop: 10000
    }, 500)
});
function calculate2() {
	var selected = $("#service").find('option:selected');
	var price = selected.data('price');
	var runs = $('#runs').val();
	var service = selected.val();
	var quantity = $('#quantity').val();
	var request_url = _url + "calculate2";
	if($('#check').is(':checked')) {
		if(runs == "" || quantity == "") {
			$("#total_quantity").val("");
			$("#price").val("");
		} else {
			$("#total_quantity").val(runs * quantity);
			if ($.isNumeric(quantity) && $.isNumeric(runs)) {
				$.post(request_url, {
					quantity: quantity,
					price: price,
					service: service,
					runs: runs
				}, function(response) {
					if (response.status == "ok") {
						$("#price").val("â‚º" + response.price)
					}
				}, "json")
			} else {
				$("#price").val("")
			}
		}
	}
}
