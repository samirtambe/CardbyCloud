(function() {
    angular.module('cardbycloud').factory('item', ['$http', function ($http) {

        console.log("books service: Getting the books.json file from server");

        return $http
            .get('https://s3.amazonaws.com/codecademy-content/courses/ltp4/books-api/books.json')
            .success(function (data) {
                console.log("books service: JSON file received successfully.");
                return data;
            })
            .error(function (err) {
                console.log("books service: ERROR receiving JSON file");
                return err;
            });
    }]);
}());
