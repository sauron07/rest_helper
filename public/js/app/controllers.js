'use strict';

var controllers = angular.module('controllers', []);

controllers.controller ('mainController', ['$scope', '$location', 'AuthService', function($scope, $location, AuthService){
    $scope.auth = AuthService;

    if($scope.auth.user == null){
        $location.path('/login');
    }

}]);

controllers.controller('auth', ['$scope', '$location', 'APIService', 'AuthService', function ($scope, $location, APIService, AuthService) {

    $scope.register = function (user){
        APIService.request('/register', 'post', user, function(data){
            $location.path('/login')
        });
    };
    $scope.login = function (user){
        APIService.request('/login', 'post', user, function(data){
            console.log(data);
            AuthService.login(data.result.user);
            $location.path('/index');
        });
    };
    $scope.logout = function (){
        APIService.request('/logout', 'post', {}, function(data){
            AuthService.logout();
            $location.path('/login');
        });
    }
}]);