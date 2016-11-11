'use strict';

angular.module('setratadevinos.comApp')
	.controller('ProductosCtrl', function ($scope, productsServices) {
	
	$scope.wines;
	
	productsServices.getProducts().success(function(data){
		$scope.wines = data;
	});
	
});
