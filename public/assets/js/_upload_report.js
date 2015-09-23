var HistoryUpload 	=	 function(){

	this.target = '';

	this.reportUploadDom = '';

	this.setReportUploadDom = function(){
		this.reportUploadDom = $(".client-details > .content > .content-blocks > .bottom > .right");
	}

	this.changeDomCss = function(e){
		var context 	= 	e.data.context;
		context.renderNewStyles(context, this);
	}

	this.showOverLayDom = function($dom){
		$($dom).hide().appendTo(".wrapper").fadeIn('fast');
	}

	this.renderNewStyles = function(context,$target){
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
		$($target).parents('.right').children('.close , .upload').show();
	}

	this.attachRemoveEvents = function(e){
		var context = e.data.context;
		context.renderOriginalCss(context,this);
	}

	this.renderOriginalCss = function(context,$target){
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
	}

	this.setUploadEvent = function(){
		$('#file-upload').change(function() {
		    var filepath = this.value;
		    var m = filepath.match(/([^\/\\]+)$/);
		    var filename = m[1];
		    $('#filename').html(filename);

		    $(".history-form").submit();
		});
	}

	this.setRemoveUploadEvent = function(e){
		var context = e.data.context,
			$target 	=	$(this),
			$id 		=	$($target).attr('data-id');
		context.renderConfirmRemoveForm(context,$id);
	}
	
	this.init = function(){
		this.setReportUploadDom();
		$(this.reportUploadDom).children('.report-upload').on('click', {context : this}, this.changeDomCss);
		$(this.reportUploadDom).children('.close').on('click', {context : this}, this.attachRemoveEvents);
		this.setUploadEvent();
		$(this.reportUploadDom).find('.files > .file > .remove > .delete').on('click', {context : this}, this.setRemoveUploadEvent);
	};
};

$(function(){
	var edit_history = new HistoryUpload();
	edit_history.init();
}());

HistoryUpload.prototype.renderConfirmRemoveForm = function(context,id){
	var $overlay    =   '<div class="overlays">'
                            +'<div class="confirm-remove">'
                                +'<span class="close">'
                                    +'X'
                                +'</span>'
                                +'<h2 style="color:#1376A1;">Report History - Remove</h2>'

                                +'<div class="dialogue" style="background-color: #1376A1;">'
                                    +'<div class="left">'
                                        +'<p>Are you sure you want to remove file from history</p>'
                                    +'</div>'
                                    +'<div class="right">'
                                        +context.getDeleteButton('Update',id)
                                    +'</div>'
                                +'<div>'
                            +'</div>'
                        +'</div>';
    context.showOverLayDom($overlay);
    context.attachRemoveOverlayClose(context);
    context.submitRemoveRequest(context);
}

HistoryUpload.prototype.submitRemoveRequest = function(context){
	$("#d-c-form").on('click', function(){
        var $target =   $(this),
            _id     =   $($target).attr('data-id');

        $.ajax({
			type : 'POST',
			url  : '/delete/history',
			data : {
				id : _id
	 		},
	 		success : function(res){
	 			if(res.status){
	 				context.removeOverLay(context);
	 				context.removeFileDom(_id);
	 			}
	 		}
		});
    });
}

HistoryUpload.prototype.removeFileDom = function(_id){
	$(".file > .remove > .delete[data-id='"+_id+"']").parents('.file').slideUp('slow', function(){
	 	$(this).remove();
	});
}

HistoryUpload.prototype.removeOverLay = function(context){
    $(".overlays").fadeOut('fast', function(e){
        $(this).remove();
    });
}

HistoryUpload.prototype.getDeleteButton   =    function(text,id){
    return('<?xml version="1.0" encoding="utf-8"?>'
            +'<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
            +'<svg version="1.1" id="d-c-form" data-id="'+id+'" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"'
                +'viewBox="0 0 80.8 27.7" enable-background="new 0 0 80.8 27.7" xml:space="preserve">'
                +'<g>'
                    +'<rect x="0.5" y="0.4" fill="#54ACC4" stroke="#F3F8F9" stroke-miterlimit="10" width="80.3" height="27.2"/>'
                    +'<g>'
                        +'<rect x="28.6" y="9.8" fill="none" width="68.2" height="29.8"/>'
                        +'<text transform="matrix(1 0 0 1 28.5552 17.8945)" fill="#FFFFFF" font-size="12.1205">'+text+'</text>'
                    +'</g>'
                    +'<polygon fill="#FFFFFF" points="19.7,14.3 15.4,16.7 11,19.1 11,14.3 11,9.5 15.4,11.9  "/>'
                +'</g>'
            +'</svg>');
}

HistoryUpload.prototype.attachRemoveOverlayClose =    function(context){
    $(".overlays > .confirm-remove > .close").on('click', function(e){
        $(".overlays").fadeOut('fast', function(e){
            $(this).remove();
        });
    });
}