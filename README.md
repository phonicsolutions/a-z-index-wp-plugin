=== A-Z Page Index ===
Contributors: phonicssoftware
Tags: shortcode, page index, alphabetical index, page list, caching
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Displays a list of all published pages in alphabetical order using the [azpi] shortcode. Includes daily cache refresh and manual admin cache control.

== Description ==

The A-Z Page Index plugin allows you to easily display all of your published WordPress pages in alphabetical order using the `[azpi]` shortcode. It’s great for websites that have a large number of pages and want to make navigation easier for visitors.

**Features:**

- Display all published pages alphabetically
- Output list as HTML `<ul>` with page titles linked
- Exclude specific pages (e.g. cart, checkout, dashboard)
- Caches the output using transients for performance
- Cache refreshes automatically every 24 hours
- Manual cache reset button in the WordPress admin under **Tools > A-Z Index Cache**
- Custom CSS styles for clean presentation
- Supports one-column layout

== Installation ==

1. Upload the plugin ZIP file via **Plugins > Add New > Upload Plugin**.
2. Activate the plugin.
3. Use the `[azpi]` shortcode on any page (recommended: a dedicated “A-Z Index” page).
4. Customize appearance with your own CSS or edit `assets/css/azpi-style.css`.

== Usage ==

1. Create or edit a page where you'd like to show the list of pages.
2. Add the shortcode `[azpi]` in the content editor.
3. Save and view the page.

To manually clear the cache:
- Go to **Tools > A-Z Index Cache** in the WordPress admin.
- Click the “Clear Cache Now” button.

== Frequently Asked Questions ==

= How often does the plugin update the page list? =  
The plugin uses WordPress transients and updates the list once per day automatically.

= How can I exclude pages like “Cart” or “Checkout”? =  
The plugin excludes common eCommerce and utility pages by default (e.g., cart, checkout, shop, dashboard, my-account, reset-password, forgot-password, and the A-Z page itself).

= Can I style the list? =  
Yes! You can override the included CSS file or add custom styles in your theme or via a plugin.

== Changelog ==

= 1.0 =
* Initial release with caching, admin controls, and shortcode support.

== Upgrade Notice ==

= 1.0 =
First stable version.

== Screenshots ==

1. Example A-Z page rendered on the frontend


2. Admin panel with manual cache clear button
