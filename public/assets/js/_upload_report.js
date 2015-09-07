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