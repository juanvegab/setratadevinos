'use strict';

angular.module('setratadevinos.comApp', [])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/productos', {
        templateUrl: 'views/productos.html',
        controller: 'ProductosCtrl'
      })
      .when('/bodegas', {
        templateUrl: 'views/bodegas.html',
        controller: 'BodegasCtrl'
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
      .when('/producto', {
        templateUrl: 'views/producto.html',
        controller: 'ProductoCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
