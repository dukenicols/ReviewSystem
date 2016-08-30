angular.module('addReviewCtrl', [])
  .controller('AddReviewController', function( $auth, $scope, Review, Redirect) {
    $scope.loading = false;
    $scope.reviewData = Review.getTemp();
    $scope.redirectAfterLogin = '/';
    $scope.extraFields = false;
    $scope.expandEnable = $auth.isAuthenticated();

    $scope.ratyOptions = {
      readOnly: false,
      hints: ['pesimo', 'malo', 'regular', 'bueno', 'excelente'],
      path: '/vendor/raty/images/'
    };

    $scope.expand = function() {
      if($scope.expandEnable) {
        $scope.extraFields = !$scope.extraFields;
        return true;
      }
      return false;
    };

    $scope.publishReview = function() {
      if( ! $scope.isAuthenticated() ) {
        Review.saveTemp($scope.reviewData);
        Redirect.toLogin($scope.redirectAfterLogin);
      } else {
        Review.save($scope.reviewData)
          .success(function(response) {
            $scope.reviewData = {};
            localStorage.removeItem('tempReview');
            $scope.message = response.message;
            setTimeout(function() {
              $scope.message = false;
            }, 1500);
          });
      }
    };

    $scope.reset = function() {
      $scope.reviewData = {};
    };
  });
