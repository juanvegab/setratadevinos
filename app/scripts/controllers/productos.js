'use strict';

angular.module('setratadevinos.comApp').controller('ProductosCtrl', function ($scope, productsServices) {
	var wines = [];
	
	var updateWines = function(data, status){
		wines = data;
		console.log(wines);
	}
	
	productsServices.getProducts().success(updateWines);
	
});
