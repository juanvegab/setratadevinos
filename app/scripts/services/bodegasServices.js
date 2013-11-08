'use strict';

angular.module('setratadevinos.comApp').factory('bodegasServices', function ($http) {
	//var url = 'backend/bodegas.json';
	var url = '../admin/backend/manager.php';
	
	return {
		getBodegas: function(){
			return $http.get(url, {action : 10});
		}
	};
});