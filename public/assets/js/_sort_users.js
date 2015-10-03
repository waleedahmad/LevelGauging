var SortUsers = function(){

	this.getAction = function($target){
		return $($target).attr('data-action');
	}

	this.handleSortEvent = function(e){
		var context = 	e.data.context,
			action 	=	context.getAction(this);
		context.sortUsersList(action, context);
		context.removeActiveMarkup();
		context.addActiveMarkup(this);
	};

	this.removeActiveMarkup = function(){
		$(".search-options > span").removeClass('active');
	};

	this.addActiveMarkup = function($target){
		$($target).addClass('active');
	};

	this.unSortList = function(){
		$(".single-user:hidden").slideDown();
	};

	this.showEnabled = function(){
		$(".single-user[data-status=1]").slideDown();
		$(".single-user[data-status=0]").slideUp();
	};

	this.showDisabled = function(){
		$(".single-user[data-status=0]").slideDown();
		$(".single-user[data-status=1]").slideUp();
	};

	this.sortUsersList = function(action, context){
		switch(action){
			case 'all':
				context.unSortList();
				break;
			case 'enabled':
				context.showEnabled();
				break;
			case 'disabled':
				context.showDisabled();
				break;
			default:
				console.log("No Target");
		}
	};

	this.init = function(){
		$(".search-options > span").on('click', {context : this}, this.handleSortEvent);
	};
};

$(function(){
	var sort_users = new SortUsers();
	sort_users.init();
}());