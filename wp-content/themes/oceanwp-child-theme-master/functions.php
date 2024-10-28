<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	// Enqueue the child theme's JavaScript file
	wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/scripts/script.js');
	// Load the jQuery library
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');


}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );




// Ajout balises <li> autour du bouton de contact

function contact_btn($items, $args)
{
	// Ajout de l'URL de la page de contact
	$contact_page_url = get_permalink(get_page_by_path('contact'));
	
	// Ajouter le bouton de contact avec l'URL correcte
	$items .= '<li class="menu-item custom-btn menu-item-type-post_type menu-item-object-page"><a href="' . esc_url($contact_page_url) . '" class="contact-btn menu-link">Contact Us</a></li>';
	return $items;
}
add_filter('wp_nav_menu_items', 'contact_btn', 10, 2);
