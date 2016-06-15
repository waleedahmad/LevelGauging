var EditTankSpecifications = function(){

	this.showOverLayDom = function($dom){
		$($dom).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.getUserId = function(){
		return $('meta[name=userid]').attr("content");
	};

	this.getTankId = function($target){
		return $($target).attr('data-tankid');
	};

	this.renderTankEditSpecForm = function(e){
		var context = 	e.data.context,
			id 		=	context.getTankId(this),
			user_id = 	context.getUserId();

		context.renderOverlayForm(id, user_id, context);
	};

	this.init = function(){
		$(".edit-tank-specs").on('click', {context : this}, this.renderTankEditSpecForm);
	};
};

$(function(){
	var edit_tank_specs = new EditTankSpecifications();
	edit_tank_specs.init();
}());

EditTankSpecifications.prototype.renderOverlayForm = function(id, user_id, context){
	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="editspecs">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Tank Inspection - Edit</h2>'

									+'<div class="specifications-form">'
										+'<form method="post" action="/specifications/edit">'
											+'<table>'
												+'<tr>'
													+'<td class="spec">'
														+'Grade of fuel : '
													+'</td>'
													+'<td>'
														+'<select name="fuelgrade" id="fuelgrade" required>'
															+'<option value="JET-A1">JET-A1</option>'
															+'<option value="JET-A1 + AL48">JET-A1 + AL48</option>'
															+'<option value="Avgas 100LL">Avgas 100LL</option>'
															+'<option value="Avgas UL91">Avgas UL91</option>'
														+'</select>'
													+'</td>'
												+'</tr>'

												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Markings ID : ',input :{type:'text',name: 'markingid',id :'markingid',p_holder:'Marking ID'}}})

												+'<tr>'
													+'<td class="spec">'
														+'Shape : '
													+'</td>'
													+'<td>'
														+'<select name="tankshape" id="tankshape" required>'
															+'<option value="Rectangle">Rectangle</option>'
															+'<option value="Circle">Circle</option>'
															+'<option value="Square">Square</option>'
															+'<option value="Oval">Oval</option>'
														+'</select>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Titled : '
													+'</td>'
													+'<td>'
														+'<select name="titled" id="titled" required>'
															+'<option value="Yes">Yes</option>'
															+'<option value="No">No</option>'
														+'</select>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Internal : '
													+'</td>'
													+'<td>'
														+'<select name="internal" id="internal" required>'
															+'<option value="Yes">Yes</option>'
															+'<option value="No">No</option>'
														+'</select>'
													+'</td>'
												+'</tr>'
											+'</table>'

											+context.getSubmitButton('Update')

											+'<div class="reporting-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+id+'">'
											+'<input type="hidden" name="userid" value="'+user_id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
	context.showOverLayDom($overlay_dom);
	context.attachCloseFormEvent();
	context.getFormFields(id,context);
	context.attachFormSubmit();
};

EditTankSpecifications.prototype.getTableRow        =   function(data){
    return ('<tr class="'+data.tr.className+'">'
                +'<td class="'+data.td.className+'">'
                    +data.td.label
                +'</td>'
                +'<td>'
                    +'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
                +'</td>'
            +'</tr>');
};

EditTankSpecifications.prototype.getSubmitButton    =   function(text){
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
};

EditTankSpecifications.prototype.attachCloseFormEvent = function(){
	$(".overlays > .editspecs > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
};

EditTankSpecifications.prototype.getFormFields = function(id,context){
	$.ajax({
		type : "POST",
		url  : '/specifications/details',
		data : {
			tankid  : id
		},
		success : function(res){
			context.fillFormFields(res);
		}
	});
};

EditTankSpecifications.prototype.attachFormSubmit = function(){
	$("#t-i-form").on('click', function(e){
		var $fuelgrade		=	$.trim($("#fuelgrade").val()),
			$markingid		=	$.trim($("#markingid").val()),
			$tankshape		=	$.trim($("#tankshape").val()),
			$titled 		=	$.trim($("#titled").val()),
			$internal 		=	$.trim($("#internal").val());			
			

		if(!$fuelgrade.length || !$markingid.length || !$tankshape.length || !$titled.length || !$internal.length){
			console.log("All Fields Required");
			$(".reporting-errors").text("All fields required.");
		}else{
			$(".specifications-form > form").submit();
		}
	});
};

EditTankSpecifications.prototype.fillFormFields = function(res){
	$("#fuelgrade").val(res.fuel_grade);
	$("#markingid").val(res.marking_id);
	$("#tankshape").val(res.shape);
	$("#titled").val(res.titled);
	$("#internal").val(res.internal);
};