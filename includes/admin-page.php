<?php
add_action('admin_menu', 'azpi_register_admin_page');

function azpi_register_admin_page()
{
    add_submenu_page(
        'tools.php',
        'A-Z Index Cache',
        'A-Z Index Cache',
        'manage_options',
        'azpi-cache',
        'azpi_render_admin_page'
    );
}

function azpi_render_admin_page()
{
    if (isset($_POST['azpi_clear_cache']) && check_admin_referer('azpi_clear_nonce')) {
        azpi_clear_index_cache();
        echo '<div class="updated"><p>Cache cleared successfully!</p></div>';
    }

?>
    <div class="wrap">
        <h1>A-Z Page Index - Cache</h1>
        <form method="post">
            <?php wp_nonce_field('azpi_clear_nonce'); ?>
            <p>Click the button below to manually clear the cached page list. The cache will also update automatically every 24 hours.</p>
            <p><input type="submit" name="azpi_clear_cache" class="button button-primary" value="Clear Cache Now"></p>
        </form>
    </div>

<?php
    $last_updated = get_transient('az_page_index_cache_last_updated');
    if ($last_updated) {
        echo '<p><strong>Last Cache Refresh:</strong> ' . esc_html($last_updated) . '</p>';
    } else {
        echo '<p><strong>Last Cache Refresh:</strong> Not available.</p>';
    }
}
