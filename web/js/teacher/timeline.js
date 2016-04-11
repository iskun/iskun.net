IskunApp.controller('timelineController', ['$scope', '$http', 'fileUpload', function ($scope, $http, fileUpload) {
        $scope.page = "";
        $scope.url = "/api/users/posts/";
        $scope.isBusy = true;
        $scope.minPostId = 0;
        $scope.maxPostId = 0;
        $scope.isReady=false;
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
                                $scope.isReady=true;
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
            $scope.page = data;
            $scope.url = "/api/users/posts/" + $scope.page;
        }
        $scope.$on('newComment', function (event, comment) {
            alert("");
        });
    }])

IskunApp.controller('commentsController', ['$scope', '$http', 'fileUpload', function ($scope, $http, fileUpload) {
        $scope.commentUrl = "/api/users/post/comments";
        $scope.minCommentId = 0;
        $scope.maxCommentId = 0;
        $scope.scrollComments = [];
        $scope.olderComments = [];
        $scope.preShowComment = true;
        $scope.loadingComments = false;
        $scope.id = 0;
        $scope.moreComment = true;
        $scope.comment = {}; // cần chuyển comment tạm thời sang commentsController có thể dùng hàm INIT từ postsController sang - làm xong nhanh
        $scope.comment.content = "";
        $scope.files = {};
        $scope.loadComments = function () {
            if (!$scope.loadingComments)
            {
                $scope.loadingComments = true;
                $http.get($scope.commentUrl + "/" + $scope.minCommentId + "/" + $scope.maxCommentId).then(
                        function (response) {
                            $scope.loadingComments = false;
                            angular.forEach(response.data.olders, function (p, key) {
                                $scope.olderComments.unshift(p);
                                if ($scope.minCommentId == 0) {
                                    $scope.minCommentId = p.id;
                                }
                                if ($scope.maxCommentId == 0) {
                                    $scope.maxCommentId = p.id;
                                }
                                if (p.id > $scope.maxCommentId) {
                                    $scope.maxCommentId = p.id;
                                }
                                if (p.id < $scope.minCommentId) {
                                    $scope.minCommentId = p.id;
                                }
                            });
                            if (response.data.olders.length < 10)
                            {
                                $scope.moreComment = false;
                            }
                            $scope.preShowComment = false;
                            console.log($scope.olderComments);
                        },
                        function () {//alert("not OK");
                            $scope.processing = false;
                        });
            }
            ;
        }
        $scope.initComments = function (cpost) {
            post = cpost[0][0];
            $scope.commentUrl = $scope.commentUrl + "/" + post.id + "";
            $scope.id = post.id;
            if (post.comment.content) {
                $scope.comment = post.comment;
            }
            $scope.olderComments = post.comments;
            $scope.totalComments = post.commentsnumber;
        }
        $scope.sendComment = function () {

            $http.post("/api/postComment/" + $scope.id, $scope.comment).then(
                    function (response) {
                        var comment = response.data;
                        var exist = false;
                        angular.forEach($scope.olderComments, function (p, key) {
                            if (p.id == comment.id) {
                                exist = true;
                                $scope.olderComments[key] = comment;
                            }
                        });
                        if (!exist)
                        {
                            $scope.olderComments.push(response.data);
                        }
                        $scope.comment = {};
                        $scope.comment.content = "";
                        $('html, body').animate({
                            scrollTop: ($("#comment"+comment.id).offset().top-70)
                        }, 1000);
                        
                    },
                    function () {//alert("not OK");
                        $scope.processing = false;
                    });
        }
        $scope.uploadFile = function () {
            $('#addCommentFile').modal('toggle');
           // $("#uploadInput" + $scope.id + "").click();
        };
        $scope.$watch('files', function () {
            var file = $scope.files;
            if (file.name)
            {
                var uploadUrl = "/api/comment/upload";
                var fd = new FormData();
                fd.append('file', file);
                fd.append('post', $scope.id);
                fd.append('content', $scope.comment.content);
                if ($scope.comment.id)
                {
                    fd.append('comment', $scope.comment.id);
                }
                $http.post(uploadUrl, fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .success(function (response) {
                            console.log(response);
                            $scope.comment = response;
                        })
                        .error(function () {
                        });
            }
        });
        $scope.deleteAttachment = function (commentId, fileId) {
            $http.get('/api/deleteCommentAttachment/' + commentId + "/" + fileId).success(function (response) {
                $scope.comment = response;
            });
        };
        $scope.editComment = function (comment) {
            $scope.comment = angular.copy(comment);
            $('html, body').animate({
                scrollTop: ($("#inputComment"+$scope.id).offset().top-70)
            }, 1000);
        }
        $scope.deleteComment = function (comment) {
            bootbox.dialog({
                message: comment.content,
                title: "Xóa bình luận?",
                buttons: {
                    danger: {
                        label: "Hủy!",
                        className: "btn-danger",
                        callback: function () {
                            // Example.show("uh oh, look out!");
                        }
                    },
                    success: {
                        label: "Xóa",
                        className: "btn-success",
                        callback: function () {
                            $http.get('/api/deleteComment/' + comment.id).success(function (response) {
                                angular.forEach($scope.olderComments, function (p, key) {
                                    if (p.id == comment.id) {
                                        $scope.olderComments.splice(key, 1);
                                    }
                                });
                            });
                        }
                    },
                }
            });
        }
    }])
