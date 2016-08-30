@extends('global.layouts.layout-blank')

@section('body_class')
page-login-v2 layout-full page-dark
@endsection

@section('body')
<!-- Page -->
<div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
  <div class="page-content">
    <div class="page-brand-info">
      <div class="brand">
        <img class="brand-img" src="../../../../assets/images/logo@2x.png" alt="...">
        <h2 class="brand-text font-size-40">Remark</h2>
      </div>
      <p class="font-size-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="page-login-main">
      <div class="brand visible-xs">
        <img class="brand-img" src="../../../../assets/images/logo-blue@2x.png" alt="...">
        <h3 class="brand-text font-size-40">Remark</h3>
      </div>
      <h3 class="font-size-24">Sign In</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      <form method="post" action="login-v2.html">
        <div class="form-group">
          <label class="sr-only" for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password"
          placeholder="Password">
        </div>
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
            <input type="checkbox" id="remember" name="checkbox">
            <label for="inputCheckbox">Remember me</label>
          </div>
          <a class="pull-right" href="forgot-password.html">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
      </form>
      <p>No account? <a href="register-v2.html">Sign Up</a></p>
      <footer class="page-copyright">
        <p>WEBSITE BY amazingSurge</p>
        <p>© 2015. All RIGHT RESERVED.</p>
        <div class="social">
          <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
</div>
<!-- End Page -->
@endsection

@section('old')
<div class="container" ng-app="authApp" ng-controller="authController">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" ng-model="email">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" ng-model="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button ng-click="login()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
