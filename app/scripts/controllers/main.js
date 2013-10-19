'use strict';

angular.module('setratadevinos.comApp').controller('MainCtrl', function ($scope, $resource) {
	var wines = $resource('http://setratadevinos.com/admin/backend/gestor.php?action=getProductJson2');
});
