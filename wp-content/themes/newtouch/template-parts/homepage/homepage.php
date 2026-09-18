<?php
/**
 * Assembles the full homepage from its section partials. Used by both
 * front-page.php (static front page) and page-templates/template-homepage.php
 * (any page assigned the "Homepage" template) so the same ACF field groups
 * apply either way.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/homepage/hero' );
get_template_part( 'template-parts/homepage/signal-strip' );
get_template_part( 'template-parts/homepage/pillars' );
get_template_part( 'template-parts/homepage/beyond' );
get_template_part( 'template-parts/homepage/services' );
get_template_part( 'template-parts/homepage/cta' );
