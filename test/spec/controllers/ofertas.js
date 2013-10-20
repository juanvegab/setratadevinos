'use strict';

describe('Controller: OfertasCtrl', function () {

  // load the controller's module
  beforeEach(module('setratadevinos.comApp'));

  var OfertasCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    OfertasCtrl = $controller('OfertasCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
