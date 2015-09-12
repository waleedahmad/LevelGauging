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