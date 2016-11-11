'use strict';

angular.module('setratadevinos.comApp').controller('BodegasCtrl', function ($scope, $routeParams, bodegasServices, productsServices) {
	$scope.bodegas;
	
	bodegasServices.getBodegas().success(function(data){
		$scope.bodegas = data;
	});
});
