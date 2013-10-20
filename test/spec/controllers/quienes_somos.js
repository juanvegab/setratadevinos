'use strict';

describe('Controller: QuienesSomosCtrl', function () {

  // load the controller's module
  beforeEach(module('setratadevinos.comApp'));

  var QuienesSomosCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    QuienesSomosCtrl = $controller('QuienesSomosCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
