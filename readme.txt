=== Unlink Post Terms ===
Contributors: philhoyt
Tags: blocks, post-terms, gutenberg
Requires at least: 6.6
Tested up to: 6.7.1
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a toggle to remove links from the post terms block.

== Description ==

This plugin enhances the core Post Terms block by adding an option to display terms without links.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/unlink-post-terms` directory
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Post Terms block in any post or page, and you'll see a new "Unlink Terms" toggle in the block settings

== Changelog ==

= 1.0.0 =
* Added WordPress coding standards (PHPCS + WPCS, ESLint)
* Added plugin-zip build script
* Fixed missing file_exists() guard in enqueue_editor_assets()
* Fixed preg_replace regex to match anchor tags regardless of attribute order
* Localized JS strings with @wordpress/i18n
* Fixed filter namespaces to follow plugin-slug/descriptor convention

= 0.1.0 =
* Initial release
* Added unlink toggle to Post Terms block
