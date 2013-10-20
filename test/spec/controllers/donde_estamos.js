'use strict';

describe('Controller: DondeEstamosCtrl', function () {

  // load the controller's module
  beforeEach(module('setratadevinos.comApp'));

  var DondeEstamosCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    DondeEstamosCtrl = $controller('DondeEstamosCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
