'use strict';

describe('Controller: BodegaCtrl', function () {

  // load the controller's module
  beforeEach(module('setratadevinos.comApp'));

  var BodegaCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    BodegaCtrl = $controller('BodegaCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
