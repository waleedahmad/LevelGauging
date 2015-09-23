var EditTankInspection = function(){

	this.getUserId = function(){
		return $('meta[name=userid]').attr("content");
	};

	this.getTankId = function(e){
		return $(e).attr('data-tankid');
	};

	this.renderInspectionForm = function(e){
		var context = e.data.context,
			id 		= context.getTankId(this),
			user_id = context.getUserId();
			context.renderOverlayForm(id, user_id, context);
	};

	this.showOverLayDom = function($dom){
		$($dom).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.init = function(){
		$(".edit-tank-inspection").on('click', {context : this}, this.renderInspectionForm);
	};
};

$(function(){
	var edit_tank_inspection = new EditTankInspection();
	edit_tank_inspection.init();
}());

EditTankInspection.prototype.renderOverlayForm = function(id, user_id, context){
	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="editinspection">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Tank Inspection - Edit</h2>'
									+'<div class="inspection-form">'
										+'<form method="post" action="/inspection/edit">'
											+'<table class="upper">'
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Contractor :',input :{type:'text',name: 'contractor',id :'contractor',p_holder:'Contractor name'}}})
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Telephone : ',input :{type:'text',name: 'telephone',id :'telephone',p_holder:'Telephone number'}}})
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Email : ',input :{type:'text',name: 'email',id :'email',p_holder:'email'}}})
											+'</table>'
											+'<div class="bottom">'
												+'<table>'
													+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Date Inspected : ',input :{type:'text',name: 'd-inspected',id :'date-inspected',p_holder:'Date Inspected'}}})
													+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Date Cleaned : ',input :{type:'text',name: 'd-cleaned',id :'date-cleaned',p_holder:'Date Cleaned'}}})
													+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Next Inspection Due : ',input :{type:'text',name: 'd-next-inspection',id :'next-inspection',p_holder:'Next Inspection Date'}}})
												+'</table>'
											+'</div>'
											+context.getSubmitButton('Update')
											+'<div class="reporting-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+id+'">'
											+'<input type="hidden" name="userid" value="'+user_id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
	context.showOverLayDom($overlay_dom);
	context.attachOverlayClose();
	context.attachDateTimePickerEvents();
	context.attachSubmitFormEvent(context);
	context.getFieldData(context,id);
};

EditTankInspection.prototype.attachOverlayClose = function(){
	$(".overlays > .editinspection > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

EditTankInspection.prototype.attachDateTimePickerEvents = function(){
	$( "#date-inspected,#date-cleaned, #next-inspection" ).datepicker({ dateFormat: 'yy-mm-dd' });
}

EditTankInspection.prototype.attachSubmitFormEvent = function(context){
	$("#t-i-form").on('click', function(e){
		var $contactor	=	$.trim($("#contractor").val()),
			$phone		=	$.trim($("#telephone").val()),
			$email		=	$.trim($("#email").val()),
			$d_ins 		=	$.trim($("#date-inspected").val()),
			$d_cle 		=	$.trim($("#date-cleaned").val()),
			$d_n_ins	=	$.trim($("#next-inspection").val());
		
		if(!$contactor.length || !$phone.length || !$email.length || !$d_ins.length || !$d_cle.length || !$d_n_ins.length){
			console.log("All Fields Required");
			$(".reporting-errors").text("All fields required.");
		}else{
			if(!context.validateEmail($email)){
				$(".reporting-errors").text("Invalid Email.");
			}else{
				var tankid	=	$('meta[name=tankid]').attr("content");
				$(".inspection-form > form").submit();
			}
		}
	});
}

EditTankInspection.prototype.validateEmail = function(email){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
};

EditTankInspection.prototype.getFieldData = function(context,id){
	$.ajax({
		type : "POST",
		url  : '/inspection/details',
		data : {
			tankid  : id
		},
		success : function(res){
			context.fillFormFields(res);
		}
	});
}

EditTankInspection.prototype.fillFormFields = function(res){
	$("#contractor").val(res.contractor);
	$("#telephone").val(res.phone);
	$("#email").val(res.email);
	$("#date-inspected").val(res.date_inspected);
	$("#date-cleaned").val(res.date_cleaned);
	$("#next-inspection").val(res.next_inspection);
}

EditTankInspection.prototype.getTableRow        =   function(data){
    return ('<tr class="'+data.tr.className+'">'
                +'<td class="'+data.td.className+'">'
                    +data.td.label
                +'</td>'
                +'<td>'
                    +'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
                +'</td>'
            +'</tr>');
}

EditTankInspection.prototype.getSubmitButton    =   function(text){
    return('<?xml version="1.0" encoding="utf-8"?>'
            +'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
            +'<svg version="1.1" id="t-i-form" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
                +'viewBox="0 0 80.8 27.7" enable-background="new 0 0 80.8 27.7" xml:space="preserve">'
                +'<g>'
                    +'<rect x="0.5" y="0.4" fill="#839D3C;" stroke="#F3F8F9" stroke-miterlimit="10" width="80.3" height="27.2"/>'
                    +'<g>'
                        +'<rect x="28.6" y="9.8" fill="none" width="68.2" height="29.8"/>'
                        +'<text transform="matrix(1 0 0 1 28.5552 17.8945)" fill="#FFFFFF" font-size="12.1205">'+text+'</text>'
                    +'</g>'
                    +'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9  "/>'
                +'</g>'
            +'</svg>');
}