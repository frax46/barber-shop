<?php
/**
 * Nicos Theme Functions
 *
 * @package Nicos
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles
 */
function nicos_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'nicos-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );
    
    // Enqueue Google Fonts
    wp_enqueue_style(
        'nicos-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap',
        array(),
        null
    );
    
    // Enqueue GSAP from CDN
    wp_enqueue_script(
        'gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js',
        array(),
        '3.13.0',
        true
    );
    
    // Enqueue GSAP ScrollTrigger plugin
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js',
        array('gsap'),
        '3.13.0',
        true
    );
    
    // Note: SplitText is a premium GSAP plugin, using custom implementation instead
    
    // Enqueue Lenis smooth scroll
    wp_enqueue_script(
        'lenis',
        'https://unpkg.com/lenis@1.3.4/dist/lenis.min.js',
        array(),
        '1.3.4',
        true
    );
    
    // Enqueue Lenis CSS
    wp_enqueue_style(
        'lenis-css',
        'https://unpkg.com/lenis@1.3.4/dist/lenis.css',
        array(),
        '1.3.4'
    );
    
    // Enqueue marquee script
    wp_enqueue_script(
        'nicos-marquee',
        get_template_directory_uri() . '/marquee.js',
        array('gsap'),
        '1.0.0',
        true
    );
    
    // Enqueue main script
    wp_enqueue_script(
        'nicos-script',
        get_template_directory_uri() . '/script.js',
        array('gsap', 'gsap-scrolltrigger', 'lenis', 'nicos-marquee'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'nicos_scripts');

/**
 * Theme setup
 */
function nicos_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'nicos_setup');

/**
 * ACF Configuration
 */
// Set ACF options page (optional - if you want global hero text)
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Hero Content Settings',
        'menu_title' => 'Hero Settings',
        'menu_slug' => 'hero-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-format-quote',
        'position' => 30,
    ));
}

/**
 * Helper function to get ACF field with fallback
 */
function get_hero_field($field_name, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name);
        return !empty($value) ? $value : $default;
    }
    return $default;
}

/**
 * Display hero lines with proper formatting
 */
function display_hero_lines() {
    $hero_line_1 = get_hero_field('hero_line_1', 'Welcome to Nicos');
    $hero_line_2 = get_hero_field('hero_line_2', 'the best barber');
    $hero_line_3 = get_hero_field('hero_line_3', 'in town');
    
    if ($hero_line_1) {
        echo '<p>' . esc_html($hero_line_1) . '</p>';
    }
    if ($hero_line_2) {
        echo '<p>' . esc_html($hero_line_2) . '</p>';
    }
    if ($hero_line_3) {
        echo '<p>' . esc_html($hero_line_3) . '</p>';
    }
}
?> 