var AddTank = function(){

	this.email = '';

	this.renderOverlayForm = function(e){
		var context = e.data.context;
		context.setEmail(this, context);
		context.getOverlayTemplate(context,context.email);
	};

	this.appendOverlayToWrapper 	= function($overlay){
		$($overlay).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.getEmail = function($target){
		return $($target).attr('data-email');
	}

	this.setEmail = function($target, context){
		context.email = context.getEmail($target);
	};

	this.init = function(){
		$(".add-tank").on('click', {context : this}, this.renderOverlayForm);
	};
};

$(function(){
	var add_tank = new AddTank();
	add_tank.init();
}());

AddTank.prototype.getOverlayTemplate 	= 	function(context){
	var $overlay 	=	'<div class="overlays">'
							+'<div class="add-tank-form">'
								+context.getOverlayHeader({className : 'close'})
								+'<div class="addtank-form">'
									+'<form method="post" action="/tanks/add">'
										+'<table>'
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Marking ID :',input :{type:'text',name: 'markingid',id :'markingid',p_holder:'Marking ID'}}})
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
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Capacity : ',input :{type:'text',name: 'capacity',id :'capacity',p_holder:'Total Tank Capacity'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Max SFL :',input :{type:'text',name: 'max-sfl',id :'max-sfl',p_holder:'Max SFL'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Reoder Point : ',input :{type:'text',name: 'order-point',id :'order-point',p_holder:'Reorder Point'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Empty Point : ',input :{type:'text',name: 'empty-point',id :'empty-point',p_holder:'Empty Point'}}})
										+'</table>'
										+context.getSubmitButton('Add')
										+'<div class="errors"></div>'
										+'<input type="hidden" name="email" value="'+context.email+'">'
									+'</form>'
								+'</div>'
							+'</div>'
						+'</div>';
	context.appendOverlayToWrapper($overlay);
	context.attachOverlayClose();
	context.attachFormSubmit();
}

AddTank.prototype.attachFormSubmit 	=	 function(){
	$("#s-c-form").on('click', function(e){
		var $markingid 		=	$.trim($("#markingid").val()),
			$fuelgrade		=	$.trim($("#fuelgrade").val()),
			$capacity  		=	$.trim($("#capacity").val()),
			$max_sfl 		=	$.trim($("#max-sfl").val()),
			$order_point 	=	$.trim($("#order-point").val()),
            $empty_point 	=	$.trim($("#empty-point").val());

		if(!$markingid.length || !$fuelgrade.length || !$capacity.length || !$max_sfl.length || !$order_point.length || !$empty_point.length){
			console.log("All Fields Required");
			$(".errors").text("All fields required.");
		}else{
            $(".addtank-form > form").submit();
		}
	});
}

AddTank.prototype.attachOverlayClose = 	function(){
	$(".overlays > .add-tank-form > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

AddTank.prototype.getTableRow 		=	function(data){
	return ('<tr class="'+data.tr.className+'">'
				+'<td class="'+data.td.className+'">'
					+data.td.label
				+'</td>'
				+'<td>'
					+'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
				+'</td>'
			+'</tr>');
}

AddTank.prototype.getOverlayHeader 	=	 function(data){
	return('<span class="'+data.className+'">X</span>'
			+'<h2>Tank - Add</h2>'
			);
}

AddTank.prototype.getSubmitButton 	=	function(text){
	return('<?xml version="1.0" encoding="utf-8"?>'
			+'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
			+'<svg version="1.1" id="s-c-form" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
		 		+'viewBox="0 0 80.8 27.7" enable-background="new 0 0 80.8 27.7" xml:space="preserve">'
				+'<g>'
					+'<rect x="0.5" y="0.4" fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="80.3" height="27.2"/>'
					+'<g>'
						+'<rect x="28.6" y="9.8" fill="none" width="68.2" height="29.8"/>'
						+'<text transform="matrix(1 0 0 1 28.5552 17.8945)" fill="#FFFFFF" font-size="12.1205">'+text+'</text>'
					+'</g>'
					+'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9 	"/>'
				+'</g>'
			+'</svg>');
}
