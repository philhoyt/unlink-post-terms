=== Unlink Post Terms ===
Contributors: philhoyt
Tags: blocks, post-terms, gutenberg
Requires at least: 6.6
Tested up to: 7.0
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a toggle to remove links from the post terms block.

== Description ==

This plugin enhances the core Post Terms block by adding an option to display terms without links.

== Installation ==

1. Download the latest `unlink-post-terms.zip` from the [GitHub Releases page](https://github.com/philhoyt/unlink-post-terms/releases/latest)
2. In your WordPress admin, go to Plugins → Add New Plugin → Upload Plugin
3. Choose the downloaded ZIP file and click 'Install Now'
4. Activate the plugin through the 'Plugins' screen in WordPress
5. Use the Post Terms block in any post or page, and you'll see a new "Unlink Terms" toggle in the block settings

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
