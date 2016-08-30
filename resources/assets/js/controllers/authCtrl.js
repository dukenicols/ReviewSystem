angular.module('authCtrl', [])
          .controller('AuthController', ['$auth', '$window', '$state', '$http', '$scope', 'User', 'Redirect',
          function($auth, $window, $state, $http, $scope, User, Redirect) {

            $scope.date = new Date();
            $scope.email='';
            $scope.password='';
            $scope.loginError=false;
            $scope.registerError=false;
            $scope.loginErrorText='';
            $scope.registerErrorBag = {};
            $scope.redirectMessage = '';

            if( Redirect.receive() ) {
              $scope.redirectMessage = Redirect.receive();
            }

                $scope.login = function() {

                    var credentials = {
                        email: $scope.email,
                        password: $scope.password
                    };

                    $auth.login(credentials)
                      .then(function(response) {
                        return $http.get('/api/authenticate/user?token=' + localStorage.satellizer_token);
                      }, function(response) {
                        $scope.loginError = true;
                        if ( response.data.error === 'invalid_credentials' ) {
                          $scope.loginErrorText = 'Los datos ingresados no son validos';
                          $scope.email = '';
                          $scope.password = '';
                        }
                      }).then(function(response) {
                        if (response) {
                          console.log(response);
                          User.save(response.data);
                          $scope.loginError = false;
                          $scope.loginErrorText = '';
                          Redirect.toOrigin();
                        }
                      });

                };

                $scope.register = function () {
                    $http.post('/api/register',$scope.newUser)
                        .success(function(data){
                            $scope.email=$scope.newUser.email;
                            $scope.password=$scope.newUser.password;
                            $state.go('confirmEmail');
                    }).catch(function(response) {
                        $scope.registerError = true;
                        $scope.registerErrorBag = response.data;
                        // set to invalid for better UX
                        _.each(response.data, function(value, key) {
                            $scope.registerForm[key].$setValidity("resError", false);
                        });
                        $scope.newUser.password = '';
                        $scope.newUser.password_confirmation = '';
                    });
                };


          }]);
