'use strict';

var services = angular.module('services', []);

services.factory('APIService', ['$http','AuthService', function ($http, AuthService) {
    return {
        request: function (url, method, data, success) {
            if(AuthService.session_id != false){
                data.session_id = AuthService.session_id;
            }
            return $http({
                url: url,
                method: method,
                data: data,
                headers: {'Content-Type': 'application/json'}
            }).success(function(data, status){
                if(data.success == true){
                    return success(data, status);
                }
                if(data.result.session_id){
                    AuthService.setToken(data.result.session_id);
                }
                if(data.result.success == true || data.success == true){
                    success(data, status);
                }
            }).error(function(data, status){

            })
        }
    };
}]);

services.factory('AuthService', [function(){
    var auth = {
        user : null,
        session_id: false,
        init: function(){
            if (localStorage.getItem('user') !== undefined){
                auth.user = JSON.parse(localStorage.getItem('user'));
            }else{
                $locale.path('/login');
            }
        },
        setToken: function(session_id){
            auth.session_id = session_id;
            localStorage.setItem('session_id', auth.session_id);
        },
        login: function(data){
            //to get object use JSON.parse
            console.log(data);
            auth.user = data;
            localStorage.setItem('user', JSON.stringify(data));
        },
        isLogin: function(){
            return localStorage.getItem('user');
        },
        logout: function(){
            localStorage.removeItem('session_id');
            localStorage.removeItem('user');
        }
    };
    auth.init();
    return auth;
}]);
