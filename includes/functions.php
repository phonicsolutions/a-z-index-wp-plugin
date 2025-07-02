<?php

// Add a custom interval (optional, WordPress already has 'daily')
add_filter('cron_schedules', function ($schedules) {
    $schedules['every_day'] = [
        'interval' => DAY_IN_SECONDS,
        'display'  => __('Once Daily')
    ];
    return $schedules;
});

function azpi_clear_index_cache()
{
    delete_transient('az_page_index_cache');
    delete_transient('az_page_index_cache_last_updated');
}



// Hook the cron event to a function
add_action('azpi_daily_refresh_cache', 'azpi_refresh_cache_daily');

function azpi_refresh_cache_daily()
{
    azpi_clear_index_cache(); // Clear the old cache

    // Regenerate and store the updated list
    $pages = get_pages([
        'sort_column' => 'post_title',
        'sort_order'  => 'ASC',
        'post_status' => 'publish',
    ]);

    if (empty($pages)) return;

    $output = '<ul class="az-page-index">';
    foreach ($pages as $page) {
        $title = esc_html($page->post_title);
        $link  = esc_url(get_permalink($page->ID));
        $output .= "<li><a href='{$link}'>{$title}</a></li>";
    }
    $output .= '</ul>';

    set_transient('az_page_index_cache', $output, DAY_IN_SECONDS);
}
