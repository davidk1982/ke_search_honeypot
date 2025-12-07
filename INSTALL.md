# Installation

## Composer Installation (Recommended)

```bash
composer require davidkohr/ke-search-honeypot
```

## Manual Installation

1. Download the extension from [TYPO3 Extension Repository](https://extensions.typo3.org/extension/ke_search_honeypot)
2. Upload to `typo3conf/ext/` directory
3. Activate in Extension Manager

## After Installation

1. Clear all caches
2. Add the honeypot partial to your ke_search form template:

```html
<f:render partial="honeypot" />
```

## Packagist

This extension is available on Packagist: https://packagist.org/packages/davidkohr/ke-search-honeypot
