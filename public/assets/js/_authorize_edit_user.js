var EditClient 	=	 function(){

	this.handleUserEdit 	=	function(e){
		var context 	=	e.data.context;
		context.showEditForm(context,this);
	}

	this.handleUserRemove 	=	function(e){
		var context 	=	e.data.context;
		context.showRemoveForm(context,this);
	}

	this.attachEditEvent 	=	 function(){
		$(".admin-edit-user").on('click', {context : this} , this.handleUserEdit);
		$(".admin-remove-user").on('click', {context : this} , this.handleUserRemove);
	}

	this.init 	=	 function(){
		this.attachEditEvent();
	}
};

$(function(){
	var edit_client 	= new EditClient();
	edit_client.init();
}());

EditClient.prototype.showEditForm 	=	function(context,target){
	var email =	$(target).attr('data-email');

	var $overlay_dom 	=	'<div class="overlays">'
								+'<div class="edit-auth-user">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Sign in access - Edit</h2>'

									+'<div class="edit-auth-user-form">'
										+'<form method="post" action="/user/update">'
											+'<table>'
												+'<tr>'
													+'<td class="spec">'
														+'Access : '
													+'</td>'
													+'<td>'
														+'<select name="access" id="access" required>'
															+'<option value="1">Active</option>'
															+'<option value="0">Disabled</option>'
														+'</select>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Set User ID : '
													+'</td>'
													+'<td>'
														+'<input type="email" name="email" id="email" placeholder="email" required>'
													+'</td>'
												+'</tr>'

												+'<tr>'
													+'<td class="spec">'
														+'Set Password : '
													+'</td>'
													+'<td>'
														+'<input type="password" name="password" id="password" placeholder="new password (optional)" required>'
													+'</td>'
												+'</tr>'
												+'<tr>'
													+'<td class="spec">'
														+'eNotes : '
													+'</td>'
													+'<td class="e-note">'
														+'<textarea name="enote" id="enote" rows="10" cols="50"></textarea>'
													+'</td>'
												+'</tr>'
											+'</table>'

											+context.getSubmitButton('Update')
											+'<div class="form-errors"></div>'
											+'<input type="hidden" name="user-email" value="'+email+'">'

										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
	$($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');
	context.attachOverlayCloseEvent();
	context.getFormFields(context,email);
	context.attachSubmitEvent(context);
}

EditClient.prototype.attachSubmitEvent 	=	function(context){
	$("#s-c-form").on('click', function(e){
		var $access		=	$.trim($("#access").val()),
			$old_email 	=	$("#email").attr('data-oldmail'),
			$email		=	$.trim($("#email").val()),
			$enote		=	$.trim($("#enote").val());
			
			

		if(!$access.length || !$email.length){
			console.log("All Fields Required");
			$(".form-errors").text("All fields required.");
		}else{
			if(!context.validateEmail($email)){
				$(".form-errors").text("Invalid Email.");
			}else{
				console.log()
				if($email === $old_email){
					$(".edit-auth-user-form > form").submit();
				}else{
					context.alreadyExists(context,$email);
				}
				
			}
		}
	});
}

EditClient.prototype.validateEmail 	=	function(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

EditClient.prototype.alreadyExists 	=	function(context,_email){
	$.ajax({
		type : "POST",
		url  : '/user/verify/email',
		data : {
			email  : _email,
		},
		success : function(res){
			context.analyizeAlreadyExists(res);
		}
	});
}

EditClient.prototype.analyizeAlreadyExists 		=	function(res){
	if(res){
		$(".form-errors").text("Email already exist");
	}else{
		$(".edit-auth-user-form > form").submit();
	}
}


EditClient.prototype.attachOverlayCloseEvent 	=	function(){
	$(".overlays > .edit-auth-user > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

EditClient.prototype.getFormFields 	=	 function(context,_email){
	$.ajax({
		type : "POST",
		url  : '/user/details',
		data : {
			email  : _email
		},
		success : function(res){
			context.fillFormFields(context,res);
		}
	});
}

EditClient.prototype.fillFormFields 	=	function(context,res){
	$("#access").val(res.approved);
	$("#email").val(res.email);
	$("#email").attr('data-oldmail',res.email);
	$("#enote").val(res.enote);

}


EditClient.prototype.getSubmitButton 	=	function(text){
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


EditClient.prototype.showRemoveForm	=	function(context,target){
	var email =	$(target).attr('data-email');

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
                                        +context.getDeleteButton('Remove',email)
                                    +'</div>'
                                +'<div>'
                            +'</div>'
                        +'</div>';

    $($overlay).hide().appendTo(".wrapper").fadeIn('fast');
    context.attachRemoveOverlayClose();
    context.submitRemoveRequest();

}

EditClient.prototype.submitRemoveRequest   =   function(){
    $("#d-c-form").on('click', function(){
        var $target =   $(this),
            _email     =   $($target).attr('data-email');

        $.ajax({
            type : 'POST',
            url  : '/user/delete',
            data : {
                email  : _email
            },
            success : function(res){
                if(res){
                	window.location 	=	'http://'+location.host+'/users/authorize';
                }
            }
        });
    });
}

EditClient.prototype.attachRemoveOverlayClose =    function(){
    $(".overlays > .confirm-remove > .close").on('click', function(e){
        $(".overlays").fadeOut('fast', function(e){
            $(this).remove();
        });
    });
}

EditClient.prototype.getDeleteButton   =    function(text,email){
    return('<?xml version="1.0" encoding="utf-8"?>'
            +'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
            +'<svg version="1.1" id="d-c-form" data-email="'+email+'" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
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
