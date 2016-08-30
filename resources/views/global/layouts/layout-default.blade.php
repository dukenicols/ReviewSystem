<!DOCTYPE html>
<html class="no-js css-menubar" lang="es" ng-app="reviewApp" ng-controller="mainController">
  <head>
    @include('global.layouts.partials.head')
  </head>
  <body class="@yield('body_class')">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('global.layouts.partials.navbar')
    @yield('site_menubar')

    @yield('body')

    <!-- Footer -->
    @include('global.layouts.partials.footer')

    {{-- @include('global.layouts.partials.javascripts') --}}
  </body>
</html>
