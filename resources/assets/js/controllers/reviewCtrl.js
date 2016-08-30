angular.module('reviewCtrl', [])
  .controller('reviewController', function($rootScope, $scope, $http, Review, Comment) {
    $scope.review = {};

    $scope.lessShow = false;
    $scope.limit = 3;


    // object to hold all the data for the new comment form
		$scope.commentData = {};

    $scope.init = function(url) {
        if(url) {
          Review.getReview(url)
            .success(function(data) {
              $scope.review = data;
              $scope.parentData.title = data.title.replace('.', '') + '| Reviews & Opiniones';
              $scope.moreShow = _.keys($scope.review.comments).length;
              console.log($scope.moreShow);
            });
        }
    };

    $scope.$watch('limit', function() {
      if( $scope.limit === _.keys($scope.review.comments).length  ) {
          $scope.moreShow = false;
      }
      if($scope.limit === 3)
      {
        $scope.lessShow = false;
      }
    });
    $scope.showMore = function() {
      if ( $scope.limit + 3 <= _.keys($scope.review.comments).length ) {
        $scope.limit += 3;
        $scope.lessShow = true;
      } else {
        $scope.limit = _.keys($scope.review.comments).length;
        $scope.showMore = false;
      }
    };

    $scope.showLess = function() {
      if ( $scope.limit - 3 < 3 ) {
        $scope.limit = 3;
        $scope.lessShow = false;
      } else {
         $scope.limit -= 3;
         $scope.moreShow = true;
      }
    };

    // function to handle submitting the form
		// SAVE A COMMENT =========
		$scope.submitComment = function() {
			$scope.loading = true;
			$scope.commentData.review_id = $scope.review.id;
			// save the comment. pass in comment data from the form
			// use the function we created in our service
			Comment.save($scope.commentData)
				.success(function (data) {
						// if successful, we'll need to refresh the comment list
						Comment.get($scope.review.id)
								.success(function(getData) {
										$scope.review.comments = getData;
										$scope.loading = false;
										$scope.commentData = {};
								});
				})
				.error(function (data) {
					console.log(data);
				});
		};

  });
