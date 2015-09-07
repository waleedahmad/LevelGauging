if ($('.global').length) {
    setTimeout(function() {
        $('.global').fadeOut('slow');
    }, 3000);
}

$(".global .close").on('click', function(){
	$('.global').fadeOut('slow');
});
$("#add-reporting-email , #add-levelalert-email , #add-inspectdue-email").on('click', function(e){

	var tankid			=	$('meta[name=tankid]').attr("content"),
		name 			=	$(this).attr('data-name'),
		submit_color 	=	'',
		header 			=	'';
	console.log(name);
	switch (name) {
		case 'reporting':
			color 	=	'#839D3C';
			header 	=	'Email Reporting - Add';
			break;
		case 'levels':
			color 	=	'#839D3C';
			header 	=	'Level alert - Add';
			break;
		case 'inspection':
			color 	=	'#1376A1';
			header 	=	'Tank Inspection - Add';
			break;
		default:
	}
	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="form '+name+'">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>'+header+'</h2>'

									+'<div class="report-form">'
										+'<form method="post" action="/notifications/add/email">'
											+'<table class="upper">'
												+'<tr>'
													+'<td class="spec">'
														+'Email : '
													+'</td>'
													+'<td>'
														+'<input type="email" name="email" id="email" placeholder="email" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Status : '
													+'</td>'
													+'<td>'
														+'<select name="status" id="status" required>'
															+'<option value="1">Active</option>'
															+'<option value="0">Disabled</option>'
														+'</select>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Frequency : '
													+'</td>'
													+'<td>'
														+'<select name="frequency" id="frequency" required>'
															+'<option value="daily">Daily report</option>'
															+'<option value="weekly">Weekly report</option>'
															+'<option value="monthly">Monthly report</option>'
														+'</select>'
													+'</td>'
												+'</tr>'
											+'</table>'

											+'<div class="bottom '+name+'">'
												+'<p>Set start time and date to receive your reporting data </p>'
												+'<table>'
													+'<tr>'
														+'<td class="spec">'
															+'Time : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="time" id="timepicker" placeholder="Pick Time" required></p>'
														+'</td>'
													+'</tr>'

													+'<tr>'
														+'<td class="spec">'
															+'Start Date : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="date" id="datepicker" placeholder="Pick Date" required></p>'
														+'</td>'
													+'</tr>'
												+'</table>'
											+'</div>'

											+'<div class="reporting-errors"></div>'

											+getNotificationEmailFormButton(color,'Add')

											+'<input type="hidden" name="tankid" value="'+tankid+'">'
											+'<input type="hidden" name="type" value="'+name+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';

	$($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');
	addOverlayCloseEvent();
	attachInputFieldTimeDateSelectors();
	attactAddSubmitEvent(name);
});

function attactAddSubmitEvent(name){
	$("#s-e-r-form").on('click', function(e){
		var $email 		=	$.trim($("#email").val()),
			$status		=	$.trim($("#status").val()),
			$freq  		=	$.trim($("#frequency").val()),
			$time 		=	$.trim($("#timepicker").val()),
			$date 		=	$.trim($("#datepicker").val());

		if(!$email.length || !$status.length || !$freq.length || !$time.length || !$date.length){
			console.log("All Fields Required");
			$(".reporting-errors").text("All fields required.");
		}else{
			if(!validateEmail($email)){
				$(".reporting-errors").text("Invalid Email.");
			}else{
				var tankid	=	$('meta[name=tankid]').attr("content");
				alreadyExists($email,name,tankid);
			}
		}
	});
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function alreadyExists(_email,_type,_tankid){
	$.ajax({
		type : "POST",
		url  : '/notifications/verify/email',
		data : {
			email  : _email,
			type   : _type,
			tankid : _tankid
		},
		success : function(res){
			analyizeAlreadyExists(res);
		}
	});
}

function attachInputFieldTimeDateSelectors(){
	$('#timepicker').timepicker({ 'timeFormat': 'h:i A' });
	$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

}

function analyizeAlreadyExists(res){
	if(res.status){
		$(".reporting-errors").text("Email already exists on list.");
	}else{
		$(".report-form > form").submit();
	}
}

function addOverlayCloseEvent(){
	$(".overlays > .form > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

function getNotificationEmailFormButton(color,text){
	return('<?xml version="1.0" encoding="utf-8"?>'
			+'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
			+'<svg version="1.1" id="s-e-r-form" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
		 		+'viewBox="0 0 80.8 27.7" enable-background="new 0 0 80.8 27.7" xml:space="preserve">'
				+'<g>'
					+'<rect x="0.5" y="0.4" fill="'+color+'" stroke="#F3F8F9" stroke-miterlimit="10" width="80.3" height="27.2"/>'
					+'<g>'
						+'<rect x="28.6" y="9.8" fill="none" width="68.2" height="29.8"/>'
						+'<text transform="matrix(1 0 0 1 28.5552 17.8945)" fill="#FFFFFF" font-size="12.1205">'+text+'</text>'
					+'</g>'
					+'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9 	"/>'
				+'</g>'
			+'</svg>');
	}

$(".edit-notifications").on('click', function(){
    var $target         =   $(this),
        id              =   $($target).attr('data-id'),
		name 			=	$(this).attr('data-name'),
        tankid			=	$('meta[name=tankid]').attr("content"),
		submit_color 	=	'',
		header 			=	'';

	switch (name) {
		case 'reporting':
			color 	=	'#839D3C';
			header 	=	'Email Reporting - Edit';
			break;
		case 'levels':
			color 	=	'#839D3C';
			header 	=	'Level alert - Edit';
			break;
		case 'inspection':
			color 	=	'#1376A1';
			header 	=	'Tank Inspection - Edit';
			break;
		default:
	}
	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="form '+name+'">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>'+header+'</h2>'

									+'<div class="report-form">'
										+'<form method="post" action="/notifications/update/email">'
											+'<table class="upper">'
												+'<tr>'
													+'<td class="spec">'
														+'Email : '
													+'</td>'
													+'<td>'
														+'<input type="email" name="email" data-oldmail="" id="email" placeholder="email" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Status : '
													+'</td>'
													+'<td>'
														+'<select name="status" id="status" required>'
															+'<option value="1">Active</option>'
															+'<option value="0">Disabled</option>'
														+'</select>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Frequency : '
													+'</td>'
													+'<td>'
														+'<select name="frequency" id="frequency" required>'
															+'<option value="daily">Daily report</option>'
															+'<option value="weekly">Weekly report</option>'
															+'<option value="monthly">Monthly report</option>'
														+'</select>'
													+'</td>'
												+'</tr>'
											+'</table>'

											+'<div class="bottom '+name+'">'
												+'<p>Set start time and date to receive your reporting data </p>'
												+'<table>'
													+'<tr>'
														+'<td class="spec">'
															+'Time : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="time" id="timepicker" placeholder="Pick Time" required></p>'
														+'</td>'
													+'</tr>'

													+'<tr>'
														+'<td class="spec">'
															+'Start Date : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="date" id="datepicker" placeholder="Pick Date" required></p>'
														+'</td>'
													+'</tr>'
												+'</table>'
											+'</div>'

											+'<div class="reporting-errors"></div>'

											+getNotificationEmailFormButton(color,'Update')

											+'<input type="hidden" name="id" value="'+id+'">'
                                            +'<input type="hidden" name="tankid" value="'+tankid+'">'
											+'<input type="hidden" name="type" value="'+name+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';

	$($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');
	addOverlayCloseEvent();
    getNotificationDetails(id);
	attachInputFieldTimeDateSelectors();
	attactUpdateSubmitEvent(name);
});

function attactUpdateSubmitEvent(name){
    $("#s-e-r-form").on('click', function(e){
		var $email 		=	$.trim($("#email").val()),
            $o_mail     =   $.trim($("#email").attr('data-oldmail')),
			$status		=	$.trim($("#status").val()),
			$freq  		=	$.trim($("#frequency").val()),
			$time 		=	$.trim($("#timepicker").val()),
			$date 		=	$.trim($("#datepicker").val());

		if(!$email.length || !$status.length || !$freq.length || !$time.length || !$date.length){
			console.log("All Fields Required");
			$(".reporting-errors").text("All fields required.");
		}else{
            if(!validateEmail($email)){
                $(".reporting-errors").text("Invalid Email.");
            }else{
                if($email != $o_mail){
                    var tankid	=	$('meta[name=tankid]').attr("content");
                    alreadyExists($email,name,tankid);
                }else{
                    $(".report-form > form").submit();
                }
            }
		}
	});
}

function getNotificationDetails(_id){
    $.ajax({
        type : 'POST',
        url  : '/notifications/details/email',
        data : {
            id  : _id
        },
        success : function(res){
            setFieldsFromResponse(res);
        }
    });
}

function setFieldsFromResponse(data){
    $("#status").val(data.active);
    $("#frequency").val(data.frequency);
    $("#email").val(data.email);
    $("#email").attr("data-oldmail",data.email);
    $("#timepicker").val(data.time);
    $("#datepicker").val(data.date);
}

$(".remove-notifications").on('click', function(){
    var $target =   $(this),
        _id     =   $($target).attr('data-id');

    $.ajax({
        type : 'POST',
        url  : '/notifications/delete/email',
        data : {
            id : _id
        },
        success : function(res){
            if(res.status){
                $($target).parents('li').slideUp('slow');
            }
        }
    });
});

var $report_upload 	=	$(".client-details > .content > .content-blocks > .bottom > .right");

$($report_upload).children('.report-upload').on('click', function(){
	$target 	=	$(this);
	$($target).parents('.right').css({
		'top'		: 	0,
		'right' 	: 	0,
		'bottom'	: 	0,
		'left'		: 	0,
		'margin'	: 	'auto',
		'position'	: 	'absolute',
		'-webkit-box-shadow' : '0px 0px 20px 0px rgba(0,0,0,0.75)',
		'-moz-box-shadow' : '0px 0px 20px 0px rgba(0,0,0,0.75)',
		'box-shadow': '0px 0px 20px 0px rgba(0,0,0,0.75)'
	}).animate({
		'height'	: 	'400px',
		'width' 	: 	'600px'
	}, 'slow');

	$($target).parents('.right').children('.files').animate({
		'height': '260px',
	});

	$($target).parents('.right')
				.children('.files')
				.children('.file')
				.children('.remove')
				.show();

	$($target).hide();

	$($target).parents('.right').children('.close').show();

	$($target).parents('.right').children('.upload').show();
});

$($report_upload).children('.close').on('click', function(e){
	$target 	=	$(this);
	$($target).parents('.right').animate({
		'height'	: 	'100%',
		'width' 	: 	'35%'
	})
	.hide('fast')
	.css({
		'position'	: 	'relative',
		'display'	: 	'none',
		'-webkit-box-shadow' : 'none',
		'-moz-box-shadow' : 'none',
		'box-shadow': 'none'
	})
	.fadeIn('fast');

	$($target).parents('.right').children('.files').animate({
		'height': '145px'
	});

	$($target).parents('.right')
				.children('.files')
				.children('.file')
				.children('.remove')
				.hide();

	$($target).hide();

	$($target).parents('.right').children('.report-upload').show();
	$($target).parents('.right').children('.upload').hide();
});

$('#file-upload').change(function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename').html(filename);

    $(".history-form").submit();
});


$($report_upload).find('.files > .file > .remove > .delete').on('click', function(){
	var $target 	=	$(this),
		$id 		=	$($target).attr('data-id');
	$.ajax({
		type : 'POST',
		url  : '/delete/history',
		data : {
			id : $id
 		},
 		success : function(res){
 			if(res.status){
 				$($target).parents('.file').slideUp('slow');
 			}
 		}
	});
});