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
