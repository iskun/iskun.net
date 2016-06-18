var IskunApp = angular.module('IskunApp', ['infinite-scroll','ui.bootstrap','ngSanitize']);
IskunApp.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}); 
IskunApp.run(function ($rootScope, $http)
{
    $rootScope.processing = false;
    $rootScope.initUser = function () {
        $rootScope.requireUpdate=false;
        $http.get('/api/user').success(function (data) {
            $rootScope.user = data;  
            $rootScope.$broadcast('InitUser', $rootScope.user);
            $rootScope.processing = false;
            if (($rootScope.user.teachingsubjects.length==0)||($rootScope.user.schoolsteachers.length==0))
            {
                $rootScope.requireUpdate=true;
            }
        }); 
    }
    $rootScope.initUser();
    $rootScope.$on('initUser', function (event, school) {
        $rootScope.initUser();
    });
});
IskunApp.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});
IskunApp.directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;
                element.bind('change', function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]);

IskunApp.service('fileUpload', ['$http', function ($http) {
        this.uploadFileToUrl = function (file, uploadUrl, p_id, content) {
            var response = {};
            var fd = new FormData();
            fd.append('file', file);
            fd.append('post', p_id);
            fd.append('content', content);
            $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            })
                    .success(function (responsex) {
                        response = responsex;
                    })
                    .error(function () {
                    });
            return response;
        }
    }]);
IskunApp.config(['$httpProvider', function ($httpProvider) {
        $httpProvider.interceptors.push(function ($q) {
            return {
                'response': function (response) {
                    //Will only be called for HTTP up to 300
                    // console.log(response); 
                    return response;
                },
                'responseError': function (rejection) {
                    if (rejection.status === 401) {
                        $('#reLogin').modal('toggle');
                    }
                    return $q.reject(rejection);
                }
            };
        });
    }]); 
IskunApp.directive('icheck', function ($timeout, $parse) {
    return {
        require: 'ngModel',
        link: function ($scope, element, $attrs, ngModel) {
            return $timeout(function () {
                var value;
                value = $attrs['value'];

                $scope.$watch($attrs['ngModel'], function (newValue) {
                    $(element).iCheck('update');
                });

                $scope.$watch($attrs['ngDisabled'], function (newValue) {
                    $(element).iCheck(newValue ? 'disable' : 'enable');
                    $(element).iCheck('update');
                })

                return $(element).iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'

                }).on('ifChanged', function (event) {
                    if ($(element).attr('type') === 'checkbox' && $attrs['ngModel']) {
                        $scope.$apply(function () {
                            return ngModel.$setViewValue(event.target.checked);
                        })
                    }
                }).on('ifClicked', function (event) {
                    if ($(element).attr('type') === 'radio' && $attrs['ngModel']) {
                        return $scope.$apply(function () {
                            //set up for radio buttons to be de-selectable
                            if (ngModel.$viewValue != value)
                                return ngModel.$setViewValue(value);
                            else
                                ngModel.$setViewValue(null);
                            ngModel.$render();
                            return
                        });
                    }
                });
            });
        }
    };
});