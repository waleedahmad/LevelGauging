var contact_count  =   $(".address-list").find(".address").length;

if(contact_count > 8){
    $("#add-contact").css({
        'cursor'    :   'not-allowed'
    });
}else{
    $("#add-contact").on('click', newTankContact);
}

function newTankContact(e){
    var tankid	          =	$('meta[name=tankid]').attr("content");

    var $overlay_dom       =   '<div class="overlays">'
								+'<div class="addcontactform">'
									+'<span class="close">'
										+'X'
									+'</span>'
									+'<h2>Contacts - Add</h2>'

									+'<div class="contact-form">'
										+'<form method="post" action="/contacts/add">'
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

                                            +getContactAddButton('Add')

											+'<div class="contact-errors"></div>'
											+'<input type="hidden" name="tankid" value="'+tankid+'">'
										+'</form>'
									+'</div>'
								+'</div>'
					        +'</div>';
    $($overlay_dom).hide().appendTo(".wrapper").fadeIn('fast');

    addContactsOverlayCloseEvent();
    attactContactFormSubmitEvent();
}

function attactContactFormSubmitEvent() {
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
			$(".contact-errors").text("All fields required.");
		}else{
            $(".contact-form > form").submit();
		}
	});
}

function addContactsOverlayCloseEvent(){
	$(".overlays > .addcontactform > .close").on('click', function(e){
		$(".overlays").fadeOut('fast', function(e){
			$(this).remove();
		});
	});
}

function getContactAddButton(text){
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
