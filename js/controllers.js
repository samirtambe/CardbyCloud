(function() {
		angular.module('cardbycloud').controller('ContactCtrl', ['$scope', 'contact', function ($scope, item) {
	    item.success(function (data) {
	        $scope.sentback = data;
	    });
	    console.log("ContactCtrl");
	}]);
}());
