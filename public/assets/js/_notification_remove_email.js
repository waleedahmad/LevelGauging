$(".remove-notifications").on('click', function(){
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
                $($target).parents('li').slideUp('slow');
            }
        }
    });
});
