<?php
/**
 * The static front page.
 *
 * If no static front page has been set in Settings → Reading, WordPress
 * falls back to index.php automatically, so this only renders once a
 * page has been chosen as the homepage — that page is where the
 * Homepage ACF field groups apply.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

newtouch_get_header();
get_template_part( 'template-parts/homepage/homepage' );
newtouch_get_footer();
