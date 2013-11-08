'use strict';

angular.module('setratadevinos.comApp').controller('BodegaCtrl', function ($scope, $routeParams, productsServices, bodegasServices) {
	
	$scope.wines;
	$scope.bodega;
	
	productsServices.getProducts().success(function(data){
		$scope.wines = _.where(data, {id_bodega:$routeParams.id});
	});
	
	bodegasServices.getBodegas().success(function(data){
		$scope.bodega = _.findWhere(data, {id:$routeParams.id});
	});
	
});
