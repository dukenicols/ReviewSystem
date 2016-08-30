angular.module('redirectService', [])
  .factory('Redirect', ['$location', '$window', function($location, $window) {
    return {
      toLogin : function(afterLogin) {
        var next = (afterLogin !== '') ? afterLogin : $location.url();
        localStorage.removeItem('nextLocation');
        localStorage.removeItem('message');
        localStorage.setItem('nextLocation', next);
        localStorage.setItem('message', 'Necesitas ingresar para continuar.');
        $window.location.href = '/auth/#/login';
      },
      receive : function() {
        if ( localStorage.message ) {
          // show custom message on login / register
          return localStorage.message;
        } else {
          return false;
        }
      },
      toOrigin: function() {
        if( localStorage.nextLocation ) {
          var path = localStorage.nextLocation;
          localStorage.removeItem('nextLocation');
          localStorage.removeItem('message');
          $window.location.href = $location.protocol() + '://' + $location.host() + path;
        } else {
          $window.history.back();
        }
      }
    };
  }]);
