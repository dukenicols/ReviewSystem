angular.module('commentService', []).config(['$provide', function($provide) {
	$provide.factory('Comment', ['$http', function($http) {
		return {
			get: function(review_id) {
				return $http.get('/api/review/' + review_id + '/comments');
			},

			// save a comment (pass in comment data)
			save : function(commentData) {
				return $http({
					method: 'POST',
					url: '/api/review/' + commentData.review_id + '/comment',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},

			destroy: function(id) {
				return $http.delete('/api/comments/' + id);
			}
		};
	}]);
}]);
