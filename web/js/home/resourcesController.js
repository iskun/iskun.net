IskunApp.controller('resourcesController', ['$scope', '$http', 'fileUpload','$uibModal', function ($scope, $http, fileUpload, $modal) {
        $scope.filter = {"subjects": {}, "subjectschapters": [], "filesformats": [], "source": "private"};
        $http.get('/api/getFilesFormats').success(function (data) {
            $scope.filesformats = data;
        });
        $scope.filterFiles = function (type, object) {
            if (type == 'source')
            {
                $scope.filter.source = angular.copy(object);
            }
            if (type == 'subjects')
            {
                $scope.filter.subjects = angular.copy(object);
                $scope.filter.subjectschapters = {};
            }
            if (type == 'subjectschapters')
            {
                $scope.filter.subjectschapters = angular.copy(object);
            }
            if (type == 'filesformats')
            {
                var exist = false;
                angular.forEach($scope.filter.filesformats, function (format, key) {
                    if (format.id == object.id) {
                        exist = true;
                        $scope.filter.filesformats.splice(key, 1);
                    }
                });
                if (exist == false)
                {
                    $scope.filter.filesformats.push(object);
                }
                if (!object.id)
                {
                    $scope.filter.filesformats = [];
                }
                angular.forEach($scope.filesformats, function (format2, key2) {
                    format2.class = '';
                });
                angular.forEach($scope.filter.filesformats, function (format, key) {
                    angular.forEach($scope.filesformats, function (format2, key2) {
                        if (format.id == format2.id)
                        {
                            format2.class = 'active';
                        }
                    });
                });
            }
            $scope.getFiles();
        }
        $scope.getFiles = function () {
            $http.post("/api/getFiles", $scope.filter).then(
                    function (response) {


                    },
                    function () {

                    });
        }
        $scope.openAddResource = function () {
            $modal.open({
                templateUrl: '/getModal/teacher/addResource',
                controller: 'addResourcesController', 
                scope: $scope,
                size:'lg'
            });
        }
    }])

$(document).ready(function () {
    $('.file-box').each(function () {
        animationHover(this, 'pulse');
    });
});
