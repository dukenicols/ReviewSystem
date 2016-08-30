@extends('global.layouts.layout-default')
@section('page_title')
Inicio
@endsection
@section('body_class')
site-menubar-hide
@endsection
@section('body')
<div class="page animsition">
<div class="page-content container-fluid">
  <div class="row">

    <div class="col-md-9" id="main">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-body nav-tabs-animate">
          <uib-tabset>
            <uib-tab heading="Recientes">
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                  <ul class="list-group">
                     <li class="list-group-item" ng-repeat="review in reviews">
                        <div class="media">
                          <div class="media-left">
                            <a class="avatar" href="javascript:void(0)">
                              <img class="img-responsive" ng-src="[[ review.author.avatar ]]"
                              alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="/review/[[ review.review_url ]]"><h4 class="media-heading">[[ review.title ]]</h4></a>
                            <h5>[[ review.client ]]
                              <span ng-raty="ratyOptions" ng-model="review.score"></span>
                            </h5>
                            <span>Publicado por [[ review.author.username ]]</span>
                            <time class="posted" datetime=""></time>
                            <div class="profile-brief">[[ review.description ]]</div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item" ng-if="loading" ng-repeat="n in [1,2,3,4,5]">
                         <div class="media">
                           <div class="media-left">
                             <a class="avatar is-preloaded" href="javascript:void(0)">
                               <img class="img-responsive">
                             </a>
                           </div>
                           <div class="media-body">
                             <a href="javascript:void(0);">
                               <h4 class="media-heading is-preloaded"></h4>
                             </a>
                             <h5 class="media-subheading is-preloaded">

                             </h5>
                             <span class="is-preloaded username"></span>
                             <time class="posted" datetime=""></time>
                             <div class="profile-brief is-preloaded">[[ review.description ]]</div>
                           </div>
                         </div>
                       </li>
                  </ul>
                <div class="slidePanel-loading slidePanel-loading-show" ng-show="loading">
                  <div class="loader loader-default"></div>
                </div>
                <a class="btn btn-block btn-default profile-readMore" ng-show="lessShow" ng-click="showLess()">Mostrar menos</a>
                <a class="btn btn-block btn-default profile-readMore" ng-show="moreShow" ng-click="showMore()">Mostrar m&aacute;s</a>
                </div>
              </div>
            </uib-tab>
            <uib-tab heading="Populares">
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                  <ul class="list-group">
                     <li class="list-group-item" ng-repeat="review in populars">
                        <div class="media">
                          <div class="media-left">
                            <a class="avatar" href="javascript:void(0)">
                              <img class="img-responsive" ng-src="[[ review.author.avatar ]]"
                              alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="/review/[[ review.review_url ]]"><h4 class="media-heading">[[ review.title ]]</h4></a>
                            <h5>[[ review.client ]]
                              <span ng-raty="ratyOptions" ng-model="review.score"></span>
                            </h5>
                            <span>Publicado por [[ review.author.username ]]</span>
                            <time class="posted" datetime=""></time>
                            <div class="profile-brief">[[ review.description ]]</div>
                          </div>
                        </div>
                      </li>
                  </ul>
                <a class="btn btn-block btn-default profile-readMore" ng-show="morePopularShow" ng-click="showMorePopulars()">Mostrar m&aacute;s</a>
                </div>
              </div>
            </uib-tab>
          </uib-tabset>
        </div>
      </div>
      <!-- End Panel -->
    </div>

    @include('front.review.populars')



  </div>
</div>
</div>
@endsection
