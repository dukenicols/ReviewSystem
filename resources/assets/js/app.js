require('angular');
require('lodash');
require('satellizer');
require('angular-route');
require('./controllers/mainCtrl');
require('./controllers/reviewCtrl');
require('./services/commentService');
require('./services/reviewService');
require('./services/redirectService');
require('./controllers/authCtrl');
require('./controllers/logoutCtrl');
require('./services/userService');
require('./vendor/ngraty');
require('angular-ui-router');
require('angular-messages');
require('./controllers/addReviewCtrl');
require('./directives/pwCheck');

var uibs = require('angular-ui-bootstrap');

var reviewApp = angular.module('reviewApp', ['ngRaty', 'redirectService','ngMessages', 'reviewApp.directives', uibs, 'authCtrl', 'logoutCtrl', 'ui.router', 'satellizer', 'mainCtrl', 'reviewCtrl', 'reviewService', 'commentService', 'userService', 'addReviewCtrl'], function($interpolateProvider) {
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})

.config(function($stateProvider, $urlRouterProvider, $authProvider, $locationProvider, $provide) {

  $authProvider.loginUrl = '/api/authenticate';
  $urlRouterProvider.otherwise('/login');

  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: '/js/tpl/login.html',
      controller: 'AuthController',
      // resolve: {
      //   authenticate: authenticate
      // },
    })
    .state('register', {
      url: '/register',
      templateUrl: '/js/tpl/register.html',
      controller: 'AuthController'
    })
    .state('logout', {
      url: '/logout',
      controller: 'LogoutController',
      // resolve: {
      //   redirectIfNotAuthenticated: _redirectIfNotAuthenticated
      // },
    });

    function redirectWhenLoggedOut($q, $injector) {
      return {
        responseError: function (rejection) {
            var $state = $injector.get('$state');
            var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

            angular.forEach(rejectionReasons, function (value, key) {
                if (rejection.data.error === value) {
                    localStorage.removeItem('user');
                    $location.path('/login');
                }
            });

            return $q.reject(rejection);
        }
      };
    }
    $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);
});
