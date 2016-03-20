var product_cat = {
	/**
	 * by haidang009 Function to get variable in url
	 * @return : object - varialble of GET
	 */
	getUrlVars : function(url) {
		if(typeof url === 'undefined')
			var href = window.location.href;
		else{
			var href = url;
			if(href.indexOf('?') == '-1')
				href = "?" + href;
		}

		var vars = {};
		var parts = href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
		});
		return vars;
	},

	triggerLoadMore : function(e){
		var thisInstance = this;
		var current_product_category = jQuery(e).closest('ul').data('category');
		var params = {action : "load_more_products",page:2,cat:current_product_category}
		Static.sendRequest(params).then(function(params,result){
			console.log(result);
		});
	},

	registerNiceScroll : function(){		
		var productSidebarContainer = jQuery("#shop-sidebar");
		var UL = productSidebarContainer.find('.widget_layered_nav>ul');
		UL.niceScroll();
	},

	// Click vào sidebar
	registerLayeredNavClick : function(){
		var thisInstance = this;
		jQuery(".widget_layered_nav ul li a").on('click', function(e){
			var href = jQuery(this).attr('href');
			console.log(JSON.stringify(thisInstance.getUrlVars(href)));
			var ajax_params = {action: 'get_product_from_layerednav', filter: JSON.stringify(thisInstance.getUrlVars(href))};
			Static.sendRequest(ajax_params).then(
				function(ajax_params,result){
					console.log(result);
				},
				function(err){
					console.log(err);
				}
			);
			return false;
		});
	},

	registerEvents : function(){
		this.registerNiceScroll();
		//this.registerLayeredNavClick();
	}
};


jQuery(document).ready(function(){
	product_cat.registerEvents();
});