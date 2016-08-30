angular.module('mainCtrl', [])

  .controller('mainController', function($scope, $http, $window, Review, $auth, User) {
      $scope.parentData = {
        title: 'Inicio | Reviews & Opiniones'
      };
      $scope.reviewData = {};
      $scope.loading = true;
      $scope.moreShow = !$scope.loading;
      $scope.loadingPopulars = true;
      $scope.morePopularShow = !$scope.loading;
      //$scope.lessShow = false;
      $scope.lastPage = 1;
      $scope.lastPopularPage = 1;

      $scope.user  = User.getProfile();
      $scope.reviews = [];
      $scope.populars = [];
      $scope.ratyOptions = {
        hints: ['pesimo', 'malo', 'regular', 'bueno', 'excelente'],
        path: '/vendor/raty/images/',
        readOnly: true,
      };
      // Controller
      $scope.isAuthenticated = function() {
        return $auth.isAuthenticated();
      };


      // get all the posts
      $scope.init = function() {
        $scope.lastPage = 1;
        var options = {
          page: $scope.lastPage
        };

        Review.get(options)
        .success(function(response) {
            $scope.reviews = response.data;
            $scope.currentPage = response.currentPage;
            $scope.loading = false;
        });

        Review.getPopulars( options ) //the amount of reviews to show
          .success(function(response) {
            $scope.populars = response.data;
            $scope.loadingPopulars = false;
          });
      };

      // load the first set of reviews
      $scope.init();

      $scope.showMore = function() {
        $scope.lastPage +=1;
        var options = {
          page: $scope.lastPage
        };
        Review.get(options)
          .success(function(response) {
            $scope.reviews = $scope.reviews.concat(response.data);
            if(response.last_page === response.current_page) {
              $scope.moreShow = false;
            }
          });
      };

      $scope.showMorePopulars = function() {
        $scope.lastPopularPage +=1;
        var options = {
          page: $scope.lastPopularPage
        };
        Review.getPopulars(options)
          .success(function(response) {
            angular.extend($scope.populars, response.data);
            if(response.last_page === response.current_page) {
              $scope.morePopularShow = false;
            }
          });
      };

      $scope.submitReview = function() {
        $scope.loading = true;

        Review.save()
          .success(function(data) {
            Review.get()
              .success(function(getData) {
                $scope.reviews = getData;
                $scope.loading = false;
              })
              .error(function(error) {
                console.log(error);
              });
          });
      };

      $scope.deleteReview = function(id) {
        $scope.loading = true;

        Review.destroy(id)
          .success(function(data) {
            Review.get()
              .success(function(getData) {
                $scope.reviews = getData;
                $scope.loading = false;
              });
          });
      };

      $scope.logout = function() {
        $auth.logout().then(function() {
          window.location = '/login';
        });
      };
  });
