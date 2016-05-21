<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

if (function_exists('pll_register_string')) {

pll_register_string('I-eat-strict-vegetarian', 'I-eat-strict-vegetarian');
pll_register_string('I-do-not-eat-meat', 'I-do-not-eat-meat');
pll_register_string('No-meat', 'No-meat');
pll_register_string('No-fish', 'No-fish');
pll_register_string('No-honey', 'No-honey');
pll_register_string('No-eggs', 'No-eggs');
pll_register_string('No-milk', 'No-milk');
pll_register_string('No-butter', 'No-butter');
pll_register_string('No-minced-beef', 'No-minced-beef');
pll_register_string('No-poultry', 'No-poultry');
pll_register_string('No-seafood', 'No-seafood');
pll_register_string('No-dairy', 'No-dairy');
pll_register_string('No-animal-fat', 'No-animal-fat');
pll_register_string('No-animal-products', 'No-animal-products');
pll_register_string('No-animal-flavors', 'No-animal-flavors');
pll_register_string('Please-dont-use', 'Please-dont-use');
pll_register_string('Things-not-to-use', 'Things-not-to-use');
pll_register_string('I-eat-plant-products', 'I-eat-plant-products');
pll_register_string('Grains', 'Grains');
pll_register_string('Beans', 'Beans');
pll_register_string('Vegetables', 'Vegetables');
pll_register_string('Fruits', 'Fruits');
pll_register_string('Nuts', 'Nuts');
pll_register_string('Vegetable-oil', 'Vegetable-oil');
pll_register_string('Leafy-greens', 'Leafy-greens');
pll_register_string('Spices', 'Spices');

pll_register_string('Meat-samples', 'Meat-samples');
pll_register_string('Minced-beef-samples', 'Minced-beef-samples');
pll_register_string('Poultry-samples', 'Poultry-samples');
pll_register_string('Seafood-samples', 'Seafood-samples');
pll_register_string('Dairy-samples', 'Dairy-samples');
pll_register_string('Animal-fat-samples', 'Animal-fat-samples');
pll_register_string('Animal-products-samples', 'Animal-products-samples');
pll_register_string('Animal-flavors-samples', 'Animal-flavors-samples');

pll_register_string('Grains-samples', 'Grains-samples');
pll_register_string('Beans-samples', 'Beans-samples');
pll_register_string('Vegetables-samples', 'Vegetables-samples');
pll_register_string('Leafy-greens-samples', 'Leafy-greens-samples');
pll_register_string('Fruits-samples', 'Fruits-samples');
pll_register_string('Nuts-samples', 'Nuts-samples');
pll_register_string('Vegetable-oil-samples', 'Vegetable-oil-samples');
pll_register_string('Spices-samples', 'Spices-samples');

pll_register_string('Choose-your-language', 'Choose-your-language');
pll_register_string('Print', 'Print');
pll_register_string('Share', 'Share');

pll_register_string('Translate-link', 'Translate-link');
pll_register_string('Translate-help', 'Translate-help');
pll_register_string('Tweet', 'Tweet');
pll_register_string('Download', 'Download');
pll_register_string('Please-print', 'Please-print');
pll_register_string('Karma-gift', 'Karma-gift');
pll_register_string('Please-review', 'Please-review');
pll_register_string('LanguageFontBold', 'LanguageFontBold');
pll_register_string('LanguageFontRegular', 'LanguageFontRegular');
pll_register_string('LanguageFontItalic', 'LanguageFontItalic');
pll_register_string('Polylang-support', 'Polylang-support');
pll_register_string('Code-help', 'Code-help');
pll_register_string('Donate', 'Donate');


}

function country_code_to_country( $code ){
    $country = '';
    if( $code == 'AF' ) $country = 'Afghanistan';
    if( $code == 'AX' ) $country = 'Aland Islands';
    if( $code == 'AL' ) $country = 'Albania';
    if( $code == 'DZ' ) $country = 'Algeria';
    if( $code == 'AS' ) $country = 'American Samoa';
    if( $code == 'AD' ) $country = 'Andorra';
    if( $code == 'AO' ) $country = 'Angola';
    if( $code == 'AI' ) $country = 'Anguilla';
    if( $code == 'AQ' ) $country = 'Antarctica';
    if( $code == 'AG' ) $country = 'Antigua and Barbuda';
    if( $code == 'AR' ) $country = 'Argentina';
    if( $code == 'AM' ) $country = 'Armenia';
    if( $code == 'AW' ) $country = 'Aruba';
    if( $code == 'AU' ) $country = 'Australia';
    if( $code == 'AT' ) $country = 'Austria';
    if( $code == 'AZ' ) $country = 'Azerbaijan';
    if( $code == 'BS' ) $country = 'Bahamas the';
    if( $code == 'BH' ) $country = 'Bahrain';
    if( $code == 'BD' ) $country = 'Bangladesh';
    if( $code == 'BB' ) $country = 'Barbados';
    if( $code == 'BY' ) $country = 'Belarus';
    if( $code == 'BE' ) $country = 'Belgium';
    if( $code == 'BZ' ) $country = 'Belize';
    if( $code == 'BJ' ) $country = 'Benin';
    if( $code == 'BM' ) $country = 'Bermuda';
    if( $code == 'BT' ) $country = 'Bhutan';
    if( $code == 'BO' ) $country = 'Bolivia';
    if( $code == 'BA' ) $country = 'Bosnia and Herzegovina';
    if( $code == 'BW' ) $country = 'Botswana';
    if( $code == 'BV' ) $country = 'Bouvet Island (Bouvetoya)';
    if( $code == 'BR' ) $country = 'Brazil';
    if( $code == 'IO' ) $country = 'British Indian Ocean Territory (Chagos Archipelago)';
    if( $code == 'VG' ) $country = 'British Virgin Islands';
    if( $code == 'BN' ) $country = 'Brunei Darussalam';
    if( $code == 'BG' ) $country = 'Bulgaria';
    if( $code == 'BF' ) $country = 'Burkina Faso';
    if( $code == 'BI' ) $country = 'Burundi';
    if( $code == 'KH' ) $country = 'Cambodia';
    if( $code == 'CM' ) $country = 'Cameroon';
    if( $code == 'CA' ) $country = 'Canada';
    if( $code == 'CV' ) $country = 'Cape Verde';
    if( $code == 'KY' ) $country = 'Cayman Islands';
    if( $code == 'CF' ) $country = 'Central African Republic';
    if( $code == 'TD' ) $country = 'Chad';
    if( $code == 'CL' ) $country = 'Chile';
    if( $code == 'CN' ) $country = 'China';
    if( $code == 'CX' ) $country = 'Christmas Island';
    if( $code == 'CC' ) $country = 'Cocos (Keeling) Islands';
    if( $code == 'CO' ) $country = 'Colombia';
    if( $code == 'KM' ) $country = 'Comoros the';
    if( $code == 'CD' ) $country = 'Congo';
    if( $code == 'CG' ) $country = 'Congo the';
    if( $code == 'CK' ) $country = 'Cook Islands';
    if( $code == 'CR' ) $country = 'Costa Rica';
    if( $code == 'CI' ) $country = 'Cote d\'Ivoire';
    if( $code == 'HR' ) $country = 'Croatia';
    if( $code == 'CU' ) $country = 'Cuba';
    if( $code == 'CY' ) $country = 'Cyprus';
    if( $code == 'CZ' ) $country = 'Czech Republic';
    if( $code == 'DK' ) $country = 'Denmark';
    if( $code == 'DJ' ) $country = 'Djibouti';
    if( $code == 'DM' ) $country = 'Dominica';
    if( $code == 'DO' ) $country = 'Dominican Republic';
    if( $code == 'EC' ) $country = 'Ecuador';
    if( $code == 'EG' ) $country = 'Egypt';
    if( $code == 'SV' ) $country = 'El Salvador';
    if( $code == 'GQ' ) $country = 'Equatorial Guinea';
    if( $code == 'ER' ) $country = 'Eritrea';
    if( $code == 'EE' ) $country = 'Estonia';
    if( $code == 'ET' ) $country = 'Ethiopia';
    if( $code == 'FO' ) $country = 'Faroe Islands';
    if( $code == 'FK' ) $country = 'Falkland Islands (Malvinas)';
    if( $code == 'FJ' ) $country = 'Fiji the Fiji Islands';
    if( $code == 'FI' ) $country = 'Finland';
    if( $code == 'FR' ) $country = 'France, French Republic';
    if( $code == 'GF' ) $country = 'French Guiana';
    if( $code == 'PF' ) $country = 'French Polynesia';
    if( $code == 'TF' ) $country = 'French Southern Territories';
    if( $code == 'GA' ) $country = 'Gabon';
    if( $code == 'GM' ) $country = 'Gambia the';
    if( $code == 'GE' ) $country = 'Georgia';
    if( $code == 'DE' ) $country = 'Germany';
    if( $code == 'GH' ) $country = 'Ghana';
    if( $code == 'GI' ) $country = 'Gibraltar';
    if( $code == 'GR' ) $country = 'Greece';
    if( $code == 'GL' ) $country = 'Greenland';
    if( $code == 'GD' ) $country = 'Grenada';
    if( $code == 'GP' ) $country = 'Guadeloupe';
    if( $code == 'GU' ) $country = 'Guam';
    if( $code == 'GT' ) $country = 'Guatemala';
    if( $code == 'GG' ) $country = 'Guernsey';
    if( $code == 'GN' ) $country = 'Guinea';
    if( $code == 'GW' ) $country = 'Guinea-Bissau';
    if( $code == 'GY' ) $country = 'Guyana';
    if( $code == 'HT' ) $country = 'Haiti';
    if( $code == 'HM' ) $country = 'Heard Island and McDonald Islands';
    if( $code == 'VA' ) $country = 'Holy See (Vatican City State)';
    if( $code == 'HN' ) $country = 'Honduras';
    if( $code == 'HK' ) $country = 'Hong Kong';
    if( $code == 'HU' ) $country = 'Hungary';
    if( $code == 'IS' ) $country = 'Iceland';
    if( $code == 'IN' ) $country = 'India';
    if( $code == 'ID' ) $country = 'Indonesia';
    if( $code == 'IR' ) $country = 'Iran';
    if( $code == 'IQ' ) $country = 'Iraq';
    if( $code == 'IE' ) $country = 'Ireland';
    if( $code == 'IM' ) $country = 'Isle of Man';
    if( $code == 'IL' ) $country = 'Israel';
    if( $code == 'IT' ) $country = 'Italy';
    if( $code == 'JM' ) $country = 'Jamaica';
    if( $code == 'JP' ) $country = 'Japan';
    if( $code == 'JE' ) $country = 'Jersey';
    if( $code == 'JO' ) $country = 'Jordan';
    if( $code == 'KZ' ) $country = 'Kazakhstan';
    if( $code == 'KE' ) $country = 'Kenya';
    if( $code == 'KI' ) $country = 'Kiribati';
    if( $code == 'KP' ) $country = 'Korea';
    if( $code == 'KR' ) $country = 'Korea';
    if( $code == 'KW' ) $country = 'Kuwait';
    if( $code == 'KG' ) $country = 'Kyrgyz Republic';
    if( $code == 'LA' ) $country = 'Lao';
    if( $code == 'LV' ) $country = 'Latvia';
    if( $code == 'LB' ) $country = 'Lebanon';
    if( $code == 'LS' ) $country = 'Lesotho';
    if( $code == 'LR' ) $country = 'Liberia';
    if( $code == 'LY' ) $country = 'Libyan Arab Jamahiriya';
    if( $code == 'LI' ) $country = 'Liechtenstein';
    if( $code == 'LT' ) $country = 'Lithuania';
    if( $code == 'LU' ) $country = 'Luxembourg';
    if( $code == 'MO' ) $country = 'Macao';
    if( $code == 'MK' ) $country = 'Macedonia';
    if( $code == 'MG' ) $country = 'Madagascar';
    if( $code == 'MW' ) $country = 'Malawi';
    if( $code == 'MY' ) $country = 'Malaysia';
    if( $code == 'MV' ) $country = 'Maldives';
    if( $code == 'ML' ) $country = 'Mali';
    if( $code == 'MT' ) $country = 'Malta';
    if( $code == 'MH' ) $country = 'Marshall Islands';
    if( $code == 'MQ' ) $country = 'Martinique';
    if( $code == 'MR' ) $country = 'Mauritania';
    if( $code == 'MU' ) $country = 'Mauritius';
    if( $code == 'YT' ) $country = 'Mayotte';
    if( $code == 'MX' ) $country = 'Mexico';
    if( $code == 'FM' ) $country = 'Micronesia';
    if( $code == 'MD' ) $country = 'Moldova';
    if( $code == 'MC' ) $country = 'Monaco';
    if( $code == 'MN' ) $country = 'Mongolia';
    if( $code == 'ME' ) $country = 'Montenegro';
    if( $code == 'MS' ) $country = 'Montserrat';
    if( $code == 'MA' ) $country = 'Morocco';
    if( $code == 'MZ' ) $country = 'Mozambique';
    if( $code == 'MM' ) $country = 'Myanmar';
    if( $code == 'NA' ) $country = 'Namibia';
    if( $code == 'NR' ) $country = 'Nauru';
    if( $code == 'NP' ) $country = 'Nepal';
    if( $code == 'AN' ) $country = 'Netherlands Antilles';
    if( $code == 'NL' ) $country = 'Netherlands the';
    if( $code == 'NC' ) $country = 'New Caledonia';
    if( $code == 'NZ' ) $country = 'New Zealand';
    if( $code == 'NI' ) $country = 'Nicaragua';
    if( $code == 'NE' ) $country = 'Niger';
    if( $code == 'NG' ) $country = 'Nigeria';
    if( $code == 'NU' ) $country = 'Niue';
    if( $code == 'NF' ) $country = 'Norfolk Island';
    if( $code == 'MP' ) $country = 'Northern Mariana Islands';
    if( $code == 'NO' ) $country = 'Norway';
    if( $code == 'OM' ) $country = 'Oman';
    if( $code == 'PK' ) $country = 'Pakistan';
    if( $code == 'PW' ) $country = 'Palau';
    if( $code == 'PS' ) $country = 'Palestinian Territory';
    if( $code == 'PA' ) $country = 'Panama';
    if( $code == 'PG' ) $country = 'Papua New Guinea';
    if( $code == 'PY' ) $country = 'Paraguay';
    if( $code == 'PE' ) $country = 'Peru';
    if( $code == 'PH' ) $country = 'Philippines';
    if( $code == 'PN' ) $country = 'Pitcairn Islands';
    if( $code == 'PL' ) $country = 'Poland';
    if( $code == 'PT' ) $country = 'Portugal, Portuguese Republic';
    if( $code == 'PR' ) $country = 'Puerto Rico';
    if( $code == 'QA' ) $country = 'Qatar';
    if( $code == 'RE' ) $country = 'Reunion';
    if( $code == 'RO' ) $country = 'Romania';
    if( $code == 'RU' ) $country = 'Russian Federation';
    if( $code == 'RW' ) $country = 'Rwanda';
    if( $code == 'BL' ) $country = 'Saint Barthelemy';
    if( $code == 'SH' ) $country = 'Saint Helena';
    if( $code == 'KN' ) $country = 'Saint Kitts and Nevis';
    if( $code == 'LC' ) $country = 'Saint Lucia';
    if( $code == 'MF' ) $country = 'Saint Martin';
    if( $code == 'PM' ) $country = 'Saint Pierre and Miquelon';
    if( $code == 'VC' ) $country = 'Saint Vincent and the Grenadines';
    if( $code == 'WS' ) $country = 'Samoa';
    if( $code == 'SM' ) $country = 'San Marino';
    if( $code == 'ST' ) $country = 'Sao Tome and Principe';
    if( $code == 'SA' ) $country = 'Saudi Arabia';
    if( $code == 'SN' ) $country = 'Senegal';
    if( $code == 'RS' ) $country = 'Serbia';
    if( $code == 'SC' ) $country = 'Seychelles';
    if( $code == 'SL' ) $country = 'Sierra Leone';
    if( $code == 'SG' ) $country = 'Singapore';
    if( $code == 'SK' ) $country = 'Slovakia (Slovak Republic)';
    if( $code == 'SI' ) $country = 'Slovenia';
    if( $code == 'SB' ) $country = 'Solomon Islands';
    if( $code == 'SO' ) $country = 'Somalia, Somali Republic';
    if( $code == 'ZA' ) $country = 'South Africa';
    if( $code == 'GS' ) $country = 'South Georgia and the South Sandwich Islands';
    if( $code == 'ES' ) $country = 'Spain';
    if( $code == 'LK' ) $country = 'Sri Lanka';
    if( $code == 'SD' ) $country = 'Sudan';
    if( $code == 'SR' ) $country = 'Suriname';
    if( $code == 'SJ' ) $country = 'Svalbard & Jan Mayen Islands';
    if( $code == 'SZ' ) $country = 'Swaziland';
    if( $code == 'SE' ) $country = 'Sweden';
    if( $code == 'CH' ) $country = 'Switzerland, Swiss Confederation';
    if( $code == 'SY' ) $country = 'Syrian Arab Republic';
    if( $code == 'TW' ) $country = 'Taiwan';
    if( $code == 'TJ' ) $country = 'Tajikistan';
    if( $code == 'TZ' ) $country = 'Tanzania';
    if( $code == 'TH' ) $country = 'Thailand';
    if( $code == 'TL' ) $country = 'Timor-Leste';
    if( $code == 'TG' ) $country = 'Togo';
    if( $code == 'TK' ) $country = 'Tokelau';
    if( $code == 'TO' ) $country = 'Tonga';
    if( $code == 'TT' ) $country = 'Trinidad and Tobago';
    if( $code == 'TN' ) $country = 'Tunisia';
    if( $code == 'TR' ) $country = 'Turkey';
    if( $code == 'TM' ) $country = 'Turkmenistan';
    if( $code == 'TC' ) $country = 'Turks and Caicos Islands';
    if( $code == 'TV' ) $country = 'Tuvalu';
    if( $code == 'UG' ) $country = 'Uganda';
    if( $code == 'UA' ) $country = 'Ukraine';
    if( $code == 'AE' ) $country = 'United Arab Emirates';
    if( $code == 'GB' ) $country = 'United Kingdom';
    if( $code == 'US' ) $country = 'United States of America';
    if( $code == 'UM' ) $country = 'United States Minor Outlying Islands';
    if( $code == 'VI' ) $country = 'United States Virgin Islands';
    if( $code == 'UY' ) $country = 'Uruguay, Eastern Republic of';
    if( $code == 'UZ' ) $country = 'Uzbekistan';
    if( $code == 'VU' ) $country = 'Vanuatu';
    if( $code == 'VE' ) $country = 'Venezuela';
    if( $code == 'VN' ) $country = 'Vietnam';
    if( $code == 'WF' ) $country = 'Wallis and Futuna';
    if( $code == 'EH' ) $country = 'Western Sahara';
    if( $code == 'YE' ) $country = 'Yemen';
    if( $code == 'ZM' ) $country = 'Zambia';
    if( $code == 'ZW' ) $country = 'Zimbabwe';
    if( $country == '') $country = $code;
    return $country;
}


?>
