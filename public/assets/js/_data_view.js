$( "#datefrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
$( "#dateto" ).datepicker({ dateFormat: 'yy-mm-dd' });


$(".update-levels").on('click', function(){
    console.log("Update Levels");

    $.ajax({
        type : 'GET',
        url : 'http://31.53.122.159:8080/',
        dataType: 'jsonp',
        success : function(res){
            console.log(res);
        }
    });
});