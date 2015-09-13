var adminRedirect 	=	function(){

	this.authLink 	=	'/users/authorize';

	this.settingLink=	'/users/settings';
		
	this.getListCount 	=	function(){
		return $(".sidebar-user > ul > a").length;
	};

	this.getFirstUserLink 	=	function(){
		return $(".sidebar-user > ul > a:first-child").attr('href');
	};
	
	this.forceRedirect 	=	function(url){
		window.location.href 	=	url;
	};
	
	this.getCurrentPath =	function(){
		return window.location.pathname;
	};
	
	this.satisfyRedirect = 	function(){
		if(	this.getListCount() && 
			this.getCurrentPath() != this.getFirstUserLink() && 
			this.getCurrentPath() === this.authLink || 
			this.getCurrentPath() === this.settingLink)
		{
			return true;
		}
		return false;
	};
	
	this.init 	=	function(){
		if(this.satisfyRedirect()){
			this.forceRedirect(this.getFirstUserLink());
		}
	}

};

$(function(){
	checkAdminRedirect 	=	new adminRedirect();
	checkAdminRedirect.init();
}());
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
var EditContact     =   function(){

    this.uncheckAllExceptTarget         =   function($target){
        $('.contact-checkbox').not($target).prop('checked', false);
    };

    this.handleContactBoxTrigger        =   function(e){
        var context     =   e.data.context,
            $id         =   $(this).attr('data-id');
        context.uncheckAllExceptTarget(this);

        if(context.getCheckCount()){
            context.allowActionButtons(context ,this, $id);
        }else{
            context.restrictAllowButtons(context,this , $id);
        }
    };

    this.allowActionButtons = function(context,target, $id){
        context.setAllowCursor();
        context.setDataAttributes($id);
        context.bindActions(context);
    };

    this.restrictAllowButtons   =   function(context,target, $id){
        context.setRestrictCursor();
        context.removeDataAttributes();
        context.unBindActions(context);
    };

    this.bindActions        =   function(context){
        $("#edit-contact").on('click', {context : context}  ,context.editTankContact);
        $("#remove-contact").on('click', {context : context} ,  context.removeTankContact);
    };

    this.unBindActions      =   function(context){
        $("#edit-contact").unbind('click', context.editTankContact);
        $("#remove-contact").unbind('click',context.removeTankContact);
    };

    this.appendOverlayToWrapper     = function($overlay){
        $($overlay).hide().appendTo(".wrapper").fadeIn('fast');
    }

    this.setAllowCursor =   function(){
        $("#edit-contact, #remove-contact").css({
            'cursor'    :   'pointer'
        });
    };

    this.setRestrictCursor  =   function(){
        $("#edit-contact, #remove-contact").css({
            'cursor'    :   'not-allowed'
        });
    };

    this.setDataAttributes=  function($id){
        $("#edit-contact").attr('data-id',$id);
        $("#remove-contact").attr('data-id',$id);
    };

    this.removeDataAttributes  =   function(){
        $("#edit-contact").attr('data-id'   ,'');
        $("#remove-contact").attr('data-id' ,'');
    };

    this.getCheckCount  =   function(){
        return $('.contact-checkbox:checked').length;
    };

    this.attachCheckBoxesEventHandlers  =    function(){
        $(".contact-checkbox").on('click', {context : this}, this.handleContactBoxTrigger);
    };

    this.getTankId  =    function(){
        return $('meta[name=tankid]').attr("content");
    }

    this.getUserId  =    function(){
        return $('meta[name=userid]').attr("content");
    }

    this.init   =   function(){
        this.attachCheckBoxesEventHandlers();
    };
};

$(function(){
    edit_contact    =    new EditContact();
    edit_contact.init();
}());


EditContact.prototype.editTankContact    =    function(e){
    var context     =   e.data.context,
        tank_id     =   context.getTankId(),
        user_id     =   context.getUserId(),
        id          =   $(this).attr('data-id');

    var $overlay    =   '<div class="overlays">'
                            +'<div class="addcontactform">'
                                +context.getOverlayHeader({className : 'close'})
                                +'<div class="contact-form">'
                                    +'<form method="post" action="/contacts/update">'
                                        +'<table>'
                                            +context.getTableRow({tr:{className:'theader'},td:{className:'spec',label:'Title Header   :',input :{type:'text',name: 'title',id :'title',p_holder:'Contact title'}}})
                                            +context.getTableRow({tr:{className:''},td:{className:'spec',label:'Name :',input :{type:'text',name: 'name',id :'name',p_holder:'Full name'}}})
                                            +context.getTableRow({tr:{className:''},td:{className:'spec',label:'Job title : ',input :{type:'text',name: 'job-title',id :'job-title',p_holder:'job title'}}})
                                            +context.getTableRow({tr:{className:''},td:{className:'spec',label:'Company : ',input :{type:'text',name: 'company',id :'company',p_holder:'Company name'}}})
                                            +context.getTableRow({tr:{className:''},td:{className:'spec',label:'Telephone 1 :',input :{type:'phone1',name: 'phone1',id :'phone1',p_holder:'Phone'}}})
                                            +context.getTableRow({tr:{className:''},td:{className:'spec',label:'Telephone 2 : ',input :{type:'text',name: 'phone2',id :'phone2',p_holder:'Phone'}}})
                                            +context.getTableRow({tr:{className:''},td:{className:'spec',label:'Email : ',input :{type:'text',name: 'email',id :'email',p_holder:'email'}}})
                                        +'</table>'
                                        +context.getSubmitButton('Update')
                                        +'<div class="contact-errors"></div>'
                                        +'<input type="hidden" name="tankid" value="'+tank_id+'">'
                                        +'<input type="hidden" name="userid" value="'+user_id+'">'
                                        +'<input type="hidden" name="id" value="'+id+'">'
                                    +'</form>'
                                +'</div>'
                            +'</div>'
                        +'</div>';
    context.appendOverlayToWrapper($overlay);
    context.attachOverlayClose(context);
    context.attachFormSubmit();
    context.getFormFields(context,id);
}

EditContact.prototype.getFormFields  =   function(context,_id){
    $.ajax({
        type : 'POST',
        url  : '/contacts/details',
        data : {
            id  :   _id
        },
        success : function(res){
            context.setFormFields(res);
        }
    });
};

EditContact.prototype.setFormFields     =   function(res){
    $("#title").val(res.title);
    $("#name").val(res.name);
    $("#job-title").val(res.job_title);
    $("#company").val(res.company);
    $("#phone1").val(res.telephone_1);
    $("#phone2").val(res.telephone_2);
    $("#email").val(res.email);
    $("#email").val(res.email);
};

EditContact.prototype.getOverlayHeader   =    function(data){
    return('<span class="'+data.className+'">X</span>'
            +'<h2>Contacts - Add</h2>'
            );
}

EditContact.prototype.getTableRow        =   function(data){
    return ('<tr class="'+data.tr.className+'">'
                +'<td class="'+data.td.className+'">'
                    +data.td.label
                +'</td>'
                +'<td>'
                    +'<input type="'+data.td.input.type+'" name="'+data.td.input.name+'" id="'+data.td.input.id+'" placeholder="'+data.td.input.p_holder+'" required>'
                +'</td>'
            +'</tr>');
}

EditContact.prototype.attachFormSubmit   =    function(){
    $("#s-c-form").on('click', function(e){
        var $title      =   $.trim($("#title").val()),
            $name       =   $.trim($("#name").val()),
            $j_title    =   $.trim($("#job-title").val()),
            $company    =   $.trim($("#company").val()),
            $phone1     =   $.trim($("#phone1").val()),
            $phone2     =   $.trim($("#phone2").val()),
            $email      =   $.trim($("#email").val());

        if(!$title.length || !$name.length || !$j_title.length || !$company.length || !$phone1.length || !$email.length){
            console.log("All Fields Required");
            console.log($title.length , $name.length ,$j_title.length ,$company.length ,$phone1.length ,$email.length);
            $(".contact-errors").text("All fields required.");
        }else{
            $(".contact-form > form").submit();
        }
    });
}

EditContact.prototype.attachOverlayClose =   function(context){
    $(".overlays > .addcontactform > .close").on('click', function(e){
        $(".overlays").fadeOut('fast', function(e){
            $(this).remove();
        });
    });
    context.unBindActions(context);
    context.setRestrictCursor();
    context.uncheckAllExceptTarget('');
}

EditContact.prototype.getSubmitButton    =   function(text){
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
                    +'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9  "/>'
                +'</g>'
            +'</svg>');
}

EditContact.prototype.removeTankContact  =    function(e){
    var context     =   e.data.context,
        id          =   $(this).attr('data-id');

    var $overlay    =   '<div class="overlays">'
                            +'<div class="confirm-remove">'
                                +'<span class="close">'
                                    +'X'
                                +'</span>'
                                +'<h2>Contacts - Remove</h2>'

                                +'<div class="dialogue">'
                                    +'<div class="left">'
                                        +'<p>Are you sure you want to remove contact from this list</p>'
                                    +'</div>'
                                    +'<div class="right">'
                                        +context.getDeleteButton('Update',id)
                                    +'</div>'
                                +'<div>'
                            +'</div>'
                        +'</div>';
    context.appendOverlayToWrapper($overlay);
    context.attachRemoveOverlayClose(context);
    context.submitRemoveRequest();
};

EditContact.prototype.attachRemoveOverlayClose =    function(context){
    $(".overlays > .confirm-remove > .close").on('click', function(e){
        $(".overlays").fadeOut('fast', function(e){
            $(this).remove();
        });
    });
    context.unBindActions(context);
    context.setRestrictCursor();
    context.uncheckAllExceptTarget('');
}

EditContact.prototype.submitRemoveRequest   =   function(){
    $("#d-c-form").on('click', function(){
        var $target =   $(this),
            _id     =   $($target).attr('data-id');

        $.ajax({
            type : 'POST',
            url  : '/contacts/delete',
            data : {
                id  : _id
            },
            success : function(res){
                if(res.status){
                    location.reload(true);
                }
            }
        });
    });
}

EditContact.prototype.getDeleteButton   =    function(text,id){
    return('<?xml version="1.0" encoding="utf-8"?>'
            +'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
            +'<svg version="1.1" id="d-c-form" data-id="'+id+'" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
                +'viewBox="0 0 80.8 27.7" enable-background="new 0 0 80.8 27.7" xml:space="preserve">'
                +'<g>'
                    +'<rect x="0.5" y="0.4" fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="80.3" height="27.2"/>'
                    +'<g>'
                        +'<rect x="28.6" y="9.8" fill="none" width="68.2" height="29.8"/>'
                        +'<text transform="matrix(1 0 0 1 28.5552 17.8945)" fill="#FFFFFF" font-size="12.1205">'+text+'</text>'
                    +'</g>'
                    +'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9  "/>'
                +'</g>'
            +'</svg>');
}
$( "#datefrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
$( "#dateto" ).datepicker({ dateFormat: 'yy-mm-dd' });

$(".edit-tank-inspection").on('click', function(){
	var $target 	=	$(this),
		$id 		=	$($target).attr('data-tankid'),
		user_id 	=   $('meta[name=userid]').attr("content");

	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="editinspection">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Tank Inspection - Edit</h2>'

									+'<div class="inspection-form">'
										+'<form method="post" action="/inspection/edit">'
											+'<table class="upper">'
												+'<tr>'
													+'<td class="spec">'
														+'Contractor : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="contractor" id="contractor" placeholder="Contractor name" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Telephone : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="telephone" id="telephone" placeholder="Telephone number" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Email : '
													+'</td>'
													+'<td>'
														+'<input type="email" name="email" id="email" placeholder="email" required>'
													+'</td>'
												+'</tr>'
											+'</table>'

											+'<div class="bottom">'
												+'<table>'
													+'<tr>'
														+'<td class="spec">'
															+'Date Inspected : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="d-inspected" id="date-inspected" placeholder="Date Inspected" required></p>'
														+'</td>'
													+'</tr>'

													+'<tr>'
														+'<td class="spec">'
															+'Date Cleaned : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="d-cleaned" id="date-cleaned" placeholder="Date Cleaned" required></p>'
														+'</td>'
													+'</tr>'

													+'<tr class="last">'
														+'<td class="spec">'
															+'Next Inspection Due : '
														+'</td>'
														+'<td>'
															+'<input type="text" name="d-next-inspection" id="next-inspection" placeholder="Next Inspection Date" required></p>'
														+'</td>'
													+'</tr>'
												+'</table>'
											+'</div>'

											+getInspectionEditButton('#1376A1','Update')

											+'<div class="reporting-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+$id+'">'
											+'<input type="hidden" name="userid" value="'+user_id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
	$($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');
	addInspectEditOverlayCloseEvent();
	date_time_inspection_datepickers();
	attactInspectionEditSubmit();
	fillInspectionDetailFields($id);
});


function getInspectionEditButton(color,text){
	return('<?xml version="1.0" encoding="utf-8"?>'
			+'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
			+'<svg version="1.1" id="t-i-form" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
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

function addInspectEditOverlayCloseEvent(){
	$(".overlays > .editinspection > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

function date_time_inspection_datepickers(){
	$( "#date-inspected,#date-cleaned, #next-inspection" ).datepicker({ dateFormat: 'yy-mm-dd' });
}

function attactInspectionEditSubmit(){
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
			if(!validateEmail($email)){
				$(".reporting-errors").text("Invalid Email.");
			}else{
				var tankid	=	$('meta[name=tankid]').attr("content");
				$(".inspection-form > form").submit();
			}
		}
	});
}

function fillInspectionDetailFields(id){
	$.ajax({
		type : "POST",
		url  : '/inspection/details',
		data : {
			tankid  : id
		},
		success : function(res){
			fillInspectionFormWithResponse(res);
		}
	});
}

function fillInspectionFormWithResponse(res){
	$("#contractor").val(res.contractor);
	$("#telephone").val(res.phone);
	$("#email").val(res.email);
	$("#date-inspected").val(res.date_inspected);
	$("#date-cleaned").val(res.date_cleaned);
	$("#next-inspection").val(res.next_inspection);
}
$(".edit-tank-location").on('click', function(){
	var $target 	=	$(this),
		$id 		=	$($target).attr('data-tankid'),
		user_id 	=   $('meta[name=userid]').attr("content");

	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="editlocation">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Location - Edit</h2>'

									+'<div class="location-form">'
										+'<form method="post" action="/location/edit">'
											+'<table>'
												+'<tr>'
													+'<td class="spec">'
														+'Name : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="name" id="name" placeholder="Name or Airport or Place" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Airport code : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="airportcode" id="airportcode" placeholder="IATA Code, If Applicable" required>'
													+'</td>'
												+'</tr>'


												+'<tr>'
													+'<td class="spec">'
														+'Address :'
													+'</td>'
													+'<td>'
														+'<input type="text" name="street1" id="street1" placeholder="Street 1" required>'
													+'</td>'
												+'</tr>'
												+'<tr>'
													+'<td class="spec">'
														
													+'</td>'
													+'<td>'
														+'<input type="text" name="street2" id="street2" placeholder="Street 2" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														
													+'</td>'
													+'<td>'
														+'<input type="text" name="city" id="city" placeholder="City" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														
													+'</td>'
													+'<td>'
														+'<input type="text" name="region" id="region" placeholder="Region" required>'
														+'<input type="text" name="postcode" id="postcode" placeholder="Post code" required>'
													+'</td>'
												+'</tr>'
												+'<tr>'
													+'<td class="spec">'
														
													+'</td>'
													+'<td>'
														+'<input type="text" name="country" id="country" placeholder="Country" required>'
													+'</td>'
												+'</tr>'
											+'</table>'

											+getInspectionEditButton('#788838','Update')

											+'<div class="reporting-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+$id+'">'
											+'<input type="hidden" name="userid" value="'+user_id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
	$($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');
	addLocationEditOverlayCloseEvent();
	fillLocationFormFields($id);
	attactLocationEditSubmit();
});

function addLocationEditOverlayCloseEvent(){
	$(".overlays > .editlocation > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

function fillLocationFormFields(id){
	$.ajax({
		type : "POST",
		url  : '/location/details',
		data : {
			tankid  : id
		},
		success : function(res){
			fillLocationFormWithResponse(res);
		}
	});
}

function attactLocationEditSubmit(){
	$("#t-i-form").on('click', function(e){
		$(".location-form > form").submit();
	});
}

function fillLocationFormWithResponse(res){
	$("#name").val(res.location_name);
	$("#airportcode").val(res.airport_code);
	$("#street1").val(res.street1);
	$("#street2").val(res.street2);
	$("#city").val(res.city);
	$("#region").val(res.region);
	$("#postcode").val(res.postcode);
	$("#country").val(res.country);
}
$(".edit-tank-specs").on('click', function(){
	var $target 	=	$(this),
		$id 		=	$($target).attr('data-tankid'),
		user_id         =   $('meta[name=userid]').attr("content");

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

												+'<tr>'
													+'<td class="spec">'
														+'Markings ID : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="markingid" id="markingid" placeholder="Marking ID" required>'
													+'</td>'
												+'</tr>'

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

											+getInspectionEditButton('#788838','Update')

											+'<div class="reporting-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+$id+'">'
											+'<input type="hidden" name="userid" value="'+user_id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
	$($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');
	addSpecsEditOverlayCloseEvent();
	fillSpecsFormFields($id);
	attactSpecsEditSubmit();
});

function addSpecsEditOverlayCloseEvent(){
	$(".overlays > .editspecs > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

function attactSpecsEditSubmit(){
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
}

function fillSpecsFormFields(id){
	$.ajax({
		type : "POST",
		url  : '/specifications/details',
		data : {
			tankid  : id
		},
		success : function(res){
			fillSpecsFormWithResponse(res);
		}
	});
}

function fillSpecsFormWithResponse(res){
	$("#fuelgrade").val(res.fuel_grade);
	$("#markingid").val(res.marking_id);
	$("#tankshape").val(res.shape);
	$("#titled").val(res.titled);
	$("#internal").val(res.internal);
}
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
		header 			=	'',
		user_id         =   $('meta[name=userid]').attr("content");
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
											+'<input type="hidden" name="userid" value="'+user_id+'">'
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
		header 			=	'',
		user_id         =   $('meta[name=userid]').attr("content");

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
											+'<input type="hidden" name="userid" value="'+user_id+'">'
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
var toggleSearch 	=	function(){

	this.hasClass 	=	 function(className){
		return $(".toggel-user-search").hasClass(className);
	}

	this.addClass 	=	 function(className){
		$(".toggel-user-search").addClass(className);
	}

	this.removeClass= 	function(className){
		$(".toggel-user-search").removeClass(className);
	}

	this.showSearchOptions 	= function(){
		$(".search-options").slideDown();
	}

	this.hideSearchOptions 	= function(){
		$(".search-options").slideUp();
	}

	this.handleSearchToggle =	function(e){
		var context 	= 	e.data.context;
	
		if(context.hasClass('glyphicon-option-horizontal')){

			context.removeClass('glyphicon-option-horizontal');
			context.addClass('glyphicon-option-vertical');
			context.showSearchOptions();

		}else if(context.hasClass('glyphicon-option-vertical')){

			context.removeClass('glyphicon-option-vertical');
			context.addClass('glyphicon-option-horizontal');
			context.hideSearchOptions();
		}
	};

	this.attachToggleEvent 	=	function(){
		$(".toggel-user-search").on('click', {context : this}, this.handleSearchToggle);
	};

	this.init 		=	function(){
		this.attachToggleEvent();
	};
};


$(function(){
	var user_search 	=	new toggleSearch();
	user_search.init();
}());