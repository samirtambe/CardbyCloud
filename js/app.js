(function() {
    angular.module('cardbycloud',['ui.router','']);

    console.log("Created cardbycloud angular module");

    angular.module('cardbycloud').config(

        function($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/home');

        $stateProvider.state('home', {
            url: '/home',
            templateUrl: 'views/main.html'
        })
        .state('about', {
            url: '/about',
            templateUrl: 'views/about.html'
        })
        .state('pricing', {
            url: '/pricing',
            templateUrl: 'views/pricing.html'
        })
        .state('contact', {
            url: '/contact',
            templateUrl: 'views/contact.html',
        });
    });
}());
