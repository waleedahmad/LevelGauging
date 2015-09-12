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

	this.init 		=	function(){
		this.attachToggleEvent();
	};
};


$(function(){
	var user_search 	=	new toggleSearch();
	user_search.init();
}());