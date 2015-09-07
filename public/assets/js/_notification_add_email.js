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
