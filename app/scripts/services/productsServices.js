'use strict';

angular.module('setratadevinos.comApp').factory('productsServices', function ($http) {
	var url = '/backend/manager.php';
	return {
	
		getProducts: function(){
			return $http.get(url, {
				action : 9
			});
		}
		
		
		
	};
});