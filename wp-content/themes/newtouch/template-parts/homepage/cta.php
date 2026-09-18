<?php
/**
 * Homepage — inverted CTA band.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="nt-cta" id="contact">
	<h2 class="nt-cta__heading"><?php echo esc_html( newtouch_field( 'cta_heading', 'Schedule your operational infrastructure review.' ) ); ?></h2>
	<p class="nt-cta__sub"><?php echo esc_html( newtouch_field( 'cta_paragraph', 'Connect with our senior directors to discuss how New Touch can unify your strategy and IT for unparalleled resilience.' ) ); ?></p>

	<div class="nt-cta__actions">
		<a href="<?php echo esc_url( newtouch_field( 'cta_button_url', '#' ) ); ?>" class="nt-btn nt-btn--primary">
			<?php echo esc_html( newtouch_field( 'cta_button_text', 'Contact Us' ) ); ?>
		</a>
		<a href="<?php echo esc_url( newtouch_field( 'cta_phone_url', 'tel:+440208050485' ) ); ?>" class="nt-btn nt-btn--outline-light">
			<?php echo esc_html( newtouch_field( 'cta_phone_text', '+44 020 8050 0485' ) ); ?>
		</a>
	</div>
</section>
