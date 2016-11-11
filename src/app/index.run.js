(function() {
  'use strict';

  angular
    .module('setratadevinos')
    .run(runBlock);

  /** @ngInject */
  function runBlock($log) {

    $log.debug('runBlock end');
  }

})();
