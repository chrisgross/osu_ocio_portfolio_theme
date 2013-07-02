<?php

function ocio_portfolio_scripts() {
	if ( !is_admin() ) {
		wp_enqueue_script( 'retina', get_stylesheet_directory_uri() . '/js/retina.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'dotdotdot', get_stylesheet_directory_uri() . '/js/jquery.dotdotdot-1.5.6-packed.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'themejs', get_stylesheet_directory_uri() . '/js/theme.js', array( 'jquery' ), false, true );
	}
}
add_action('wp_enqueue_scripts', 'ocio_portfolio_scripts');

/**
 * Load webfonts from OSU.edu
 */
function portfoliopress_google_fonts() {
	if ( !is_admin() ) {
		wp_register_style( 'osu_web_fonts', '//'.$_SERVER['SERVER_NAME'].'/fonts/webfonts.css', '', null, 'screen' );
        wp_enqueue_style( 'osu_web_fonts' );
	}
}

function ocio_portfolio_stylesheets() {
    wp_register_style( 'font-awesome-social', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome-social.css');
    wp_enqueue_style( 'font-awesome-social' );
    wp_register_style( 'osu-navbar', get_stylesheet_directory_uri() . '/osu_navbar/css/osu_navbar-resp.css');
    wp_enqueue_style( 'osu-navbar' );
}

add_action( 'wp_enqueue_scripts', 'ocio_portfolio_stylesheets' );

function ocio_portfolio_browser_body_class($classes) {

    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;

    if($is_gecko)      $classes[] = 'gecko';
    elseif($is_opera)  $classes[] = 'opera';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE)     $classes[] = 'ie';
    else               $classes[] = 'unknown';
    $browser = get_browser();
    if ($browser->browser == 'IE' && $browser->majorver <= 7) $classes[] = 'ie7';
    return $classes;
}

add_filter('body_class','ocio_portfolio_browser_body_class');

function ocio_portfolio_categories() {
	$categories = get_terms('portfolio_category');

  if (!empty($categories)) {
 		$markup = '<div id="category-filters"><div id="filters-menu" class="mobile-only"><a href="#" class="mobile-only">Categories <i class="icon-chevron-down"></i></a></div><ul id="filters"><li><a href="'.home_url( '/' ).'#" ';

 		if (!is_single()) {
 		 	$markup .= 'class="selected" ';
		}

 		$markup .= 'data-filter="*">All</a></li>';

    foreach ($categories as $category) {
      $markup .=  '<li><a href="'.home_url( '/' ).'#category-'.$category->slug.'" data-filter=".post-category-'.$category->slug.'">'.$category->name.'</a></li>';
    }

    $markup .= '</ul></div>';

    echo $markup;
    return true;
 }
 else return false;
}