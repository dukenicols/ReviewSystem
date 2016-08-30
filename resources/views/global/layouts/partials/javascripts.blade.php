<!-- Core  -->
<script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('vendor/asscroll/jquery-asScroll.js') }}"></script>
<script src="{{ asset('vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('vendor/asscrollable/jquery.asScrollable.all.js') }}"></script>
<script src="{{ asset('vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('vendor/slidepanel/jquery-slidePanel.js') }}"></script>
@yield('js_vendor')

<!-- Scripts -->
<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/sections/menu.js') }}"></script>
<script src="{{ asset('js/sections/menubar.js') }}"></script>
<script src="{{ asset('js/sections/sidebar.js') }}"></script>
<script src="{{ asset('js/configs/config-colors.js') }}"></script>
<script src="{{ asset('js/configs/config-tour.js') }}"></script>
@yield('js_components')
<script src="{{ asset('js/components/asscrollable.js') }}"></script>
<script src="{{ asset('js/components/animsition.js') }}"></script>
<script src="{{ asset('js/components/slidepanel.js') }}"></script>
<script src="{{ asset('js/components/switchery.js') }}"></script>
<script src="{{ asset('js/components/timeago.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

<script>
	(function(document, window, $) {
	  'use strict';
	  var Site = window.Site;
	  $(document).ready(function() {
	    Site.run();
	  });
	})(document, window, jQuery);
</script>