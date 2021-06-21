<?php // Opening PHP tag - nothing should be before this, not even whitespace

add_action('wp_enqueue_scripts', 'add_child_stylesheet');
function add_child_stylesheet()
{
    wp_enqueue_style('bulbul-style', get_stylesheet_directory_uri() . '/assets/css/bulbul.css', false, '0.4', 'all');
}


require_once(trailingslashit(get_stylesheet_directory()) . 'inc/view-counter.php');
require_once(trailingslashit(get_stylesheet_directory()) . 'inc/bulbul-widget.php');
