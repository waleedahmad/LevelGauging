TankNotifications.prototype.renderConfirmRemoveForm = function(context,id){
    var $overlay    =   '<div class="overlays">'
                            +'<div class="confirm-remove">'
                                +'<span class="close">'
                                    +'X'
                                +'</span>'
                                +'<h2>Contacts - Remove</h2>'

                                +'<div class="dialogue">'
                                    +'<div class="left">'
                                        +'<p>Are you sure you want to remove email from list</p>'
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

TankNotifications.prototype.attachRemoveOverlayClose =    function(context){
    $(".overlays > .confirm-remove > .close").on('click', function(e){
        $(".overlays").fadeOut('fast', function(e){
            $(this).remove();
        });
    });
}

TankNotifications.prototype.removeOverLay = function(context){
    $(".overlays").fadeOut('fast', function(e){
        $(this).remove();
    });
    context.forceRefresh();
}

TankNotifications.prototype.forceRefresh = function(){
    location.reload(true);
}

TankNotifications.prototype.submitRemoveRequest   =   function(context){
    $("#d-c-form").on('click', function(){
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
                    context.removeOverLay(context);
                }
            }
        });
    });
}


TankNotifications.prototype.getDeleteButton   =    function(text,id){
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

