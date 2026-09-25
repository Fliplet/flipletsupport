// Running jQuery in noConflict mode
// For more information: https://api.jquery.com/jquery.noconflict/

jQuery.noConflict();

(function( $ ) {
  $(function() {
    // Functions
    function refreshCodeBlocks() {
      $('.CodeMirror').each(function(i, el) {
        if (!el.CodeMirror) {
          return;
        }
    
        el.CodeMirror.refresh();
      });
    }

    function attachBootstrapHandlers() {
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        refreshCodeBlocks();
      })
    }

    function addResponsiveWrapperToIframes() {
      $('iframe').each(function () {
        var hasSource = $(this).attr('src');

        if ($(this).parent('.embed-responsive').length || !hasSource) {
          return;
        }

        $(this).wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
      });
    }

    function updateMobileSearchViewport() {
      var mobileMenu = document.getElementById('navbar-mobile');

      if (!mobileMenu) {
        return;
      }

      if (window.innerWidth > 1075) {
        mobileMenu.style.removeProperty('height');
        document.documentElement.style.removeProperty('--mobile-search-results-height');
        return;
      }

      var viewport = window.visualViewport;
      var visibleBottom = viewport ? viewport.offsetTop + viewport.height : window.innerHeight;
      var navbar = document.querySelector('.navbar');
      var menuTop = navbar ? navbar.getBoundingClientRect().bottom : mobileMenu.getBoundingClientRect().top;
      var activeInput = document.activeElement;

      mobileMenu.style.height = Math.max(0, visibleBottom - menuTop) + 'px';

      if (activeInput && $(activeInput).is('.searchform input[name="s"]')) {
        var resultsHeight = Math.max(0, visibleBottom - activeInput.getBoundingClientRect().bottom - 8);
        document.documentElement.style.setProperty('--mobile-search-results-height', resultsHeight + 'px');
      }
    }

    function scheduleMobileSearchViewportUpdate() {
      window.requestAnimationFrame(updateMobileSearchViewport);
    }

    function attachMobileSearchViewportHandlers() {
      window.addEventListener('resize', scheduleMobileSearchViewportUpdate);

      if (window.visualViewport) {
        window.visualViewport.addEventListener('resize', scheduleMobileSearchViewportUpdate);
        window.visualViewport.addEventListener('scroll', scheduleMobileSearchViewportUpdate);
      }

      $(document).on('focusin focusout input', '.searchform input[name="s"]', scheduleMobileSearchViewportUpdate);
      $('#navbar-mobile').on('scroll', scheduleMobileSearchViewportUpdate);
      updateMobileSearchViewport();
    }

    attachBootstrapHandlers();
    addResponsiveWrapperToIframes();
    attachMobileSearchViewportHandlers();
  });
})(jQuery);
