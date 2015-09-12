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