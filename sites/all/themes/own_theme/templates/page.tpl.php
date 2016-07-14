<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<div class="header_wrapper">
    <header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
      <div class="<?php print $container_class; ?>">
        <div class="navbar-header">
          <?php if ($logo): ?>
            <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if (!empty($site_name)): ?>
            <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>

          <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <?php endif; ?>
        </div>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <div class="navbar-collapse collapse main-menu">
            <nav role="navigation">
              <?php if (!empty($primary_nav)): ?>
                <?php print render($primary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($secondary_nav)): ?>
                <?php print render($secondary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($page['navigation'])): ?>
                <?php print render($page['navigation']); ?>
              <?php endif; ?>
            </nav>
          </div>
        <?php endif; ?>
      </div>
    </header>
    
    <div class="banner-text animatedParent">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 banner-text">
                    <?php print render($page['banner_text']); ?>
                    <a href="" class="banner-button animated bounceInUp findMe">Read More</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div>
    <div class="container">
         <div class="row">
            <div class="col-sm-12 about-us-tab animatedParent">
                <?php print render($page['equal']); ?>
            </div>
        
        </div>
    </div>
</div>

<div class="gellary-section">
    <?php print render($page['gellary']); ?>
</div>

<div class="home-services">
    <div class="container">
        <div class="row">
            <?php print render($page['home_services']); ?>
        </div>
    </div>
</div>

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->
    
   

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<?php if (!empty($page['footer'])): ?>
  <footer class="footer <?php print $container_class; ?>">
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
















<script>

    /*
 * CSS3 Animate it
 * Copyright (c) 2014 Jack McCourt
 * https://github.com/kriegar/css3-animate-it
 * Version: 0.1.0
 * 
 * I utilise the jQuery.appear plugin within this javascript file so here is a link to that too
 * https://github.com/morr/jquery.appear
 *
 * I also utilise the jQuery.doTimeout plugin for the data-sequence functionality so here is a link back to them.
 * http://benalman.com/projects/jquery-dotimeout-plugin/
 */





(function($) {
  var selectors = [];

  var check_binded = false;
  var check_lock = false;
  var defaults = {
    interval: 250,
    force_process: false
  }
  var $window = $(window);

  var $prior_appeared;

  function process() {
    check_lock = false;
    for (var index = 0; index < selectors.length; index++) {
      var $appeared = $(selectors[index]).filter(function() {
        return $(this).is(':appeared');
      });

      $appeared.trigger('appear', [$appeared]);

      if ($prior_appeared) {
        
        var $disappeared = $prior_appeared.not($appeared);
        $disappeared.trigger('disappear', [$disappeared]);
      }
      $prior_appeared = $appeared;
    }
  }

  // "appeared" custom filter
  $.expr[':']['appeared'] = function(element) {
    var $element = $(element);
    if (!$element.is(':visible')) {
      return false;
    }

    var window_left = $window.scrollLeft();
    var window_top = $window.scrollTop();
    var offset = $element.offset();
    var left = offset.left;
    var top = offset.top;

    if (top + $element.height() >= window_top &&
        top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() &&
        left + $element.width() >= window_left &&
        left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
      return true;
    } else {
      return false;
    }
  }

  $.fn.extend({
    // watching for element's appearance in browser viewport
    appear: function(options) {
      var opts = $.extend({}, defaults, options || {});
      var selector = this.selector || this;
      if (!check_binded) {
        var on_check = function() {
          if (check_lock) {
            return;
          }
          check_lock = true;

          setTimeout(process, opts.interval);
        };

        $(window).scroll(on_check).resize(on_check);
        check_binded = true;
      }

      if (opts.force_process) {
        setTimeout(process, opts.interval);
      }
      selectors.push(selector);
      return $(selector);
    }
  });

  $.extend({
    // force elements's appearance check
    force_appear: function() {
      if (check_binded) {
        process();
        return true;
      };
      return false;
    }
  });
}(jQuery));



/*!
 * jQuery doTimeout: Like setTimeout, but better! - v1.0 - 3/3/2010
 * http://benalman.com/projects/jquery-dotimeout-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */

// Script: jQuery doTimeout: Like setTimeout, but better!
//
// *Version: 1.0, Last updated: 3/3/2010*
// 
// Project Home - http://benalman.com/projects/jquery-dotimeout-plugin/
// GitHub       - http://github.com/cowboy/jquery-dotimeout/
// Source       - http://github.com/cowboy/jquery-dotimeout/raw/master/jquery.ba-dotimeout.js
// (Minified)   - http://github.com/cowboy/jquery-dotimeout/raw/master/jquery.ba-dotimeout.min.js (1.0kb)
// 
// About: License
// 
// Copyright (c) 2010 "Cowboy" Ben Alman,
// Dual licensed under the MIT and GPL licenses.
// http://benalman.com/about/license/
// 
// About: Examples
// 
// These working examples, complete with fully commented code, illustrate a few
// ways in which this plugin can be used.
// 
// Debouncing      - http://benalman.com/code/projects/jquery-dotimeout/examples/debouncing/
// Delays, Polling - http://benalman.com/code/projects/jquery-dotimeout/examples/delay-poll/
// Hover Intent    - http://benalman.com/code/projects/jquery-dotimeout/examples/hoverintent/
// 
// About: Support and Testing
// 
// Information about what version or versions of jQuery this plugin has been
// tested with, what browsers it has been tested in, and where the unit tests
// reside (so you can test it yourself).
// 
// jQuery Versions - 1.3.2, 1.4.2
// Browsers Tested - Internet Explorer 6-8, Firefox 2-3.6, Safari 3-4, Chrome 4-5, Opera 9.6-10.1.
// Unit Tests      - http://benalman.com/code/projects/jquery-dotimeout/unit/
// 
// About: Release History
// 
// 1.0 - (3/3/2010) Callback can now be a string, in which case it will call
//       the appropriate $.method or $.fn.method, depending on where .doTimeout
//       was called. Callback must now return `true` (not just a truthy value)
//       to poll.
// 0.4 - (7/15/2009) Made the "id" argument optional, some other minor tweaks
// 0.3 - (6/25/2009) Initial release

(function($){
  '$:nomunge'; // Used by YUI compressor.
  
  var cache = {},
    
    // Reused internal string.
    doTimeout = 'doTimeout',
    
    // A convenient shortcut.
    aps = Array.prototype.slice;
  
  // Method: jQuery.doTimeout
  // 
  // Initialize, cancel, or force execution of a callback after a delay.
  // 
  // If delay and callback are specified, a doTimeout is initialized. The
  // callback will execute, asynchronously, after the delay. If an id is
  // specified, this doTimeout will override and cancel any existing doTimeout
  // with the same id. Any additional arguments will be passed into callback
  // when it is executed.
  // 
  // If the callback returns true, the doTimeout loop will execute again, after
  // the delay, creating a polling loop until the callback returns a non-true
  // value.
  // 
  // Note that if an id is not passed as the first argument, this doTimeout will
  // NOT be able to be manually canceled or forced. (for debouncing, be sure to
  // specify an id).
  // 
  // If id is specified, but delay and callback are not, the doTimeout will be
  // canceled without executing the callback. If force_mode is specified, the
  // callback will be executed, synchronously, but will only be allowed to
  // continue a polling loop if force_mode is true (provided the callback
  // returns true, of course). If force_mode is false, no polling loop will
  // continue, even if the callback returns true.
  // 
  // Usage:
  // 
  // > jQuery.doTimeout( [ id, ] delay, callback [, arg ... ] );
  // > jQuery.doTimeout( id [, force_mode ] );
  // 
  // Arguments:
  // 
  //  id - (String) An optional unique identifier for this doTimeout. If id is
  //    not specified, the doTimeout will NOT be able to be manually canceled or
  //    forced.
  //  delay - (Number) A zero-or-greater delay in milliseconds after which
  //    callback will be executed. 
  //  callback - (Function) A function to be executed after delay milliseconds.
  //  callback - (String) A jQuery method to be executed after delay
  //    milliseconds. This method will only poll if it explicitly returns
  //    true.
  //  force_mode - (Boolean) If true, execute that id's doTimeout callback
  //    immediately and synchronously, continuing any callback return-true
  //    polling loop. If false, execute the callback immediately and
  //    synchronously but do NOT continue a callback return-true polling loop.
  //    If omitted, cancel that id's doTimeout.
  // 
  // Returns:
  // 
  //  If force_mode is true, false or undefined and there is a
  //  yet-to-be-executed callback to cancel, true is returned, but if no
  //  callback remains to be executed, undefined is returned.
  
  $[doTimeout] = function() {
    return p_doTimeout.apply( window, [ 0 ].concat( aps.call( arguments ) ) );
  };
  
  // Method: jQuery.fn.doTimeout
  // 
  // Initialize, cancel, or force execution of a callback after a delay.
  // Operates like <jQuery.doTimeout>, but the passed callback executes in the
  // context of the jQuery collection of elements, and the id is stored as data
  // on the first element in that collection.
  // 
  // If delay and callback are specified, a doTimeout is initialized. The
  // callback will execute, asynchronously, after the delay. If an id is
  // specified, this doTimeout will override and cancel any existing doTimeout
  // with the same id. Any additional arguments will be passed into callback
  // when it is executed.
  // 
  // If the callback returns true, the doTimeout loop will execute again, after
  // the delay, creating a polling loop until the callback returns a non-true
  // value.
  // 
  // Note that if an id is not passed as the first argument, this doTimeout will
  // NOT be able to be manually canceled or forced (for debouncing, be sure to
  // specify an id).
  // 
  // If id is specified, but delay and callback are not, the doTimeout will be
  // canceled without executing the callback. If force_mode is specified, the
  // callback will be executed, synchronously, but will only be allowed to
  // continue a polling loop if force_mode is true (provided the callback
  // returns true, of course). If force_mode is false, no polling loop will
  // continue, even if the callback returns true.
  // 
  // Usage:
  // 
  // > jQuery('selector').doTimeout( [ id, ] delay, callback [, arg ... ] );
  // > jQuery('selector').doTimeout( id [, force_mode ] );
  // 
  // Arguments:
  // 
  //  id - (String) An optional unique identifier for this doTimeout, stored as
  //    jQuery data on the element. If id is not specified, the doTimeout will
  //    NOT be able to be manually canceled or forced.
  //  delay - (Number) A zero-or-greater delay in milliseconds after which
  //    callback will be executed. 
  //  callback - (Function) A function to be executed after delay milliseconds.
  //  callback - (String) A jQuery.fn method to be executed after delay
  //    milliseconds. This method will only poll if it explicitly returns
  //    true (most jQuery.fn methods return a jQuery object, and not `true`,
  //    which allows them to be chained and prevents polling).
  //  force_mode - (Boolean) If true, execute that id's doTimeout callback
  //    immediately and synchronously, continuing any callback return-true
  //    polling loop. If false, execute the callback immediately and
  //    synchronously but do NOT continue a callback return-true polling loop.
  //    If omitted, cancel that id's doTimeout.
  // 
  // Returns:
  // 
  //  When creating a <jQuery.fn.doTimeout>, the initial jQuery collection of
  //  elements is returned. Otherwise, if force_mode is true, false or undefined
  //  and there is a yet-to-be-executed callback to cancel, true is returned,
  //  but if no callback remains to be executed, undefined is returned.
  
  $.fn[doTimeout] = function() {
    var args = aps.call( arguments ),
      result = p_doTimeout.apply( this, [ doTimeout + args[0] ].concat( args ) );
    
    return typeof args[0] === 'number' || typeof args[1] === 'number'
      ? this
      : result;
  };
  
  function p_doTimeout( jquery_data_key ) {
    var that = this,
      elem,
      data = {},
      
      // Allows the plugin to call a string callback method.
      method_base = jquery_data_key ? $.fn : $,
      
      // Any additional arguments will be passed to the callback.
      args = arguments,
      slice_args = 4,
      
      id        = args[1],
      delay     = args[2],
      callback  = args[3];
    
    if ( typeof id !== 'string' ) {
      slice_args--;
      
      id        = jquery_data_key = 0;
      delay     = args[1];
      callback  = args[2];
    }
    
    // If id is passed, store a data reference either as .data on the first
    // element in a jQuery collection, or in the internal cache.
    if ( jquery_data_key ) { // Note: key is 'doTimeout' + id
      
      // Get id-object from the first element's data, otherwise initialize it to {}.
      elem = that.eq(0);
      elem.data( jquery_data_key, data = elem.data( jquery_data_key ) || {} );
      
    } else if ( id ) {
      // Get id-object from the cache, otherwise initialize it to {}.
      data = cache[ id ] || ( cache[ id ] = {} );
    }
    
    // Clear any existing timeout for this id.
    data.id && clearTimeout( data.id );
    delete data.id;
    
    // Clean up when necessary.
    function cleanup() {
      if ( jquery_data_key ) {
        elem.removeData( jquery_data_key );
      } else if ( id ) {
        delete cache[ id ];
      }
    };
    
    // Yes, there actually is a setTimeout call in here!
    function actually_setTimeout() {
      data.id = setTimeout( function(){ data.fn(); }, delay );
    };
    
    if ( callback ) {
      // A callback (and delay) were specified. Store the callback reference for
      // possible later use, and then setTimeout.
      data.fn = function( no_polling_loop ) {
        
        // If the callback value is a string, it is assumed to be the name of a
        // method on $ or $.fn depending on where doTimeout was executed.
        if ( typeof callback === 'string' ) {
          callback = method_base[ callback ];
        }
        
        callback.apply( that, aps.call( args, slice_args ) ) === true && !no_polling_loop
          
          // Since the callback returned true, and we're not specifically
          // canceling a polling loop, do it again!
          ? actually_setTimeout()
          
          // Otherwise, clean up and quit.
          : cleanup();
      };
      
      // Set that timeout!
      actually_setTimeout();
      
    } else if ( data.fn ) {
      // No callback passed. If force_mode (delay) is true, execute the data.fn
      // callback immediately, continuing any callback return-true polling loop.
      // If force_mode is false, execute the data.fn callback immediately but do
      // NOT continue a callback return-true polling loop. If force_mode is
      // undefined, simply clean up. Since data.fn was still defined, whatever
      // was supposed to happen hadn't yet, so return true.
      delay === undefined ? cleanup() : data.fn( delay === false );
      return true;
      
    } else {
      // Since no callback was passed, and data.fn isn't defined, it looks like
      // whatever was supposed to happen already did. Clean up and quit!
      cleanup();
    }
    
  };
  
}(jQuery));




//CSS3 Animate-it
(function($) {
  $(document).ready(function() {
    
    $('a').click(function() {
        show_alert();
    });
});
$('.animatedParent').appear();
$('.animatedClick').click(function(){
  var target = $(this).attr('data-target');

  
  if($(this).attr('data-sequence') != undefined){
    var firstId = $("."+target+":first").attr('data-id');
    var lastId = $("."+target+":last").attr('data-id');
    var number = firstId;

    //Add or remove the class
    if($("."+target+"[data-id="+ number +"]").hasClass('go')){
      $("."+target+"[data-id="+ number +"]").addClass('goAway');
      $("."+target+"[data-id="+ number +"]").removeClass('go');
    }else{
      $("."+target+"[data-id="+ number +"]").addClass('go');
      $("."+target+"[data-id="+ number +"]").removeClass('goAway');
    }
    number ++;
    delay = Number($(this).attr('data-sequence'));
    $.doTimeout(delay, function(){
      console.log(lastId);
      
      //Add or remove the class
      if($("."+target+"[data-id="+ number +"]").hasClass('go')){
        $("."+target+"[data-id="+ number +"]").addClass('goAway');
        $("."+target+"[data-id="+ number +"]").removeClass('go');
      }else{
        $("."+target+"[data-id="+ number +"]").addClass('go');
        $("."+target+"[data-id="+ number +"]").removeClass('goAway');
      }

      //increment
      ++number;

      //continute looping till reached last ID
      if(number <= lastId){return true;}
    });
  }else{
    if($('.'+target).hasClass('go')){
      $('.'+target).addClass('goAway');
      $('.'+target).removeClass('go');
    }else{
      $('.'+target).addClass('go');
      $('.'+target).removeClass('goAway');
    }
  } 
});
 

$(document.body).on('appear', '.animatedParent', function(e, $affected){
  var ele = $(this).find('.animated');
  var parent = $(this);
  

  if(parent.attr('data-sequence') != undefined){
    
    var firstId = $(this).find('.animated:first').attr('data-id');
    var number = firstId;
    var lastId = $(this).find('.animated:last').attr('data-id');

    $(parent).find(".animated[data-id="+ number +"]").addClass('go');
    number ++;
    delay = Number(parent.attr('data-sequence'));

    $.doTimeout(delay, function(){
      $(parent).find(".animated[data-id="+ number +"]").addClass('go');
      ++number;
      if(number <= lastId){return true;}
    });
  }else{
    ele.addClass('go');
  }
  
});/*

 $(document.body).on('disappear', '.animatedParent', function(e, $affected) {
  if(!$(this).hasClass('animateOnce')){
    $(this).find('.animated').removeClass('go');
   }
 });
*/
 $(window).load(function(){
  $.force_appear();
 });
 }(jQuery)); 
        
</script>
