<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse bg-indigo-600"
  role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <a href="{{ url('/') }}" alt="home">
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <img class="navbar-brand-logo hidden-xs" src="{{ asset('images/logo-blue.png') }}" title="Remark">
        <img class="navbar-brand-logo hidden-sm hidden-md hidden-lg" src="{{ asset('images/logo.png') }}"
        title="Remark">
        <span class="navbar-brand-text">Review</span>
      </div>
    </a>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse collapsed navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          {{--
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="hidden-xs" id="toggleFullscreen">
            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li> --}}
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li ng-if="!isAuthenticated()"><a href="/auth/#/login">Ingresar</a></li>
            <li ng-if="!isAuthenticated()"><a href="/auth/#/register">Registro</a></li>
            <li uib-dropdown is-open="status.isopen" ng-if="isAuthenticated()">
              <a class="navbar-avatar" uib-dropdown-toggle href="#" aria-expanded="false"
              data-animation="scale-up" role="button">
                <span style="margin-right: 20px; line-height: 30px">[[ user.username ]]</span>
                <span class="avatar avatar-online">
                  <img ng-src="[[ user.avatar ]]" alt="...">
                  <i></i>
                </span>
              </a>
              <ul uib-dropdown-menu role="menu">
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Perfil</a>
                </li>
                <li class="divider" role="presentation"></li>
                <li role="presentation">
                  <a href="/auth/#/logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Salir</a>
                </li>
              </ul>
            </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
