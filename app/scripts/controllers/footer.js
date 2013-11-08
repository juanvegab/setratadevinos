'use strict';

angular.module('setratadevinos.comApp')
  .controller('FooterCtrl', function ($scope, productsServices, bodegasServices) {
	
	$scope.wines;
	$scope.bodegas;
	
	productsServices.getProducts().success(function(data){
		$scope.wines = data;
	});
	bodegasServices.getBodegas().success(function(data){
		$scope.bodegas = data;
	});
});