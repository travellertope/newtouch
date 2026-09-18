# New Touch — WordPress Theme

A custom WordPress theme for New Touch (formerly The Lone Wolf Group),
built directly from the approved homepage mockup. Every piece of homepage
content — every headline, every paragraph, every image — is editable
through Advanced Custom Fields; there is no hard-coded copy on the live
site (the copy in the templates is only a fallback so the page still
reads correctly before an editor touches anything).

## Requirements

- WordPress 6.0+
- PHP 7.4+
- **Advanced Custom Fields** (free) or **ACF PRO**. ACF PRO is required
  only for the Site Settings *options page* (footer/contact/accent
  colour) — everything else works with the free version.

## Install

1. Copy `wp-content/themes/newtouch` into your WordPress install's
   `wp-content/themes/` directory (or `git clone`/deploy the whole repo
   as your site root).
2. Install and activate **Advanced Custom Fields**.
3. Activate the **New Touch** theme in *Appearance → Themes*.
4. All the field groups (Hero, Signal Strip, Pillars, Beyond, Services,
   CTA, Site Settings) register themselves automatically — nothing to
   configure in ACF.

## Set up the homepage

The homepage layout is available two ways:

- **As the static front page**: create a Page (e.g. "Home"), go to
  *Settings → Reading*, and set it as your homepage. `front-page.php`
  will render it.
- **As a page template**: create any Page and set its *Page Attributes →
  Template* to **Homepage**. `page-templates/template-homepage.php`
  renders it.

Either way, open that page in the editor and you'll see field groups for
each section: **Hero**, **Signal Strip**, **Pillars**, **Beyond
Fragmented Vendors**, **Services**, and **Call to Action**. Upload real
photography to replace the labelled image placeholders (hero background,
"Beyond" section image, optional pillar icons).

## Site-wide settings

*Site Settings* (left-hand admin menu) holds everything that isn't tied
to a single page: the accent colour, header CTA, and all footer content
(address, phone, email, copyright line, tagline). Requires ACF PRO for
the options page — with the free version, ask your developer to swap the
options-page location rule for global theme mods, or hard-code these
values in `footer.php` / `functions.php`.

## Menus

Register menus at *Appearance → Menus*:

- **Primary Navigation** — header nav. Falls back to a default
  What we do / Services / About / Contact list if none is assigned.
- **Footer Navigation** — footer sitemap column. Falls back the same way.

## Structure

```
functions.php                  theme setup, asset enqueue, ACF options page
inc/acf-fields.php              every ACF field group (code-registered)
inc/template-tags.php           helpers: newtouch_field(), newtouch_option(),
                                 newtouch_image(), icon SVGs
header.php / footer.php         site chrome
front-page.php                  static front page → homepage
page-templates/
  template-homepage.php         "Homepage" page template → same layout
template-parts/homepage/        one file per homepage section
  hero.php
  signal-strip.php
  pillars.php                   interactive tab selector (JS in assets/js/main.js)
  beyond.php
  services.php
  cta.php
page.php / single.php / index.php / archive.php / search.php / 404.php
  generic templates for anything outside the homepage
assets/css/style.css            all styling (CSS custom properties for
                                 the accent colour, swappable from Site Settings)
assets/js/main.js               pillar tab switching + mobile nav toggle
```

## Design notes

Palette is deliberately paper-white / near-black ink / a single
hazard-orange spot colour (`--nt-accent`, editable from *Site Settings*)
rather than a soft gradient palette. Typefaces: Fraunces (display serif),
Space Grotesk (body), IBM Plex Mono (labels, numerals, technical copy),
loaded from Google Fonts in `functions.php`.
