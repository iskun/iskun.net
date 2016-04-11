IskunApp.controller('updateController', ['$scope', '$http', 'fileUpload', function ($scope, $http, fileUpload) {
        $scope.stages = [];
        $scope.currentStage = "Tất cả";
        $scope.allSubjects = [];
        $scope.subjects = [];
        $scope.keyword="";
        $scope.page = 1;
        $scope.pages = [];
        $scope.openTeachingSubjects = function () {
            $scope.allSubjects = [];
            $("#teachingSubjects").modal("toggle");
            var url = '/api/getStagesSubjects';
            $http.get(url).success(function (response) {
                $scope.isReady = true;
                $scope.stages = response;
                angular.forEach($scope.stages, function (stage, key1) {
                    angular.forEach(stage.stagessubjects, function (stagesubject, key2) {
                        $scope.allSubjects.push(stagesubject.subjects);
                    });
                });
                $scope.loadMore();

            });

        }
        $scope.loadMore = function () {
            var currentSubject = $scope.subjects.length;
            angular.forEach($scope.allSubjects, function (subject, key) {
                if ((key >= currentSubject) && (key < currentSubject + 20))
                {
                    $scope.subjects.push(subject);
                }
            });
        }
        $scope.filter=function(){
            if ($scope.keyword!="")
            {
                (string.indexOf(substring) > -1);
            }
        }
        $scope.resetStages = function () {
            $scope.subjects = [];
            $scope.allSubjects = [];
            angular.forEach($scope.stages, function (stage, key1) {
                angular.forEach(stage.stagessubjects, function (stagesubject, key2) {
                    $scope.allSubjects.push(stagesubject.subjects);
                });
            });
            $scope.loadMore();
        }
        $scope.filterStages = function (stage) {
            $scope.currentStage = stage.name;
            $scope.subjects = [];
            $scope.allSubjects = [];
            angular.forEach(stage.stagessubjects, function (stagesubject, key2) {
                $scope.allSubjects.push(stagesubject.subjects);
            });
            $scope.loadMore();
        }
        $scope.addTeachingSubjects=function(subject){
            $http.post("/api/addTeachingSubjects",subject).then(
                    function (response) {
                        $scope.$emit('initUser');
                    },
                    function () {//alert("not OK");
                       
                    });
        }
    }])
