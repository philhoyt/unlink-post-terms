=== Unlink Post Terms ===
Contributors: philhoyt
Tags: blocks, post-terms, gutenberg
Requires at least: 6.6
Tested up to: 7.1
Requires PHP: 7.2
Stable tag: 1.1.1
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a toggle to the core Post Terms block that shows categories and tags as plain text instead of links

== Description ==

The core Post Terms block always links each term to its archive. This plugin adds an "Unlink Terms" panel to the block's settings sidebar with one toggle, "Remove links from terms". When it is on, the block's front-end output has each link replaced by a span with the same `wp-block-post-terms__term` class, so the block's colour, typography and separator settings still apply.

The change is made on the server when the block renders, so the editor preview still shows the terms as links. Nothing else about the block is changed, and turning the toggle off restores the links.

== Installation ==

1. Download `unlink-post-terms.zip` from the latest GitHub release at https://github.com/philhoyt/unlink-post-terms/releases/latest
2. In wp-admin, go to Plugins > Add New Plugin > Upload Plugin, choose the zip and click Install Now.
3. Activate the plugin.
4. Select a Post Terms block in any post, page or template and turn on "Remove links from terms" under Unlink Terms in the block settings.

Later releases are offered on the Plugins screen through the bundled update checker.

== Changelog ==

= 1.1.1 =
* Fixed update checks failing with a missing class: the update checker's Markdown and readme parsers now ship with the plugin.

= 1.1.0 =
* Added automatic updates from GitHub releases.
* Tested up to WordPress 7.1.
* Updated the build tooling to @wordpress/scripts 37.

= 1.0.0 =
* Added WordPress coding standards checks (phpcs with WPCS, ESLint).
* Added the plugin-zip build script.
* Fixed a missing file_exists() guard in enqueue_editor_assets().
* Fixed the link-replacing regex to match anchor tags regardless of attribute order.
* Made the editor strings translatable with @wordpress/i18n.
* Renamed the filter namespaces to the plugin-slug/descriptor convention.

= 0.1.0 =
* Initial release.
* Added the unlink toggle to the Post Terms block.
