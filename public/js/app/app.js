'use strict';

var app = angular.module('app', [
    'ngRoute',
    'services',
    'controllers'
]);

app.config(function($routeProvider){

    $routeProvider.when('/registration',{
        templateUrl: 'templates/registration.phtml',
        controller: 'auth'
    });
    $routeProvider.when('/login', {
        templateUrl: 'templates/login.phtml',
        controller: 'auth'
    });
    $routeProvider.when('/logout',{
        templateUrl: 'templates/login.phtml',
        controller: 'auth'
    });
    $routeProvider.when('/index',{
        templateUrl: 'templates/index.phtml',
        controller: 'mainController'
    });
    $routeProvider.otherwise({
        templatesUrl: 'templates/index.phtml'
    })
});