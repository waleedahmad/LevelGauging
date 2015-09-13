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