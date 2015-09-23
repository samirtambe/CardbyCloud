(function() {
    angular.module('cardbycloud',['ui.router'])
        .config( function($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/home');

        $stateProvider
        .state('home', {
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
            controller: 'ContactCtrl'
        }).state('messagesuccess', {
            url: '/messagesuccess',
            templateUrl: 'views/messagesuccess.html'
        }).state('messageerror', {
            url: '/messageerror',
            templateUrl: 'views/messageerror.html'
        });
    });
}());
