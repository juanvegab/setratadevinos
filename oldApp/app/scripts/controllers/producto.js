'use strict';

angular.module('setratadevinos.comApp').controller('ProductoCtrl', function ($scope, $routeParams, productsServices) {
	
	$scope.wines;
	$scope.wine;
	
	productsServices.getProducts().success(function(data){
		$scope.wines = data;
		$scope.wine = _.findWhere($scope.wines, {id: $routeParams.id});
	});
});
