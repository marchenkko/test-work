<?php
/**
 * Functions
 */

/******************************************************************************
                        Included Files
******************************************************************************/

// Run Theme Setup Functions
  include_once(TEMPLATEPATH . '/inc/theme-setup.php');

// Load modules
$theme_includes = [
	'/lib/cleanup.php',                        // Clean up default theme includes
	'/lib/acf_blocks_loader.php',              // ACF Blocks Loader
];

foreach ( $theme_includes as $file ) {
	if ( ! locate_template( $file ) ) {
		/* translators: %s error*/
		trigger_error( esc_html( sprintf( esc_html( __('Error locating %s for inclusion', 'ecpa') ), $file ) ), E_USER_ERROR ); // phpcs:ignore
		continue;
	}
	require_once locate_template( $file );
}
unset( $file, $filepath );


/******************************************************************************
                        Structure Functions
******************************************************************************/

// Register Sidebars
  if ( ! function_exists( 'foundation_widgets_init' ) ) :

    function foundation_widgets_init() {
      /* Sidebar Right */
      register_sidebar( array(
        'id'            => 'foundation_sidebar_right',
        'name'          => __( 'Sidebar Right', 'foundation' ),
        'description'   => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
      ));
    }
    add_action( 'widgets_init', 'foundation_widgets_init' );

  endif;

// ACF Options Pages
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'	=> true
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'Theme Header Settings',
      'menu_title'	=> 'Header',
      'parent_slug'	=> 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'Theme Footer Settings',
      'menu_title'	=> 'Footer',
      'parent_slug'	=> 'theme-general-settings'
    ));

  }


/******************************************************************************
                         Style Functions
 ******************************************************************************/

// Stick Admin Bar To The Top
  if (!is_admin()) {

    function my_filter_head() {
      remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'my_filter_head');

    function stick_admin_bar() { ?>
      <style>
        body.admin-bar {margin-top:32px !important}
        @media screen and (max-width: 782px) {body.admin-bar { margin-top:46px !important }}
        @media screen and (max-width: 600px) {body.admin-bar { margin-top:46px !important } html #wpadminbar{ margin-top: -46px; }}
      </style>
    <?php }
    add_action('admin_head', 'stick_admin_bar');
    add_action('wp_head', 'stick_admin_bar');

  }


// Login Screen Customization
  function wordpress_login_styling() { ?>
    <style>
      .login #login h1 a {
        background-image: url('<?php echo get_header_image(); ?>');
        background-size: contain;
        width: auto;
        height: 220px;
      }
      body.login{
        background-color: #<?php echo get_background_color(); ?>;
        background-image: url('<?php echo get_background_image(); ?>') !important;
        background-repeat: repeat;
        background-position: center center;
      };

    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

  function admin_logo_custom_url(){
    $site_url = home_url();
    return ($site_url);
  }
  add_filter('login_headerurl', 'admin_logo_custom_url');

/********************************************************************************
                         Enqueue Scripts and Styles for Front-End
*********************************************************************************/

function foundation_scripts_and_styles() {
  if (!is_admin()) {

// Load Stylesheets
  // Core
  wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css', null, null );
  wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.min.css', null, null );

  // Plugins
  wp_enqueue_style( 'font-awesome.min', get_template_directory_uri().'/css/plugins/font-awesome.min.css', null, null );

  // System
  wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', null, null );/*2nd priority*/
  wp_enqueue_style( 'media-screens', get_template_directory_uri().'/css/media-screens.css', null, null );/*1st priority*/

// Load JavaScripts
  // Сore
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'foundation.min', get_template_directory_uri() . '/js/foundation.min.js', null, null, true );
  
  // Load the html5 shiv and respond scripts.
  wp_enqueue_script( 'html5shiv-and-respond', get_template_directory_uri() . '/js/plugins/html5shiv-and-respond.js', null, null );
  wp_script_add_data( 'html5shiv-and-respond', 'conditional', 'lt IE 9' );
  
  // Custom javascript
  wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true ); /* This should go first */

  }
}
add_action( 'wp_enqueue_scripts', 'foundation_scripts_and_styles' );


// Initialise Foundation JS
  function foundation_js_init () {
    echo '<script>!function ($) { $(document).foundation(); }(window.jQuery); </script>';
  }
  add_action('wp_footer', 'foundation_js_init', 50); 


/******************************************************************************
                         Additional Functions
*******************************************************************************/

// Remove #more anchor from posts
  function remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) { $end = strpos($link, '"',$offset); }
    if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
    return $link;
  }
  add_filter('the_content_more_link', 'remove_more_jump_link');


// Control Excerpt Length using Filters
  function custom_excerpt_length( ) {
    return 30;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Remove […] string using Filters
  function new_excerpt_more( $more = '...' ) {
    return $more;
  }
  add_filter('excerpt_more', 'new_excerpt_more');


// Make the "read more" link to the post
  function new_excerpt_more_link( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'foundation') . '</a>';
  }
  add_filter( 'excerpt_more', 'new_excerpt_more_link' );


// Broken admin in chrome
  function chromefix_inline_css() { 
    wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ( 0 ); }' );
  }
  add_action('admin_enqueue_scripts', 'chromefix_inline_css');


// Enable option to hide labels in Gravity Forms
  add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


// Custom Image Sizes
  if ( ! function_exists( 'custom_image_sizes' ) ) :
    /**
     * Use this function for creation of custom image sizes via add_image_size()
     */
    function custom_image_sizes() {
      //add_image_size( 'custom-size', 400, 200, true );
    }
    add_action( 'after_setup_theme', 'custom_image_sizes' );

  endif;

/************************ PUT YOUR FUNCTIONS BELOW ************************/




?>