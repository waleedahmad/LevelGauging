$(".contact-checkbox").on('click', function(e){
    var $target     =   $(this),
        $id         =   $($target).attr('data-id');

    $('.contact-checkbox').not($target).prop('checked', false);

    if($('.contact-checkbox:checked').length){
        $("#edit-contact, #remove-contact").css({
            'cursor'    :   'pointer'
        });

        $("#edit-contact").attr('data-id',$id);
        $("#remove-contact").attr('data-id',$id);

        $("#edit-contact").on('click', editTankContact);
        $("#remove-contact").on('click', removeTankContact);

    }else{
        $("#edit-contact, #remove-contact").css({
            'cursor'    :   'not-allowed'
        });

        $("#edit-contact").attr('data-id','');
        $("#remove-contact").attr('data-id','');
        $("#edit-contact").unbind('click', editTankContact);
        $("#remove-contact").unbind('click', removeTankContact);
    }
});

function removeTankContact(){
    var id              =   $(this).attr('data-id');

    var $overlay_dom       =   '<div class="overlays">'
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
                                                +getContactDeleteAddButton('Update',id)
                                            +'</div>'
                                        +'<div>'
                                    +'</div>'
                                +'</div>';
    $($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');

    addContactsRemoveOverlayCloseEvent();
    addContactRemoveSubmitEvent();
}

function addContactsRemoveOverlayCloseEvent(){
    $(".overlays > .confirm-remove > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
    removeEditRemoveButtonEvents();
}

function addContactRemoveSubmitEvent(){
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

function editTankContact(){
    var tankid          =	$('meta[name=tankid]').attr("content"),
        id              =   $(this).attr('data-id');

    var $overlay_dom       =   '<div class="overlays">'
								+'<div class="addcontactform">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Contacts - Add</h2>'

									+'<div class="contact-form">'
										+'<form method="post" action="/contacts/update">'
											+'<table>'
												+'<tr class="theader">'
													+'<td class="spec">'
														+'Title Header :  '
													+'</td>'
													+'<td>'
														+'<input type="text" name="title" id="title" placeholder="contact title" required>'
													+'</td>'
												+'</tr>'

                                                +'<tr>'
													+'<td class="spec">'
														+'Name : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="name" id="name" placeholder="full name" required>'
													+'</td>'
												+'</tr>'

                                                +'<tr>'
													+'<td class="spec">'
														+'Job title : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="job-title" id="job-title" placeholder="job title" required>'
													+'</td>'
												+'</tr>'

                                                +'<tr>'
													+'<td class="spec">'
														+'Company : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="company" id="company" placeholder="company name" required>'
													+'</td>'
												+'</tr>'

                                                +'<tr>'
													+'<td class="spec">'
														+'Telephone 1 : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="phone1" id="phone1" placeholder="phone" required>'
													+'</td>'
												+'</tr>'

                                                +'<tr>'
													+'<td class="spec">'
														+'Telephone 2 : '
													+'</td>'
													+'<td>'
														+'<input type="text" name="phone2" id="phone2" placeholder="phone" required>'
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

                                            +getContactAddButton('Update')

											+'<div class="contact-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+tankid+'">'
                                            +'<input type="hidden" name="id" value="'+id+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
    $($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');

    addContactsEditOverlayCloseEvent();
    attactContactFormSubmitEvent();
    getDetailsAndFillContactFields(id);
}

function getDetailsAndFillContactFields(_id){
    $.ajax({
        type : 'POST',
        url  : '/contacts/details',
        data : {
            id  :   _id
        },
        success : function(res){
            handleContactFieldsResponse(res);
        }
    });
}

function handleContactFieldsResponse(res){
    $("#title").val(res.title);
    $("#name").val(res.name);
    $("#job-title").val(res.job_title);
    $("#company").val(res.company);
    $("#phone1").val(res.telephone_1);
    $("#phone2").val(res.telephone_2);
    $("#email").val(res.email);
    $("#email").val(res.email);
}

function addContactsEditOverlayCloseEvent(){
	$(".overlays > .addcontactform > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});

    removeEditRemoveButtonEvents();
}

function removeEditRemoveButtonEvents(){
    $('.contact-checkbox').prop('checked', false);
    $("#edit-contact").unbind('click', editTankContact);
    $("#remove-contact").unbind('click', removeTankContact);
    $("#edit-contact, #remove-contact").css({
        'cursor'    :   'not-allowed'
    });
}

function getContactDeleteAddButton(text , id){
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
					+'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9 	"/>'
				+'</g>'
			+'</svg>');
}
