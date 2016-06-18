IskunApp.controller('schoolManagerController', ['$scope', '$http', 'fileUpload', '$uibModal', function ($scope, $http, fileUpload, $modal) {
        $scope.schools = [];
        $scope.myschools = [];
        $scope.school = {};
        $scope.myschools = [];
        



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
            $http.get('/api/getSchool/'+ $scope.user.token+'/'+school_id).success(function (data) {
            $scope.school = data;
            });
        });


    }])

function goto() {
    alert("x");
}