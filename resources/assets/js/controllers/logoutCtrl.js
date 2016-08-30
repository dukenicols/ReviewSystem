angular.module('logoutCtrl', [])
  .controller('LogoutController', function($scope, $auth) {
    $scope.loggingOut = true;
    $auth.logout();
    localStorage.clear();
    setTimeout(function() {
      $scope.loggingOut = false;
      window.location = '/';
    }, 3000);


  });
