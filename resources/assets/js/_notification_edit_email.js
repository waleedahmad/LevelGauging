TankNotifications.prototype.renderEditOverlayForm = function(context,name,id){
	var 	tankid 	=	context.getTankId(),
			user_id = 	context.getUserId(),
			header 	=	context.header,
			color 	=	context.submitButtonColor;

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
													+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Time : ',input :{type:'text',name: 'time',id :'timepicker',p_holder:'Pick Time'}}})
													+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Start Date : ',input :{type:'text',name: 'date',id :'datepicker',p_holder:'Pick Date'}}})
												+'</table>'
											+'</div>'

											+'<div class="reporting-errors"></div>'

											+context.getSubmitButton(color,'Add')

											+'<input type="hidden" name="id" value="'+id+'">'
                                            +'<input type="hidden" name="tankid" value="'+tankid+'">'
											+'<input type="hidden" name="type" value="'+name+'">'
											+'<input type="hidden" name="userid" value="'+user_id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';

	context.showOverLayDom($overlay_dom);
	context.attachCloseFormEvent();
	context.attachDateTimeEvents();
	context.getFormFields(id ,context);
	context.attachEditFormSubmit(context, name, tankid);
};

TankNotifications.prototype.attachEditFormSubmit = function(context, name, tankid){
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
            if(!context.validateEmail($email)){
                $(".reporting-errors").text("Invalid Email.");
            }else{
                if($email != $o_mail){
                    var tankid	=	$('meta[name=tankid]').attr("content");
                    context.alreadyExists($email,name,tankid,context);
                }else{
                    $(".report-form > form").submit();
                }
            }
		}
	});
}

TankNotifications.prototype.getFormFields = function(_id,context){
    $.ajax({
        type : 'POST',
        url  : '/notifications/details/email',
        data : {
            id  : _id
        },
        success : function(res){
            context.setFormFields(res);
        }
    });
}

TankNotifications.prototype.setFormFields = function(data){
    $("#status").val(data.active); 
    $("#frequency").val(data.frequency);
    $("#email").val(data.email);
    $("#email").attr("data-oldmail",data.email);
    $("#timepicker").val(data.time);
    $("#datepicker").val(data.date);
}
