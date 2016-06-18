IskunApp.controller('mailboxController', ['$scope', '$http', 'fileUpload', '$uibModal', function ($scope, $http, fileUpload, $modal) {
        $scope.show = '';
        $scope.emails = [];
        $scope.email = {};
        $scope.newEmail = {};
        $scope.user = {};
        $scope.reply = {};
        $scope.compose = function (email) {
            $scope.newEmail = {};
            $scope.show = 'compose';
            setTimeout(function () {
                $('.summernote').summernote();
            }, 50)

        }
        $scope.replyEmail = function (email) {
            $scope.show = 'reply';
            if (!email.reply)
            {
                email.reply = {};
            }
            $scope.reply = email;

            setTimeout(function () {
                
                $('#reply_content').summernote();
                
            }, 50);
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }
        $scope.sendReply = function () {

            $scope.reply.reply.content = $("#reply_content").code();
            $http.post("/api/sendReply/" + $scope.user.token, $scope.reply).then(
                    function (response) {
                        var result = response.data;
                        if (result.id)
                        {
                           $scope.reply.replies.push(result);
                           $scope.reply.reply={}; 
                           $scope.readMail($scope.reply);
                        }
                    },
                    function () {
                    });
        }
        $scope.readMail = function (mail) {
            console.log(mail);
            $scope.email = mail;
            $scope.show = 'read';
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        $scope.inbox = function () {
            $scope.show = 'inbox';
            $scope.emails = $scope.getEmails();
        }
        $scope.outbox = function () {
            $scope.show = 'outbox';

        }
        $scope.important = function () {
            $scope.show = 'important';
        }
        $scope.trash = function () {
            $scope.show = 'trash';
        }
        $scope.getEmails = function () {
            $http.get('/api/getEmails/' + $scope.user.token).success(function (data) {
                $scope.emails = data;
            });
        }
        $scope.$on('InitUser', function (event, user) {
            $scope.user = user;
            $scope.inbox();
        });
    }])
