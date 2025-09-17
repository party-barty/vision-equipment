# vision-equipment
vision equipment wordpress theme

```
Theme Name: Vision Equipment
Theme Location: /wp-content/themes/bb-theme-child
Theme URI: https://visionequipment.net
Version: 2.0
Description: This is the Premium theme for Vision Equipment.
Author: A2Y Consulting
Author URI: http://a2y.xyz
parent-template: bb-theme
```

</hr>

Recommended File Structure for `bb-theme-child` that keeps `style.css` and `responsive.css` clean, predictable, and easy to debug:


```pgsql
bb-theme-child/
│
├── style.css          # Base/global styles (always loads)
├── responsive.css     # Media queries + breakpoint overrides
│
├── functions.php      # Make sure enqueues child CSS last
│
├── inc/
│   ├── block-patterns.php   # Gutenberg patterns (optional)
│   └── shortcodes.php       # Any reusable shortcode defs
│
├── partials/
│   ├── ve-tech-grid.php     # Trusted Tech grid markup (if shortcode)
│   └── header-extras.php
│
├── css/               # (optional) if you want to modularize
│   ├── tokens.css     # CSS variables: colors, spacing, typography
│   ├── components.css # Buttons, cards, custom sections
│   └── utilities.css  # Helpers: .text-center, .sr-only, etc.
```
