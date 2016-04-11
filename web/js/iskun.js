  
var iskunApp = angular.module('iskunApp',[]);
iskunApp.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
iskunApp.run(function ($rootScope, $http) 
{
    $rootScope.processing=false;
    $rootScope.initUser=function(){
        $http.get('/api/users/get').success(function (data) {
            $rootScope.user = data;
            $rootScope.$broadcast('InitUser', $rootScope.user);
            $rootScope.processing = false;
        });
    }
    $rootScope.initUser();
    $rootScope.$on('initUser', function(event, school) { 
        $rootScope.initUser();
    });
    $rootScope.facebookLogin = function($facebook){
        $http.post('/api/users/login/facebook', $facebook).then(
                function (response) {
                    
                },
                function () {//alert("not OK");
                    
                });
    }
    
});
