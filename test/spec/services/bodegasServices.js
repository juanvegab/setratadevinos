'use strict';

describe('Service: bodegasServices', function () {

  // load the service's module
  beforeEach(module('setratadevinos.comApp'));

  // instantiate service
  var bodegasServices;
  beforeEach(inject(function (_bodegasServices_) {
    bodegasServices = _bodegasServices_;
  }));

  it('should do something', function () {
    expect(!!bodegasServices).toBe(true);
  });

});
