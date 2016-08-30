@extends('global.layouts.layout-default')
@section('body_class')
site-menubar-hide app-forum
@endsection
@section('body')
<!-- Page -->
<div class="page animsition" ng-controller="reviewController" ng-init="init( '{{$url}}' )">
  <div class="page-content container-fluid">
    <div class="row">
    <div class="col-md-9">
      <div class="panel">
        <header class="slidePanel-header">
          <h1>[[ review.title ]]</h1>
          <h4>[[ review.client ]]<span class="rating" data-score="[[ review.score ]]" data-plugin="rating" data-read-only="true"></span></h4>

        </header>
        <div class="slidePanel-inner">
          <section class="slidePanel-inner-section">
            <div class="forum-header">
              <a class="avatar" href="javascript:void(0)">
                <img src="[[ review.author.avatar ]]" alt="...">
              </a>
              <span class="name">[[ review.author.username ]]</span>
              <time class="posted" datetime=""></time>
            </div>
            <div class="forum-content">
              <p>[[ review.description ]]</p>
            </div>
            <div class="forum-metas">
              <div class="pull-right">
                <button type="button" class="btn btn-icon btn-pure btn-default">
                  <i class="icon wb-thumb-up" aria-hidden="true"></i>
                  <span class="num">2</span>
                </button>
              </div>
              <div class="button-group share">
                Compartir:
                <button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon bd-twitter" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon bd-facebook" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon bd-dribbble" aria-hidden="true"></i></button>
              </div>
            </div>
          </section>
          <h3>Comentarios</h3>
          <div ng-show="!review.comments.length">Nadie ha comentado a&uacute;n</div>
          <section class="slidePanel-inner-section" ng-repeat="comment in review.comments | orderBy: 'created_at' | limitTo: limit">
            <div class="forum-header">
              <div class="pull-right">#
                <span class="floor">[[ $index + 1 ]]</span>
              </div>
              <a class="avatar" href="javascript:void(0)">
                <img src="[[ comment.author.avatar ]]" gravatar-size="40">
              </a>

              <span class="name">[[ comment.author.username ]]</span>
              <small>[[ comment.created_at ]]</small>
            </div>
            <div class="forum-content">
              <p>[[ comment.text ]]</p>
              <div class="pull-right">
                <button type="button" class="btn btn-icon btn-pure btn-default">
                  <i class="icon wb-thumb-up" aria-hidden="true"></i>
                  <span class="num">2</span>
                </button>
              </div>
            </div>
          </section>
          <a class="btn btn-block btn-default profile-readMore" ng-show="lessShow" ng-click="showLess()">Mostrar menos</a>
          <a class="btn btn-block btn-default profile-readMore" ng-show="moreShow" ng-click="showMore()">Mostrar m&aacute;s</a>

            @include('front.comment.add-form')
            @include('front.comment.needs-login')

        </div>
        </div>
        <!-- Panel -->
        </div>

        @include('front.review.populars')
    </div>
</div>
</div>
@endsection
