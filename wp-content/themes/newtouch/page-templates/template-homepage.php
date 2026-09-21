<?php
/**
 * Template Name: Homepage
 *
 * Assign this to any page (not just the static front page) to get the
 * full New Touch landing page layout with all its ACF fields.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

newtouch_get_header();
get_template_part( 'template-parts/homepage/homepage' );
newtouch_get_footer();
