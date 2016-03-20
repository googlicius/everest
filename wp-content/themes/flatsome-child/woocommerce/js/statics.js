var Static = {
	sendRequest : function (data,datatype){
		datatype = ( datatype == '' || typeof(datatype) == 'undefined' ) ? 'html' : datatype;
		var Deferred = jQuery.Deferred();
		var thisInstance = this;

		if(typeof data == 'undefined'){
			console.log("Input Undefined");
			return;
		}

		var type = (typeof data.type == 'undefined') ? 'POST' : data.type;

		jQuery.ajax({
			url : WOO.ajaxurl,
			type: type,
			data: data,
			datatype: datatype,
			success : function (result){
				Deferred.resolve(data,result);
			},
			error: function (err){
				Deferred.reject(err);
			}
		});
		return Deferred.promise();
	},
	
	sendRequestPjax : function(data,datatype){
		datatype = ( datatype == '' || typeof(datatype) == 'undefined' ) ? 'html' : datatype;
		var Deferred = jQuery.Deferred();
		var thisInstance = this;

		if(typeof data == 'undefined'){
			console.log("Input Undefined");
			return;
		}
		
		var params = {
			url : WOO.ajaxurl,
			type: 'GET',
			data: data,
			datatype: datatype,
			success : function (result){
				Deferred.resolve(data,result);
			},
			error: function (err){
				console.log(err);
			}
		};
		if(typeof params.container == 'undefined') params.container = '#pjaxContainer';

		var pjaxContainer = jQuery('#pjaxContainer');
		//Clear contents existing before
		if(params.container == '#pjaxContainer') {
			pjaxContainer.html('');
		}

		jQuery(document).on('pjax:success', function(event, data,status,jqXHR){
			pjaxContainer.html('');
		})
		
		jQuery(document).on('pjax:error', function(event, jqXHR, textStatus, errorThrown){
			pjaxContainer.html('');
		})

		jQuery.pjax(params);
		return Deferred.promise();
	}
}