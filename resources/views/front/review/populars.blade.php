<div class="col-md-3" id="sidebar">
  <!-- Example Panel Toolbar -->
    <div class="panel" ng-controller="AddReviewController">
      <div class="panel-heading">
        <div class="panel-actions">
          <a class="panel-action icon wb-refresh show-on-hover" aria-hidden="true" ng-click="reset()"></a>
          <a class="panel-action icon wb-expand show-on-hover" aria-hidden="true" ng-if="expandEnable" ng-click="expand()"></a>
        </div>
        <h3 class="panel-title">A&ntilde;ade una rese&ntilde;a</h3>
      </div>
      <div class="panel-collapse">
        <div class="panel-body">
          <form name="addReview" id="addReview" ng-submit="publishReview()">
            <div ng-if="message" class="alert alert-success" ng-bind="message"></div>
          <input type="text" class="form-control panel-control" name="title" ng-model="reviewData.title" placeholder="Titulo">
          <input type="text" ng-if="extraFields" class="form-control panel-control" name="client" ng-model="reviewData.client" placeholder="Compa&ntilde;ia">
          <input type="text" ng-if="extraFields" class="form-control panel-control" name="url" ng-model="reviewData.url" placeholder="Sitio web">
          <div ng-if="extraFields">Puntuaci&oacute;n
            <div ng-raty="ratyOptions" ng-model="reviewData.score"></div>
          </div>
          <textarea class="form-control panel-control height-full" name="description" ng-model="reviewData.description" placeholder="Descripcion..."
          rows="5"></textarea>
          <button type="submit" class="btn btn-primary btn-sm margin-top-15 pull-right">Publicar</button>
          </form>
        </div>
      </div>
    </div>
    <!-- End Example Panel Toolbar -->
    <!-- Example Media -->

      <h4 class="example-title">Rese&ntilde;as populares</h4>
      <div class="panel">
      <ul class="list-group list-group-full">
        <li class="list-group-item" ng-repeat="post in populars | limitTo: 5">
          <div class="media">
            <div class="media-left">
              <a class="avatar" href="javascript:void(0)">
                <img ng-src="[[ post.author.avatar ]]" alt="[[ post.author.username ]]" class="img-responsive"></a>
            </div>
            <div class="media-body">
              <h4 class="media-heading"><a href="/review/[[ post.review_url ]]">[[ post.title ]]</a></h4>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- End Example Media -->
    <div class="panel panel-left">
      <div class="panel-body">
        &copy; 2016 Sitio.com
      </div>
    </div>
</div>
