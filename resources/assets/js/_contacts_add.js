var AddContact 	=	function(){

	this.getContactsCount 	=	 function(){
		return $(".address-list").find(".address").length;
	}

	this.disableAddContact 	=	 function(){
		$("#add-contact").css({
	        'cursor'    :   'not-allowed'
	    });
	}

	this.attachAddContactListner 	=	function(){
		$("#add-contact").on('click', {context : this } , this.addNewContact);
	}

	this.addNewContact 		=	function(e){
		var context 	=	e.data.context;
		context.getOverlayTemplate(context);
	}

	this.getTankId	 	=	function(){
		return $('meta[name=tankid]').attr("content");
	}

	this.getUserId	 	= 	function(){
		return $('meta[name=userid]').attr("content");
	}

	this.appendOverlayToWrapper 	= function($overlay){
		$($overlay).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.init 	=	function(){
		if(this.getContactsCount() > 8){
			this.disableAddContact();
		}else{
			this.attachAddContactListner();
		}
	}
};

$(function(){
	var add_contact 	=	 new AddContact();
	add_contact.init();
}());

AddContact.prototype.getOverlayTemplate 	= 	function(context){
	var tank_id 	=	context.getTankId(),
		user_id 	=	context.getUserId();

	var $overlay 	=	'<div class="overlays">'
							+'<div class="addcontactform">'
								+context.getOverlayHeader({className : 'close'})
								+'<div class="contact-form">'
									+'<form method="post" action="/contacts/add">'
										+'<table>'
											+context.getTableRow({tr:{className:'theader'},td:{className:'spec',label:'Title Header   :',input :{type:'text',name: 'title',id :'title',p_holder:'Contact title'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Name :',input :{type:'text',name: 'name',id :'name',p_holder:'Full name'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Job title : ',input :{type:'text',name: 'job-title',id :'job-title',p_holder:'job title'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Company : ',input :{type:'text',name: 'company',id :'company',p_holder:'Company name'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Telephone 1 :',input :{type:'phone1',name: 'phone1',id :'phone1',p_holder:'Phone'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Telephone 2 : ',input :{type:'text',name: 'phone2',id :'phone2',p_holder:'Phone'}}})
											+context.getTableRow({tr:{className:''},td:{className:'spec',label:'Email : ',input :{type:'text',name: 'email',id :'email',p_holder:'email'}}})
										+'</table>'
										+context.getSubmitButton('Add')
										+'<div class="contact-errors"></div>'
										+'<input type="hidden" name="tankid" value="'+tank_id+'">'
										+'<input type="hidden" name="userid" value="'+user_id+'">'
									+'</form>'
								+'</div>'
							+'</div>'
						+'</div>';
	context.appendOverlayToWrapper($overlay);
	context.attachOverlayClose();
	context.attachFormSubmit();

}

AddContact.prototype.getOverlayHeader 	=	 function(data){
	return('<span class="'+data.className+'">X</span>'
			+'<h2>Contacts - Add</h2>'
			);
}

AddContact.prototype.getTableRow 		=	function(data){
	return ('<tr class="'+data.tr.className+'">'
				+'<td class="'+data.td.className+'">'
					+data.td.label
				+'</td>'
				+'<td>'
					+'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
				+'</td>'
			+'</tr>');
}

AddContact.prototype.attachFormSubmit 	=	 function(){
	$("#s-c-form").on('click', function(e){
		var $title 		=	$.trim($("#title").val()),
			$name		=	$.trim($("#name").val()),
			$j_title  	=	$.trim($("#job-title").val()),
			$company 	=	$.trim($("#company").val()),
			$phone1 	=	$.trim($("#phone1").val()),
            $phone2 	=	$.trim($("#phone2").val()),
            $email 		=	$.trim($("#email").val());

		if(!$title.length || !$name.length || !$j_title.length || !$company.length || !$phone1.length || !$email.length){
			console.log("All Fields Required");
			console.log($title.length , $name.length ,$j_title.length ,$company.length ,$phone1.length ,$email.length);
			$(".contact-errors").text("All fields required.");
		}else{
            $(".contact-form > form").submit();
		}
	});
}

AddContact.prototype.attachOverlayClose = 	function(){
	$(".overlays > .addcontactform > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

AddContact.prototype.getSubmitButton 	=	function(text){
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