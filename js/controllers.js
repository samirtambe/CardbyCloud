(function() {
		angular.module('cardbycloud').controller('ContactCtrl', ['$scope', '$http', function ($scope, $http) {

            $scope.data = {
                flname: '',
                email: '',
                phonenum: '',
                message: ''
            };

            $scope.sendReq = function() {
                $http
                    .post('msghandler.php', {
                    flname: $scope.data.flname,
                    email: $scope.data.email,
                    phonenum: $scope.data.phonenum,
                    message: $scope.data.message
                })
                .then(function (response) {

                    console.log("ContactSvc Success." + response.data);

                    return response;

                },function (response) {

                    console.log("ContactSvc Error: "+ response.data+' === '+
                               response.status+' === '+response.statusText);

                    return response;
                });
            };
	   }]);
}());
//ContactSvc($scope.data).success(function (data) {$scope.sentback = data;});
