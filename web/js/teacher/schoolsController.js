IskunApp.controller('schoolsController', ['$scope', '$http', 'fileUpload', '$uibModal', function ($scope, $http, fileUpload, $modal) {
        $scope.schools = [];
        $scope.myschools = [];
        $scope.school = {};
        $scope.myschools = [];
        $http.get('/api/getSchoolsTypes').success(function (data) {
            $scope.schoolstypes = data;
        });



        $scope.list = function () {
            $scope.show = "show";
        }
        $scope.add = function () {
            $scope.show = "add";
        }
        $scope.addSchool = function () {
            $http.post("/api/postSchool/" + $scope.user.token, $scope.school).then(
                    function (response) {
                        var result = response.data;
                        if (result.errors) {$scope.school.errors=result.errors}
                        if (result.id)
                        {
                            toastr.options = {
                                positionClass: $('#positionGroup input:radio:checked').val() || 'toast-bottom-right',
                            };
                            toastr.success('http://iskun.net/' + result.slugs.slug, 'Đã thêm trường học');
                            window.location = "http://iskun.net/quan-ly/" + result.slugs.slug;
                        }
                    },
                    function () {

                    });
        }
        $scope.$on('InitUser', function (event, user) {
            $scope.user = user;
            $http.get('/api/getMySchools/' + user.token).success(function (data) {
                $scope.myschools = data;
            });
            $scope.list();
            $http.get("/api/getMyCreatedSchools/" + $scope.user.token).success(function (data) {
                $scope.myschools = data;
            });
        });


    }])

function goto() {
    alert("x");
}