IskunApp.controller('resourcesController', ['$scope', '$http', 'fileUpload', '$uibModal', function ($scope, $http, fileUpload, $modal) {
        $scope.filter = {"subjects": {}, "subjectschapters": [], "filesformats": [], "sharings": {}};
        $scope.isAdding = false;
        $scope.newResource = {"title": "", "content": ""};
        $scope.file = {};
        $scope.resources = [];
        $scope.uploadingFiles = [];
        $scope.teachingsubjects = [];
        $scope.viewingResource = {};
        $http.get('/api/getFilesFormats').success(function (data) {
            $scope.filesformats = data;
        });
        $http.get('/api/getFilesCategories').success(function (data) {
            $scope.filescategories = data;
        });
        $http.get('/api/getSharings').success(function (data) {
            $scope.sharings = data;
            $scope.filter.sharings = $scope.sharings[0];
        });

        $scope.$on('InitUser', function (event, user) {
            angular.forEach(user.teachingsubjects, function (s, key) {
                $scope.teachingsubjects.push(s.subjects);
            });
        });

        $scope.filterFiles = function (type, object) {
            if (type == 'sharings')
            {
                $scope.filter.sharings = angular.copy(object);
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
        $scope.deleteResource = function (resource) {
            $scope.pauseViewingFileCarousel();
            $scope.viewingResource = {};
            $("#viewingResourceWindow").insertBefore($("#allResources"));
            $http.get('/api/deleteResource/' + resource.id).success(function (data) {

                angular.forEach($scope.resources, function (sourceresource, key) {
                    if (sourceresource.id == resource.id)
                    {
                        $scope.getFiles();
                    }
                });
            });
        }

        $scope.getFiles = function () {
            $http.post("/api/getResources", $scope.filter).then(
                    function (response) {
                        $scope.resources = response.data;
                        angular.forEach($scope.resources, function (resource, key) {
                            resource.extensions=[];
                            angular.forEach(resource.postsfiles, function (postfile, key2) {
                                var exist=false;
                                angular.forEach(resource.extensions, function (extension, key3) {
                                    if(extension.extension==postfile.files.extension)
                                    {
                                        exist=true;
                                        resource.extensions[key3].numbers=resource.extensions[key3].numbers+1;
                                    }
                                }); 
                                if (!exist)
                                {
                                    resource.extensions.push({"extension":postfile.files.extension,"numbers":1});
                                }
                            });
                        });
                        setTimeout(function () {
                            $('.carousel-control.right').trigger('click');
                        }, 500)

                    },
                    function () {

                    });
        }
        $scope.closeViewingResource = function () {
            $scope.pauseViewingFileCarousel();
            $("#viewingResourceWindow").insertBefore($("#allResources"));
            $scope.viewingResource = {};
        }
        $scope.pauseViewingFileCarousel = function () {
            if ($scope.viewingResource.viewingFile)
            {
                if ($scope.viewingResource.viewingFile.id)
                {
                    $("#carousel" + $scope.viewingResource.viewingFile.id).carousel('pause');
                }
            }
        }
        $scope.viewResource = function (resource, index) {
            $scope.pauseViewingFileCarousel();
            $scope.viewingResource = {};
            $scope.viewingResource = angular.copy(resource);
            for (var i = 1; i <= 4; i++)
            {
                if (((i + index) % 4) == 0)
                {
                    if ((i + index + 1) <= $scope.resources.length)
                    {
                        $("#viewingResourceWindow").insertAfter($("#resource_" + (i + index - 1)));
                    } else
                    {
                        $("#viewingResourceWindow").insertAfter($("#resource_" + ($scope.resources.length - 1)));
                    }
                }
            }
            setTimeout(function () {
                $('.file-box').each(function () {
                    animationHover(this, 'pulse');
                    // $("html, body").scrollTop($("#viewingResource_a").offset().top);
                });
            }, 500)

        }
        $scope.viewFile = function (file) {
            $scope.pauseViewingFileCarousel();
            $scope.viewingResource.viewingFile = angular.copy(file);
            setTimeout(function () {
                $('#carousel' + file.id).carousel({
                });
                $("#fileComments").slimScroll({destroy: true});
                $(".slimScrollBar,.slimScrollRail").remove();
                $(".slimScrollDiv").contents().unwrap();
                $('#fileComments').slimScroll({
                    height: $("#previews").height() + 'px',
                    railOpacity: 0.4,
                    wheelStep: 10
                });
            }, 2000)


        }
        $scope.viewPrevFile = function () {
            $scope.pauseViewingFileCarousel();
            angular.forEach($scope.viewingResource.postsfiles, function (postfile, key) {
                if (postfile.files.id == $scope.viewingResource.viewingFile.id)
                {
                    if (key > 0)
                    {
                        $scope.viewingResource.viewingFile = $scope.viewingResource.postsfiles[key - 1].files;
                    } else
                    {
                        $scope.viewingResource.viewingFile = {};
                    }
                }
            });

        }
        $scope.viewNextFile = function () {
            $scope.pauseViewingFileCarousel();
            var next = false;
            angular.forEach($scope.viewingResource.postsfiles, function (postfile, key) {
                if (postfile.files.id == $scope.viewingResource.viewingFile.id)
                {
                    if (key < $scope.viewingResource.postsfiles.length - 1)
                    {
                        next = (key + 1);
                    } else
                    {
                        $scope.viewingResource.viewingFile = {};
                    }
                }
            });
            if (next)
            {
                $scope.viewingResource.viewingFile = $scope.viewingResource.postsfiles[next].files;
            }
        }
        $scope.closeViewFile = function () {
            $scope.pauseViewingFileCarousel();
            $scope.viewingResource.viewingFile = {};
        }
        $scope.getFiles();

        $scope.addFile = function () {
            $("#addFile").click();
        }
        $scope.closeAddResource = function () {
            $scope.newResource.filter = angular.copy($scope.filter);
            $scope.isAdding = false;
        }
        $scope.openAddResource = function () {
            $scope.newResource.filter = angular.copy($scope.filter);
            $scope.isAdding = true;
            $("html, body").animate({scrollTop: 0}, "slow");
            $("#addFile").click();
            /*
             $modal.open({
             templateUrl: '/getModal/teacher/addResource',
             controller: 'addResourcesController', 
             scope: $scope,
             size:'lg'
             });
             */
        }
        $scope.addResource = function () {
            $scope.result = {};
            var files = [];
            angular.forEach($scope.uploadingFiles, function (uploadFile, key) {
                if (uploadFile.file)
                {
                    files.push(uploadFile.file);
                }
            });
            $scope.newResource.files = files;
            $http.post("/api/addResource", {"resource": $scope.newResource}).then(
                    function (response) {
                        $scope.result = response.data;
                        if ($scope.result.resource)
                        {
                            if ($scope.result.resource.id)
                            {
                                bootbox.alert("Đã thêm tài nguyên");
                                $scope.newResource = {"title": "", "content": ""};
                                $scope.uploadingFiles = [];
                                $scope.isAdding = false;
                            }
                        }

                    },
                    function () {

                    });
        }
        $scope.$watch('file', function () {
            var file = $scope.file;
            var block = 256000;
            if (file.name)
            {

                $scope.uploadingFiles.push(file);
                if (window.File && window.FileReader && window.FileList && window.Blob && (file.size > 0))
                {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        var data = event.target.result;
                        var parts = Math.ceil(data.length / block);
                        var maxLoops = parts;
                        var counter = 0;
                        angular.forEach($scope.uploadingFiles, function (t, key) {
                            if (t.name == file.name)
                            {
                                t.src = data;
                            }
                        });
                        $('.i-checks').iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green',
                        });
                        (function next() {
                            if (counter++ >= maxLoops)
                                return;

                            setTimeout(function () {
                                var i = counter - 1;
                                var subdata = data.substring((i * block), (i * block) + block);
                                $http.post("/api/uploadMultipart", {"size": file.size, "type": file.type, "name": file.name, "data": subdata, "part": i, "parts": parts}).then(
                                        function (response) {
                                            response = response.data;
                                            if (!response.id)
                                            {
                                                angular.forEach($scope.uploadingFiles, function (f, key) {

                                                    if (f.name == response.name)
                                                    {
                                                        f.percent = response.percent;
                                                        f.src = data;
                                                    }
                                                });
                                            } else
                                            {
                                                angular.forEach($scope.uploadingFiles, function (f, key) {

                                                    if (f.name == response.filename)
                                                    {
                                                        f.file = response;
                                                        f.file.filescategories = {"id": ""};
                                                    }

                                                });
                                            }

                                        },
                                        function () {

                                        });

                                next();
                            }, 200);
                        })();


                    }
                    reader.readAsDataURL(file);
                } else
                {
                    var uploadUrl = "/api/uploadFile";
                    var fd = new FormData();
                    fd.append('file', file);


                    $http.post(uploadUrl, fd, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    })
                            .success(function (response) {

                            })
                            .error(function () {

                            });
                }

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            }
        });
    }])

$(document).ready(function () {
    $('.file-box').each(function () {
        animationHover(this, 'pulse');
    });
});
$(document).ready(function () {


    $('.product-images').slick({
        dots: true
    });

});
