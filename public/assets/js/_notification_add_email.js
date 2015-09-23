var TankNotifications 	=	function(){

	this.submitButtonColor = '';

	this.header = '';

	this.showOverLayDom = function($dom){
		$($dom).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.getTankId 	= function(){
		return $('meta[name=tankid]').attr("content");
	}

	this.getUserId = function(){
		return $('meta[name=userid]').attr("content");
	}

	this.getNotificationType = function($target){
		return $($target).attr('data-name');
	}

	this.getNotificationId = function($target){
		return $($target).attr('data-id');
	}

	this.renderTankNotificationForm = function(e){
		var context = 	e.data.context,
			type 	=	e.data.action,
			name 	=	context.getNotificationType(this);
			context.setProps(name, context, type);
			context.renderOverlayForm(context, name);
		console.log(type);
	}

	this.renderEditTankNotificationForm = function(e){
		var context = 	e.data.context,
			type 	=	e.data.action,
			name 	=	context.getNotificationType(this),
			id 		=	context.getNotificationId(this);
			context.setProps(name, context, type);
			context.renderEditOverlayForm(context, name, id);
	}

	this.removeTankNotification = function(e){
		var context = 	e.data.context,
			_id     =   context.getNotificationId(this);

		context.renderConfirmRemoveForm(context, _id);
	}

	this.setProps = function(name,context,action){
		switch (name) {
			case 'reporting':
				context.submitButtonColor 	=	'#839D3C';
				context.header 				=	(action === 'new') ? 'Email Reporting - Add'  : 'Email Reporting - Edit';
				break;
			case 'levels':
				context.submitButtonColor 	=	'#839D3C';
				context.header 				=	(action === 'new') ? 'Level alert - Add' : 'Level alert - Edit';
				break;
			case 'inspection':
				context.submitButtonColor 	=	'#1376A1';
				context.header 				=	(action === 'new') ? 'Tank Inspection - Add' : 'Tank Inspection - Edit';
				break;
			default:
		}
	}

	this.init = function(){
		$("#add-reporting-email , #add-levelalert-email , #add-inspectdue-email").on('click', {context : this, action : 'new'}, this.renderTankNotificationForm);
		$(".edit-notifications").on('click', {context : this, action : 'edit'}, this.renderEditTankNotificationForm);
		$(".remove-notifications").on('click',  {context : this}, this.removeTankNotification);
	};
};

$(function(){
	var tank_notifications = new TankNotifications();
	tank_notifications.init();
}());

TankNotifications.prototype.renderOverlayForm = function(context,name){
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
										+'<form method="post" action="/notifications/add/email">'
											+'<table class="upper">'
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Email : ',input :{type:'email',name: 'email',id :'email',p_holder:'email'}}})
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
	context.attachFormSubmit(context, name, tankid);
};

TankNotifications.prototype.attachCloseFormEvent = function(){
	$(".overlays > .form > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
};

TankNotifications.prototype.attachDateTimeEvents = function(){
	$('#timepicker').timepicker({ 'timeFormat': 'h:i A' });
	$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
};


TankNotifications.prototype.attachFormSubmit = function(context, name, tankid){
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
			if(!context.validateEmail($email)){
				$(".reporting-errors").text("Invalid Email.");
			}else{
				context.alreadyExists($email,name,tankid ,context);
			}
		}
	});
};

TankNotifications.prototype.validateEmail = function(email){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
};

TankNotifications.prototype.alreadyExists = function(_email,_type,_tankid , context){
	$.ajax({
		type : "POST",
		url  : '/notifications/verify/email',
		data : {
			email  : _email,
			type   : _type,
			tankid : _tankid
		},
		success : function(res){
			context.analyizeAlreadyExists(res);
		}
	});
};


TankNotifications.prototype.analyizeAlreadyExists = function(res){
	if(res.status){
		$(".reporting-errors").text("Email already exists on list.");
	}else{
		$(".report-form > form").submit();
	}
};

TankNotifications.prototype.getSubmitButton = function(color,text){
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
};

TankNotifications.prototype.getTableRow        =   function(data){
    return ('<tr class="'+data.tr.className+'">'
                +'<td class="'+data.td.className+'">'
                    +data.td.label
                +'</td>'
                +'<td>'
                    +'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
                +'</td>'
            +'</tr>');
};