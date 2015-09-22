var EditTankLocation = function(){

	this.getUserId = function(){
		return $('meta[name=userid]').attr("content");
	}

	this.getTankId = function($target){
		return $($target).attr('data-tankid');
	}

	this.renderTankLocationEditForm = function(e){
		var context = 	e.data.context,
			id 		=	context.getTankId(this),
			user_id = 	context.getUserId();

		context.renderOverlayForm(id, user_id, context);
	};

	this.showOverLayDom = function($dom){
		$($dom).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.init = function(){
		$(".edit-tank-location").on('click', {context : this}, this.renderTankLocationEditForm);
	};
};

EditTankLocation.prototype.renderOverlayForm = function(id, user_id, context){
	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="editlocation">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Location - Edit</h2>'

									+'<div class="location-form">'
										+'<form method="post" action="/location/edit">'
											+'<table>'
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Name : ',input :{type:'text',name: 'name',id :'name',p_holder:'Name or Airport or Place'}}})
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Airport code : ',input :{type:'text',name: 'airportcode',id :'airportcode',p_holder:'IATA Code, If Applicable'}}})
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Address :',input :{type:'text',name: 'street1',id :'street1',p_holder:'Street 1'}}})
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'',input :{type:'text',name: 'street2',id :'street2',p_holder:'Street 2'}}})
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'',input :{type:'text',name: 'city',id :'city',p_holder:'City'}}})
												+'<tr>'
													+'<td class="spec">'
													+'</td>'
													+'<td>'
														+'<input type="text" name="region" id="region" placeholder="Region" required>'
														+'<input type="text" name="postcode" id="postcode" placeholder="Post code" required>'
													+'</td>'
												+'</tr>'
												+context.getTableRow({tr:{className:''},td:{className:'spec',label:'',input :{type:'text',name: 'country',id :'country',p_holder:'Country'}}})
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
}

$(function(){
	var edit_tank_location = new EditTankLocation();
	edit_tank_location.init();
}());


EditTankLocation.prototype.getTableRow        =   function(data){
    return ('<tr class="'+data.tr.className+'">'
                +'<td class="'+data.td.className+'">'
                    +data.td.label
                +'</td>'
                +'<td>'
                    +'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
                +'</td>'
            +'</tr>');
}

EditTankLocation.prototype.attachCloseFormEvent = function(){
	$(".overlays > .editlocation > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

EditTankLocation.prototype.getFormFields = function(id,context){
	$.ajax({
		type : "POST",
		url  : '/location/details',
		data : {
			tankid  : id
		},
		success : function(res){
			context.fillFormFields(res);
		}
	});
}

EditTankLocation.prototype.attachFormSubmit = function(){
	$("#t-i-form").on('click', function(e){
		$(".location-form > form").submit();
	});
}

EditTankLocation.prototype.fillFormFields = function(res){
	$("#name").val(res.location_name);
	$("#airportcode").val(res.airport_code);
	$("#street1").val(res.street1);
	$("#street2").val(res.street2);
	$("#city").val(res.city);
	$("#region").val(res.region);
	$("#postcode").val(res.postcode);
	$("#country").val(res.country);
}

EditTankLocation.prototype.getSubmitButton    =   function(text){
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