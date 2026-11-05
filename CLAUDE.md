# Unlink Post Terms — Claude Instructions

## Project Overview

A WordPress block editor plugin that extends the core Post Terms block with an "Unlink Terms" toggle. When enabled, term links are replaced with `<span>` elements server-side, preserving all styling.

- **Plugin entry:** `unlink-post-terms.php`
- **JS source:** `src/index.js`
- **Built assets:** `build/` (committed for WordPress.org distribution)
- **PHP namespace:** `Unlink\UnlinkPostTerms`

## Development Workflow

```bash
npm run build       # Production build
npm run start       # Watch mode (development)
npm run lint:js     # Check JS coding standards
npm run lint:js:fix # Auto-fix JS issues
npm run format      # Prettier formatting
composer lint       # Check PHP coding standards
composer lint:fix   # Auto-fix PHP issues
npm run plugin-zip  # Build distributable ZIP (outputs unlink-post-terms.zip)
```

The build step is required before activating the plugin. `build/index.asset.php` and `build/index.js` must exist or the plugin will fatal on activation.

## Coding Standards

### PHP
Follow the [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/):
- Tabs for indentation (not spaces)
- Space before and after operators, inside parentheses on function calls: `function_name( $arg )`
- Yoda conditions: `if ( 'value' === $var )`
- All functions must have docblocks with `@since`, `@param`, and `@return` tags
- All strings passed to users must be wrapped in a localization function: `__( 'String', 'unlink-post-terms' )`
- No trailing whitespace
- Prefix all global-scope symbols with the plugin namespace or use PHP namespaces (already done)

### JavaScript
Follow the [WordPress JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/):
- Use `@wordpress/i18n` (`__`, `_n`, `_x`) for all user-facing strings
- Filter/hook namespaces must follow the `plugin-slug/descriptor` convention (e.g. `unlink-post-terms/post-terms`), not generic names like `extend/post-terms`
- JSDoc on all exported functions and higher-order components

### CSS
Follow the [WordPress CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/) if styles are added.

## Known Issues / Audit Notes

All known issues have been resolved.

## File Structure

```
unlink-post-terms/
├── build/                  # Compiled assets (committed)
│   ├── index.asset.php
│   └── index.js
├── languages/              # Translation files (.po/.mo)
├── src/
│   └── index.js            # Block editor extension (JSX/ES6)
├── vendor/                 # Composer dependencies (gitignored)
├── lib/                    # Plugin Update Checker (copied from vendor by composer)
├── eslint.config.js        # ESLint flat config (@wordpress/eslint-plugin)
├── composer.json           # Plugin Update Checker + PHP dev dependencies (PHPCS + WPCS)
├── phpcs.xml               # PHP_CodeSniffer config
├── unlink-post-terms.php   # Plugin entry point
├── readme.txt              # WordPress.org readme
├── package.json
└── CLAUDE.md
```

## WordPress Version Requirements

- Requires at least: 6.6
- Requires PHP: 7.2
- Tested up to: 7.1
