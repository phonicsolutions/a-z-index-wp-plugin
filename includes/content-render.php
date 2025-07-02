<?php
function azpi_render_index_shortcode()
{
    $cached = get_transient('az_page_index_cache');
    if ($cached !== false) {
        return $cached;
    }
    $current_page_id = get_queried_object_id();

    $exclude_slugs = [
        'cart',
        'checkout',
        'shop',
        'dashboard',
        'forgot-password',
        'my-account',
        'reset-password',
        'a-z-index',
    ];

    $pages = get_pages([
        'sort_column' => 'post_title',
        'sort_order'  => 'ASC',
        'post_status' => 'publish',
    ]);
    if (empty($pages)) {
        return '<p>No pages found.</p>';
    }

    // Filter out current page
    $pages = array_filter($pages, function ($page) use ($current_page_id, $exclude_slugs) {
        if ($page->ID === $current_page_id) {
            return false;
        }
        if (in_array($page->post_name, $exclude_slugs, true)) {
            return false;
        }
        return true;
    });

    // Sort pages by title case-insensitive using PHP usort
    usort($pages, function ($a, $b) {
        return strcasecmp($a->post_title, $b->post_title);
    });

    $output = '<ul class="az-page-index">';
    foreach ($pages as $page) {
        $title = esc_html($page->post_title);
        $link  = esc_url(get_permalink($page->ID));
        $output .= "<li><a href='{$link}'>{$title}</a></li>";
    }
    $output .= '</ul>';

    set_transient('az_page_index_cache', $output, DAY_IN_SECONDS);
    set_transient('az_page_index_cache_last_updated', current_time('mysql'), DAY_IN_SECONDS);

    return $output;
}
