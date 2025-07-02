<?php

/**
 * Plugin Name: A-Z Page Index
 * Description: Displays all published pages in alphabetical order with links using the [azpi] shortcode. Includes caching and admin controls.
 * Version: 1.0
 * Author: Phonics Software Solutions Inc.
 */

if (!defined('ABSPATH')) exit;

define('AZPI_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once AZPI_PLUGIN_DIR . 'includes/content-render.php';
require_once AZPI_PLUGIN_DIR . 'includes/functions.php';
require_once AZPI_PLUGIN_DIR . 'includes/admin-page.php';

// Enqueue frontend CSS
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('azpi-style', plugins_url('assets/css/azpi-style.css', __FILE__));
});

// Register the shortcode [azpi] — function is defined in content-render.php
add_shortcode('azpi', 'azpi_render_index_shortcode');

// Cron: On plugin activation
register_activation_hook(__FILE__, function () {
    if (!wp_next_scheduled('azpi_daily_refresh_cache')) {
        wp_schedule_event(time(), 'daily', 'azpi_daily_refresh_cache');
    }
});

// Cron: On plugin deactivation
register_deactivation_hook(__FILE__, function () {
    wp_clear_scheduled_hook('azpi_daily_refresh_cache');
});
