angular.module('reviewService', [])
  .factory('Review', function($http) {
    return {
      // get all the approved reviews
      get : function(options) {
        return $http({
          url: '/api/reviews',
          method: "GET",
          params: options
        });
      },

      getReview : function(url) {
        return $http.get('/api/review/' + url);
      },

      getPopulars : function( options ) {
        return $http({
          url: '/api/reviews/populars',
          method: "GET",
          params: options
        });
      },

      saveTemp : function(reviewData) {
        return localStorage.setItem('tempReview', JSON.stringify(reviewData));
      },

      getTemp : function() {
        return localStorage.tempReview ? JSON.parse(localStorage.tempReview) : {};
      },

      save : function(reviewData) {
        return $http({
          method: 'POST',
          url: '/api/reviews',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(reviewData)
        });
      },

      destroy : function(id) {
        return $http.delete('/api/reviews/' + id);
      }
    };
  });
