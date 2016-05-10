IskunApp.controller('mailboxController', ['$scope', '$http', 'fileUpload', '$uibModal', function ($scope, $http, fileUpload, $modal) {
        $scope.show='';
        $scope.emails=[];
        $scope.user={};
        $scope.compose = function(email){
            $scope.show='compose';
            setTimeout(function(){$('.summernote').summernote(); },50)
             
        }
        $scope.readMail = function(mail){
            $scope.email=mail;
            $scope.show='read';
        }
        $scope.inbox = function(){
            $scope.show='inbox';
            $scope.emails=$scope.getEmails();
        }
        $scope.outbox = function(){
            $scope.show='outbox';
            
        }
        $scope.important = function(){
            $scope.show='important';
        }
        $scope.trash = function(){
            $scope.show='trash';
        }
        $scope.getEmails = function(){
            $http.get('/api/getEmails/'+$scope.user.token).success(function (data) {
            $scope.emails = data;
            });
        }
        $scope.$on('InitUser', function (event, user) {
            $scope.user=user;
            $scope.inbox();
        });
    }])
