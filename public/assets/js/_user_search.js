var toggleSearch 	=	function(){

	this.hasClass 	=	 function(className){
		return $(".toggel-user-search").hasClass(className);
	}

	this.addClass 	=	 function(className){
		$(".toggel-user-search").addClass(className);
	}

	this.removeClass= 	function(className){
		$(".toggel-user-search").removeClass(className);
	}

	this.showSearchOptions 	= function(){
		$(".search-options").slideDown();
	}

	this.hideSearchOptions 	= function(){
		$(".search-options").slideUp();
	}

	this.handleSearchToggle =	function(e){
		var context 	= 	e.data.context;
	
		if(context.hasClass('glyphicon-option-horizontal')){

			context.removeClass('glyphicon-option-horizontal');
			context.addClass('glyphicon-option-vertical');
			context.showSearchOptions();

		}else if(context.hasClass('glyphicon-option-vertical')){

			context.removeClass('glyphicon-option-vertical');
			context.addClass('glyphicon-option-horizontal');
			context.hideSearchOptions();
		}
	};

	this.attachToggleEvent 	=	function(){
		$(".toggel-user-search").on('click', {context : this}, this.handleSearchToggle);
	};

	this.getSearchQuery 	=	function(){
		return $(".user-search").val();
	}

	this.getQueryLength 	=	function(){
		return $.trim($(".user-search").val()).length;
	}

	this.getSearchResults 	=	function(e){
		var context 	=	e.data.context;
		if(context.getQueryLength()){
			var query 	=	context.getSearchQuery();
			context.requestResults(query,context);
		}else{
			context.emptySearchList();
			context.hideSearchResults();
		}
	}

	this.requestResults 	=	function(q,context){
		$.ajax({
			type : 'POST',
			url  : '/user/search',
			data : {
				search : q
			},
			success : function(res){
				context.emptySearchList();
				context.renderSearchResults(res,context);
			}
		});
	}

	this.renderSearchResults 	=	 function(res,context){
		if(res.length){
			for(var i = 0 ; i < res.length ; i++){
				var dom 	= 	"<a class='result' href='/users/"+res[i]+"/authorize'>"
									+"<li>"
										+"<span class='glyphicon glyphicon-user' aria-hidden='true'></span>"
										+"<span class='email'>"+res[i].substring(0,15)+"</span>"
									+"</li>"
								+"</a>";
				$(dom).appendTo('.search-results');
				$('.search-results').slideDown();
			}
		}else{
			var dom 	= "<span class='message'>No Results</span>";
			$(dom).appendTo('.search-results');
		}
	}

	this.emptySearchList 	=	function(){
		$('.search-results > .result').remove();
		$('.search-results > .message').remove();
	}

	this.hideSearchResults 	= 	function(){
		$('.search-results').hide();
	}

	this.initRealTimeSearch =	function(){
		$(".user-search").on('keyup', {context : this}, this.getSearchResults);
	}

	this.init 		=	function(){
		this.attachToggleEvent();
		this.initRealTimeSearch();
	};
};


$(function(){
	var user_search 	=	new toggleSearch();
	user_search.init();
}());