<?php
/**
 * Ardent Medical Supply functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ardent_Medical_Supply
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ardent_medical_supply_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ardent Medical Supply, use a find and replace
	 * to change 'ardent-medical-supply' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('ardent-medical-supply', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary (menu-1)', 'ardent-medical-supply'),
			'menu-2' => esc_html__('Top Category Footer (menu-2)', 'ardent-medical-supply'),
			'menu-3' => esc_html__('Footer Quick Links (menu-3)', 'ardent-medical-supply'),
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
			'ardent_medical_supply_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'ardent_medical_supply_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ardent_medical_supply_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ardent_medical_supply_content_width', 640);
}
add_action('after_setup_theme', 'ardent_medical_supply_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ardent_medical_supply_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'ardent-medical-supply'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'ardent-medical-supply'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'ardent_medical_supply_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ardent_medical_supply_scripts()
{
	wp_enqueue_style('ardent-medical-supply-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('ardent-medical-supply-style', 'rtl', 'replace');

	wp_enqueue_script('ardent-medical-supply-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Enqueue Styles
	wp_enqueue_style('bootstrap-min', get_stylesheet_uri());
	wp_enqueue_style('public-sans', get_template_directory_uri() . '/assets/css/public-sans.css');
	wp_enqueue_style('cloudflare-cdnjs', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
	wp_enqueue_style('owl-carousel-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('owl-theme-default-min', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('bootstrap-min-2', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('style.css', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	// wp_enqueue_style('truck-svg', get_stylesheet_uri() . '/assets/css/truck.svg');

	// Enqueue Scripts
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(''), '', true);
	wp_enqueue_script('jquery-3.7.1-slim-min-2', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array('jquery'), '', true);
	wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('bootstrap-bundle-min-2', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '', true);
	wp_enqueue_script('my-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);
	wp_enqueue_script('my-main-js', get_template_directory_uri() . '/assets/js/ardental-custom-contact-form-7.js', array('jquery'), '', true);

}
add_action('wp_enqueue_scripts', 'ardent_medical_supply_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function dddd($val)
{
	echo "<pre>";
	print_r($val);
	echo "</pre>";
	wp_die();
}

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(
		array(
			'page_title' => 'Theme Options',
			'menu_title' => 'Theme Options',
			'menu_slug' => 'theme-options',
			'capability' => 'edit_posts',
			'redirect' => false
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Header Options',
			'menu_title' => 'Header',
			'parent_slug' => 'theme-options',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Footer Options',
			'menu_title' => 'Footer',
			'parent_slug' => 'theme-options',
		)
	);
}

function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

function trim_description_keep_tags($text, $num_words = 50, $more = '...')
{
	$words = preg_split('/\s+/', $text, $num_words + 1);

	if (count($words) > $num_words) {
		array_pop($words);
		$text = implode(' ', $words) . $more;
	}

	return $text;
}

function ardental_filter_blog_posts($orderby = "date", $post_per_page = -1)
{
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $post_per_page,
		'orderby' => $orderby,
	);

	switch ($orderby) {
		case 'popular':
			$args['meta_key'] = 'post_views_count';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;
		case 'insurance':
			$args['tag'] = 'insurance';
			break;
		default:
			break;
	}
	return $args;
}

function ardental_filter_products($orderby = "", $post_per_page = -1)
{
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $post_per_page,
		'orderby' => $orderby,
	);

	switch ($orderby) {
		case 'latest':
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
			break;
		case 'popular':
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;
		case 'insurance':
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_tag',
					'field' => 'slug',
					'terms' => 'insurance',
				),
			);
			break;
		default:
			break;
	}

	return $args;
}


function increment_post_view_count()
{
	if (is_single()) {
		$post_id = get_the_ID();
		$views = get_post_meta($post_id, 'post_views_count', true);
		$views = $views ? $views : 0;
		$views++;
		update_post_meta($post_id, 'post_views_count', $views);
	}
}
add_action('template_redirect', 'increment_post_view_count');

function display_post_view_count()
{
	$post_id = get_the_ID();
	$views = get_post_meta($post_id, 'post_views_count', true);
	return $views;
}

// Remove specific sorting options from the dropdown
function remove_specific_sorting_options($options)
{
	unset($options['popularity']);
	unset($options['rating']);
	unset($options['date']);
	unset($options['default_sorting']);
	unset($options['menu_order']);

	return $options;
}
add_filter('woocommerce_catalog_orderby', 'remove_specific_sorting_options', 20);

function change_default_sorting_label($orderby)
{
	$orderby[''] = __('Price', 'woocommerce');
	$orderby['price-desc'] = __('Price High To Low', 'woocommerce');
	$orderby['price'] = __('Price Low To High', 'woocommerce');
	return $orderby;
}
add_filter('woocommerce_catalog_orderby', 'change_default_sorting_label', 20);

// Sidebar for searching posts
function ardental_register_sidebar()
{
	register_sidebar(
		array(
			'name' => __('Search Posts', 'mytheme'),
			'id' => 'search-posts',
			'description' => __('Search Posts', 'mytheme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
}
add_action('widgets_init', 'ardental_register_sidebar');

function cm_redirect_users_by_role()
{

	if (is_product()) {
		?>
		<style>
			#ssba-bar-2 {
				display: none;
			}
		</style>
		<?php
	}
}
add_action('wp', 'cm_redirect_users_by_role');

// aredental_sign_up_custom_email

add_action('um_custom_field_validation_aredental_sign_up_custom_email', 'um_custom_validate_user_email_details', 999, 3);
function um_custom_validate_user_email_details($key, $array, $args)
{
	if ($key == 'user_email' && isset($args['user_email'])) {
		if (isset(UM()->form()->errors['user_email'])) {
			unset(UM()->form()->errors['user_email']);
		}
		if (empty($args['user_email'])) {
			UM()->form()->add_error('user_email', __('E-mail Address is required', 'ultimate-member'));
		} elseif (!is_email($args['user_email'])) {
			UM()->form()->add_error('user_email', __('The email you entered is invalid', 'ultimate-member'));
		} elseif (email_exists($args['user_email'])) {
			UM()->form()->add_error('user_email', __('The email you entered is already registered', 'ultimate-member'));
		}
	}
}

add_filter('wpcf7_validate_tel', 'custom_validate_phone_number', 10, 2);

function custom_validate_phone_number($result, $tag)
{
	$tag = new WPCF7_Shortcode($tag);

	$phone_number = isset($_POST[$tag->name]) ? trim($_POST[$tag->name]) : '';

	if (!preg_match('/^\d{10}$/', $phone_number)) {
		$result->invalidate($tag, "Please enter a valid 10-digit phone number.");
	}

	return $result;
}

function get_cart_items_count()
{
	// Get the cart instance
	$cart = WC()->cart;

	// Get the count of products in the cart
	$product_count = $cart->get_cart_contents_count();

	return $product_count;
}



function hide_sidebar_css()
{
	if (class_exists('UM') && (is_page('login') || is_page('register') || is_page('profile') || is_page('account') || is_page('forgot-password') || is_page('password-reset') || is_page('user') || is_page('track-order') || is_page('cart') )) {
		?>
		<style>
			#secondary {
				display: none;
			}
		</style>
		<?php
	}
}
add_action('init', 'hide_sidebar_css');

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_after_single_product_summary', 'display_related_products', 15 );
function display_related_products() {
    $product_id = get_the_ID();
    $related_product_ids = wc_get_related_products( $product_id );
    $related_products = array_map( 'wc_get_product', $related_product_ids );
    if ( ! empty( $related_products ) ) {
        ?>
        <section class="related products">
            <h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>
            <?php
            woocommerce_product_loop_start();
            foreach ( $related_products as $related_product ) {
				$post_object = get_post( $related_product->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                wc_get_template_part( 'content', 'product' );
            }
            woocommerce_product_loop_end();
            ?>
        </section>
        <?php
    }
    wp_reset_postdata();
}
