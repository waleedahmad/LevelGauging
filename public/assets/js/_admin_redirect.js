var adminRedirect 	=	function(){

	this.authLink 	=	'/users/authorize';

	this.settingLink=	'/users/settings';
		
	this.getListCount 	=	function(){
		return $(".sidebar-user > ul > a").length;
	};

	this.getFirstUserLink 	=	function(){
		return $(".sidebar-user > ul > a:first-child").attr('href');
	};
	
	this.forceRedirect 	=	function(url){
		window.location.href 	=	url;
	};
	
	this.getCurrentPath =	function(){
		return window.location.pathname;
	};
	
	this.satisfyRedirect = 	function(){
		if(	this.getListCount() && 
			this.getCurrentPath() != this.getFirstUserLink() && 
			this.getCurrentPath() === this.authLink || 
			this.getCurrentPath() === this.settingLink)
		{
			return true;
		}
		return false;
	};
	
	this.init 	=	function(){
		if(this.satisfyRedirect()){
			this.forceRedirect(this.getFirstUserLink());
		}
	}

};

$(function(){
	checkAdminRedirect 	=	new adminRedirect();
	checkAdminRedirect.init();
}());