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