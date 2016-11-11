'use strict';

var setratadevinos = angular.module('setratadevinos.comApp', ['ngSanitize'])
  .config(['$routeProvider', function($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/productos', {
        templateUrl: 'views/productos.html',
        controller: 'ProductosCtrl'
      })
      .when('/productos/:id', {
        templateUrl: 'views/producto.html',
        controller: 'ProductoCtrl'
      })
      .when('/bodegas', {
        templateUrl: 'views/bodegas.html',
        controller: 'BodegasCtrl'
      })
      .when('/bodegas/:id', {
        templateUrl: 'views/bodega.html',
        controller: 'BodegaCtrl'
      })
      .when('/contacto', {
        templateUrl: 'views/contacto.html',
        controller: 'ContactoCtrl'
      })
      .when('/empresa', {
        templateUrl: 'views/empresa.html',
        controller: 'EmpresaCtrl'
      })
      .when('/ofertas', {
        templateUrl: 'views/ofertas.html',
        controller: 'OfertasCtrl'
      })
      .when('/resena', {
        templateUrl: 'views/resena.html',
        controller: 'ResenaCtrl'
      })
      .when('/quienes_somos', {
        templateUrl: 'views/quienes_somos.html',
        controller: 'QuienesSomosCtrl'
      })
      .when('/donde_estamos', {
        templateUrl: 'views/donde_estamos.html',
        controller: 'DondeEstamosCtrl'
      })
      .when('/vendedores', {
        templateUrl: 'views/vendedores.html',
        controller: 'VendedoresCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  }]);
  
setratadevinos.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.useXDomain = true;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
    }
]);