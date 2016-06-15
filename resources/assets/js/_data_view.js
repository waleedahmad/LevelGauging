$( "#datefrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
$( "#dateto" ).datepicker({ dateFormat: 'yy-mm-dd' });


$(".refresh-levels-btn, .update-levels").on('click', function(){
    console.log("Update Levels");

    $.ajax({
        type : 'GET',
        url : 'http://31.53.122.159:8080/',
        //dataType: 'jsonp',
        success : function(res){
            var data = JSON.parse(res);
            console.log(data);
            $(".arduino-levels").empty();
            $("#levels .sfl .level").text(data[0][0]);
            $("#levels .litres .level").text(data[1][1]);


            for(var i = 0; i< data.length ; i++){
                console.log(data[i][i]);
                $(".arduino-levels").append('<div>'+data[i][i]+'</div>');
            }
        }
    });
});