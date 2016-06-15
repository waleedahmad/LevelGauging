if ($('.global').length) {
    setTimeout(function() {
        $('.global').fadeOut('slow');
    }, 3000);
}

$(".global .close").on('click', function(){
	$('.global').fadeOut('slow');
});