IskunApp.controller('resourcesMenuController', ['$scope', '$http', 'fileUpload', function ($scope, $http, fileUpload) {
        $scope.newFolder = {};
        $scope.newFolder.name = "";
        $scope.currentFolder = {};
        $scope.user = {};
       
        $scope.parents = [];
        $scope.page = "";
        $scope.url = "/api/users/posts/";
        $scope.isBusy = true;
        $scope.minPostId = 0;
        $scope.maxPostId = 0;

        $scope.posts = {};
        $scope.olders = [];
        $scope.$on('InitUser', function (event, user) {
            $scope.user = user;
        });
        $scope.posts = {};
        $scope.loadMore = function () {
            if ($scope.isBusy)
            {
                $scope.isBusy = false;
                $http.get($scope.url + "/" + $scope.minPostId + "/" + $scope.maxPostId).then(
                        function (response) {
                            // console.log(response);  
                            angular.forEach(response.data.olders, function (p, key) {
                                $scope.olders.push(p);
                                if ($scope.minPostId == 0) {
                                    $scope.minPostId = p.id;
                                }
                                if ($scope.maxPostId == 0) {
                                    $scope.maxPostId = p.id;
                                }
                                if (p.id > $scope.maxPostId) {
                                    $scope.maxPostId = p.id;
                                }
                                if (p.id < $scope.minPostId) {
                                    $scope.minPostId = p.id;
                                }
                            });

                            $scope.isBusy = true;
                        },
                        function () {//alert("not OK");
                            $scope.processing = false;
                        });
            }
            ;
        }
        $scope.init = function (data) {
            if (data != "")
            {
                $scope.currentFolder.slug = data;
            }
        }
        $scope.openCreateFolder = function () {
            $('#createFolder').modal('toggle');
        }
        $scope.createFolder = function () {
            if ($scope.newFolder.name == "")
            {
                bootbox.alert("Vui lòng nhập tên thư mục!");
                return;
            }
            var url = "/api/createFolder";
            if ($scope.currentFolder.id) {
                url = url + "/" + $scope.currentFolder.id;
            }
            $http.post(url, $scope.newFolder).then(
                    function (response) {

                        if (response.data.status == "success")
                        {
                            $scope.newFolder.name = "";
                            $scope.$emit('initUser');
                            $('#createFolder').modal('toggle');
                        }
                    },
                    function () {//alert("not OK");

                    });
        }
        $scope.parent = {};
        $scope.$on('InitUser', function (event, user) {
            console.log(user);
            $scope.user = user;
            angular.forEach(user.folders, function (p, key)
            {
                $scope.treeview(p, $scope.currentFolder.slug);
            })
            console.log($scope.currentFolder);
            $('#resourcesController').scope().openFolder($scope.currentFolder);
        });
        $scope.treeview = function (tree, slug) {
            //console.log(tree);
            for (var i = 0; i <= tree.children.length; i++)
            {
                if (slug == tree.slug)
                {
                    $scope.currentFolder = tree;
                }

                if (tree.children[i])
                {
                    if (slug == tree.children[i].slug)
                    {
                        $scope.currentFolder = tree.children[i];
                        $scope.currentFolder.parent = {};
                        $scope.currentFolder.parent.name = tree.name;
                        $scope.currentFolder.parent.slug = tree.slug;
                        $scope.currentFolder.parent.id = tree.id;
                    }
                    $scope.treeview(tree.children[i], slug);
                }
            }

        }
        $scope.openFolder = function (folder) {
            if (folder) {
                $scope.currentFolder = folder;
            } else {
                $scope.currentFolder = {};
                $scope.currentFolder.slug = "";
            }

            angular.forEach($scope.user.folders, function (p, key)
            {
                if ($scope.currentFolder.id)
                {
                    $scope.treeview(p, $scope.currentFolder.slug);
                }
            })
            $('#resourcesController').scope().openFolder($scope.currentFolder);
            if ($scope.currentFolder.id)
            {
            window.history.pushState('Tài nguyên', '', '/tai-nguyen/' + $scope.currentFolder.slug);
            }
            else{
            window.history.pushState('Tài nguyên', '', '/tai-nguyen');    
            }
        }
        $scope.uploadFile = function () {
            $("#uploadInput").click();
        };
        
    }])

