'use strict';

describe('Controller: ProductoCtrl', function () {

  // load the controller's module
  beforeEach(module('setratadevinos.comApp'));

  var ProductoCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ProductoCtrl = $controller('ProductoCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
