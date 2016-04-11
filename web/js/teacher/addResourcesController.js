IskunApp.controller('addResourcesController', ['$scope', '$http', 'fileUpload', '$uibModalInstance', function ($scope, $http, fileUpload, $uibModalInstance) {
        $scope.resource = {"subjects": angular.copy($scope.filter.subjects),"subjectschapters": angular.copy($scope.filter.subjectschapters),"sharings": angular.copy($scope.filter.sharings),};
        console.log($scope.resource);
        $scope.teachingsubjects = [];
        angular.forEach($scope.user.teachingsubjects, function (s, key) {
            $scope.teachingsubjects.push(s.subjects);
        });
        console.log($scope.teachingsubjects);
        $scope.ok = function () {
            $uibModalInstance.close($scope.selected.item);
        };

        $scope.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };
        $scope.check = function () {
            console.log($scope.resource);
        }
    }])
 