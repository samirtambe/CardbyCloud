(function() {
		angular.module('cardbycloud')
            .controller('ContactCtrl',
                        ['$scope', '$http', 'FormPostSvc','$state',
                         function ($scope, $http, FormPostSvc, $state ) {

        $scope.data = {flname: '', email: '', phonenum: '', message: ''};

        $scope.submitForm = function(isValid) {
            if (isValid) {
                $http({method: 'POST',
                       url: 'msghandler.php',
                       transformRequest: FormPostSvc,
                       data: {
                           flname: $scope.data.flname,
                           email: $scope.data.email,
                           phonenum: $scope.data.phonenum,
                           message: $scope.data.message
                      }
                    })
                .then(function (response) {
                    console.log("THEN: " + response.data);

                    var found = response.data.search(/sent/i);

                    if (found > -1) {
                        $state.go('messagesuccess');
                    } else {
                        $state.go('messageerror');
                    }

                    return response;

                },function (response) {

                    console.log("CATCH: " +
                                response.data+' => '+
                                response.status + ' => '+
                                response.statusText);

                    return response;
                });
            }//if
        };//function
   }]);


// I provide a request-transformation method that is used to prepare the outgoing
// request as a FORM post instead of a JSON packet.

    angular.module('cardbycloud').factory("FormPostSvc", function() {

// Prepare request data for the form POST.

        function transformRequest( data, getHeaders ) {

            var headers = getHeaders();

            headers['Content-Type'] = "application/x-www-form-urlencoded; charset=utf-8";

            return( serializeData( data ) );
        }

        // Return the factory value.
        return( transformRequest );


// PRIVATE METHODS.
// I serialize the given Object into a key-value pair string. This
// method expects an object and will default to the toString() method.

        function serializeData( data ) {

// If this is not an object, defer to native stringification.

            if (!angular.isObject(data)) {
                return( ( data == null ) ? "" : data.toString() );
            }

            var buffer = [];

            // Serialize each key in the object.
            for ( var name in data ) {

                if (!data.hasOwnProperty(name)) {
                    continue;
                }

                var value = data[ name ];

                buffer.push(encodeURIComponent( name ) + "=" +
                    encodeURIComponent( ( value == null ) ? "" : value )
                );
            }//for
            // Serialize the buffer and clean it up for transportation.
            var source = buffer.join( "&" ).replace( /%20/g, "+" );

            return(source);
        }//serialize data

    });//Factory module

}());
