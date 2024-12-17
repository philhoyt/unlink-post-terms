<?php
/**
 * Plugin Name:       Unlink Post Terms
 * Plugin URI:        https://github.com/philhoyt/unlink-post-terms
 * Description:       Adds a toggle to remove links from the post terms block while maintaining all styling options.
 * Version:           0.1.0
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Author:            Phil Hoyt
 * Author URI:        https://philhoyt.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       unlink-post-terms
 *
 * @package          Unlink\UnlinkPostTerms
 */

namespace Unlink\UnlinkPostTerms;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin version.
define( __NAMESPACE__ . '\VERSION', '0.1.0' );

// Plugin directory path.
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Plugin directory URL.
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Initialize the plugin.
 *
 * @since 0.1.0
 */
function init() {
	// Load plugin text domain.
	load_plugin_textdomain(
		'unlink-post-terms',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);

	// Enqueue editor assets.
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_editor_assets' );
	
	// Add filter for post terms block.
	add_filter( 'render_block_core/post-terms', __NAMESPACE__ . '\modify_post_terms_output', 10, 2 );
}
add_action( 'init', __NAMESPACE__ . '\init' );

/**
 * Enqueues the block editor assets.
 *
 * @since 0.1.0
 */
function enqueue_editor_assets() {
	wp_enqueue_script(
		'unlink-post-terms',
		PLUGIN_URL . 'build/index.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		VERSION,
		true
	);
}

/**
 * Modifies the post terms block output when unlinking is enabled.
 * Replacing links with spans.
 *
 * @since 0.1.0
 *
 * @param string $block_content The block content about to be rendered.
 * @param array  $block         The full block, including name and attributes.
 * @return string Modified block content.
 */
function modify_post_terms_output( $block_content, $block ) {
	// Return original content if unlinking is not enabled.
	if ( ! isset( $block['attrs']['unlinkTerms'] ) || ! $block['attrs']['unlinkTerms'] ) {
		return $block_content;
	}

	// If we have no content, return early.
	if ( empty( $block_content ) ) {
		return '';
	}

	// Replace links with spans.
	return preg_replace(
		'/<a href=[^>]+>([^<]+)<\/a>/',
		'<span class="wp-block-post-terms__term">$1</span>',
		$block_content
	);
}