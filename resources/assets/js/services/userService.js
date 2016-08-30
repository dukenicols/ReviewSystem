angular.module('userService', [])
  .factory('User', function($http) {
    return {
      getProfile: function() {
        if(localStorage.user) {
          return JSON.parse(localStorage.user);
        }
        return {};
      },
      save: function(userData) {
        localStorage.setItem('user' , JSON.stringify(userData));
      }
    };
  });
