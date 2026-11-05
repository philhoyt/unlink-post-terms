# Unlink Post Terms

[![CI](https://github.com/philhoyt/unlink-post-terms/actions/workflows/ci.yml/badge.svg)](https://github.com/philhoyt/unlink-post-terms/actions/workflows/ci.yml)

Adds a toggle to the core Post Terms block that shows categories and tags as plain text instead of links.

The plugin registers an `unlinkTerms` boolean attribute on `core/post-terms` and adds an "Unlink Terms" panel with a "Remove links from terms" toggle to the block's settings sidebar. When the attribute is on, a `render_block_core/post-terms` filter replaces each `<a>` in the block's output with `<span class="wp-block-post-terms__term">`, so the block's colour, typography and separator settings still apply.

## Requirements

- WordPress 6.6 or later
- PHP 7.2 or later

## Installation

1. Download `unlink-post-terms.zip` from the [latest release](https://github.com/philhoyt/unlink-post-terms/releases/latest).
2. In wp-admin, go to Plugins > Add New Plugin > Upload Plugin, choose the zip and click Install Now.
3. Activate the plugin.

The zip includes `build/` and the bundled Plugin Update Checker, which offers later releases on the Plugins screen. If you clone the repository instead, run `npm install && npm run build` before activating; the plugin needs `build/index.asset.php` and `build/index.js`.

## Usage

Select a Post Terms block (Categories, Tags or any taxonomy) in a post, page or template. Under Unlink Terms in the block settings sidebar, turn on "Remove links from terms". Turn it off to get the links back.

## Development

```bash
npm install
composer install

npm start            # webpack watch
npm run build        # production build into build/ (committed)
npm run lint:js      # ESLint
npm run lint:js:fix
npm run format       # Prettier

composer lint        # phpcs (WPCS)
composer lint:fix    # phpcbf

npm run plugin-zip   # builds unlink-post-terms.zip
```

`composer install` and `composer update` copy Plugin Update Checker into `lib/`, which ships in the zip; `vendor/` does not. There are no automated tests. CI runs `composer audit` and phpcs on PHP 7.2 through 8.4, and ESLint and the build on Node 22.

## Releases

Bump the version in `unlink-post-terms.php` (header and the `VERSION` constant), `package.json` and the readme.txt `Stable tag`, add the changelog entry, then push a lowercase `v`-prefixed tag:

```bash
git tag v1.1.1 && git push origin v1.1.1
```

The release workflow only runs for tags matching `v[0-9]+.[0-9]+.[0-9]+`. It installs dependencies, runs `npm run build` and `npm run plugin-zip`, takes the matching `= X.Y.Z =` section from readme.txt as the release notes, and attaches `unlink-post-terms.zip` and `readme.txt` to the GitHub release. The update checker requires a `.zip` asset on the release and skips releases without one, so a release made by hand without the zip is never offered as an update. The prefix must be lowercase: Plugin Update Checker strips it with a case-sensitive `ltrim`, so a `V1.2.0` tag is never seen as newer than the installed version.

## Limitations

- The editor preview still shows the terms as links. The replacement happens on the server when the block renders on the front end.
- The replacement is a regular expression over the block's HTML, so it only affects anchors whose text contains no other HTML.
