<?php
/**
 * Take A Hike functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Take_A_Hike
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function take_a_hike_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Take A Hike, use a find and replace
		* to change 'take-a-hike' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'take-a-hike', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'take-a-hike' ),
			"footer" => esc_html__ ("Footer Menu Location", "take-a-hike"),
			"social" => esc_html__ ("Social Menu Location", "take-a-hike"),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'take_a_hike_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
	/**
 	* Editor Styles
 	*/
	add_theme_support( 'editor-styles' );
	add_editor_style('editor-style.css');

}
add_action( 'after_setup_theme', 'take_a_hike_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function take_a_hike_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'take_a_hike_content_width', 1920 );
}
add_action( 'after_setup_theme', 'take_a_hike_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function take_a_hike_scripts() {

			// Load Google Fonts
			wp_enqueue_style('take-a-hike-google-fonts', // Unique handle
			'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Teko:wght@400;500;600;700&display=swap', // Path to css file
			array(), // dependencies
			null, // version (have to set null with Google fonts. Only time we enter null here instead of version number)
			'all', // media
		);

	wp_enqueue_style( 'take-a-hike-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'take-a-hike-style', 'rtl', 'replace' );

	wp_enqueue_script( 'take-a-hike-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	
	//Enqueue the Google Maps script from the Google Server
	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAjO7pvmkKQkMrR62RfGptPCAQCu9YIo6U', 
	array(), 
	_S_VERSION, 
	true );
	
	// Enqueue ACF helper code to display the Google Map
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/google-map-script.js', array( 'google-map', 'jquery' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'take_a_hike_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Google Map API
 */
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAjO7pvmkKQkMrR62RfGptPCAQCu9YIo6U';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function tah_post_filter( $use_block_editor, $post ) {
	$page_ids = array( 268, 72, 45 );
	if ( in_array( $post->ID, $page_ids ) ) {
		return false;
	} else {
		return $use_block_editor;
	}
}
add_filter( 'use_block_editor_for_post', 'tah_post_filter', 10, 2 );


/**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom(){
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

/**
 *  Change Logo on Login Page
 */
function wpb_login_logo() { ?> 
    <style type="text/css"> 
        #login h1 a, .login h1 a { 
            background-image: url(https://takeahikeoutfitters.bcitwebdeveloper.ca/wp-content/uploads/2022/06/cropped-tah-logo.png); 
        height:150px;   /* those lines are for custom styling for the logo */ 
        width:150px; 
        background-size: 150px 150px; 
        background-repeat: no-repeat; 
        padding-bottom: 10px; 
        } 
    </style> 
<?php } 
add_action( 'login_enqueue_scripts', 'wpb_login_logo' ); 

/**
 * Change Logo Link to Home Page 
 */

function my_login_logo_url() { 
    return home_url(); 
} 
add_filter( 'login_headerurl', 'my_login_logo_url' ); 
function my_login_logo_url_title() { 
    return 'https://takeahikeoutfitters.bcitwebdeveloper.ca/'; 
} 
add_filter( 'login_headertext', 'my_login_logo_url_title' );

/**
 * Style Login Form & Background
 */

function my_login_form() { ?> 
	<style type="text/css"> 
  body.login div#login form#loginform { 
   background-color:#2b6638; 
   border-radius:2rem; 
   color: #fff;
   } 
   body.login div#login p.message {
	border-left: 4px solid #8d2c19;
   }
   body.login div#login form#loginform .button {
	background: #8d2c19;
	color: #fff;
	border: none;
   }
	</style> 
<?php } 
add_action( 'login_enqueue_scripts', 'my_login_form' );




/**
 * Remove dashboard widgets
 */
function remove_dashboard_widgets() {
//first parameter -> slig/id of the widget
//second parameter -> where the meta box is displayed, it can be page, post, dashboard etc.
//third parameter -> position of the meta box. If you have used wp_add_dashboard_widget to create the widget or 
//deleting default widget then provide the value "normal".
 remove_meta_box('wc_admin_dashboard_setup', 'dashboard', "normal");
 remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
 remove_meta_box('dashboard_activity', 'dashboard', 'normal');
 remove_meta_box('jetpack_summary_widget', 'dashboard', 'normal');
 remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');
 remove_meta_box('wc_newsletter_subscription_stats', 'dashboard', 'normal');
 remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
 remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
 remove_meta_box('dashboard_primary', 'dashboard', 'side');
 remove_action( 'welcome_panel', 'wp_welcome_panel' ); // Removes the welcome panel
}
add_action("wp_dashboard_setup", "remove_dashboard_widgets");

/**
 * Adding custom widgets into dashboard
 */
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Video Tutorials', 'custom_dashboard_help');
	}
	function custom_dashboard_help() {
	echo '<p>Welcome to your website. Here you will find video tutorials on how to add, remove, and edit various content</p>';
	echo '<p><a href="https://www.youtube.com/watch?v=4vQd5e3oX8s" target="_blank">Add, Edit, and Remove Users</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=eBt7zDEd_NY" target="_blank">Edit social media sharing buttons</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=FAqqtB4hPFU" target="_blank">Modify Instagram feed on the home page</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=VkxbcKxRkfg" target="_blank">Edit content on pages</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=VaZwK9d3b2A" target="_blank">Add and edit events</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=3IDb6FUoq5g" target="_blank">Add and edit a simple product</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=qQSqQZsTBUw" target="_blank">Add and edit variable products</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=BNOb3T8uCCc" target="_blank">Add and edit product bundle</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=6lw5jYkaIgA" target="_blank">Add and edit categories, tags, attributes</a></p>';
	echo '<p><a href="https://www.youtube.com/watch?v=Lrhf8z1Ctyk" target="_blank">Add and edit pages</a></p>';
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');


// Remove admin menu links for non-Administrator accounts
function fwd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    	remove_menu_page( 'edit-comments.php' );  // Remove Comments link
		remove_menu_page( 'ivory-search' );
		remove_menu_page( 'wpforms-overview' );
		remove_menu_page( 'themes.php' );
		remove_menu_page( 'edit.php?post_type=acf-field-group' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'plugins.php' );
	}
}
add_action( 'admin_menu', 'fwd_remove_admin_links' );
