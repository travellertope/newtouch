<?php
/**
 * Homepage — Hero. Full-bleed background image with a duotone accent
 * tint and corner registration marks, headline overlaid bottom-left.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$has_image = newtouch_hero_bg_has_image( 'hero_background_image' );
?>
<section class="nt-hero">
	<div class="nt-hero__bg <?php echo $has_image ? '' : 'nt-hero__bg--placeholder'; ?>" <?php echo newtouch_hero_bg_style( 'hero_background_image' ); ?>></div>
	<div class="nt-hero__tint"></div>
	<div class="nt-hero__scrim"></div>

	<svg class="nt-hero__crosshair" style="top:28px;left:28px;" viewBox="0 0 22 22" aria-hidden="true"><path d="M11 0V22M0 11H22" stroke="#FFFFFF" stroke-width="1"/></svg>
	<svg class="nt-hero__crosshair" style="top:28px;right:28px;" viewBox="0 0 22 22" aria-hidden="true"><path d="M11 0V22M0 11H22" stroke="#FFFFFF" stroke-width="1"/></svg>
	<svg class="nt-hero__crosshair" style="bottom:28px;left:28px;" viewBox="0 0 22 22" aria-hidden="true"><path d="M11 0V22M0 11H22" stroke="#FFFFFF" stroke-width="1"/></svg>

	<?php if ( ! $has_image ) : ?>
		<span class="nt-hero__placeholder-tag">IMAGE PLACEHOLDER — ACF: hero_background_image</span>
	<?php endif; ?>

	<span class="nt-hero__numeral" aria-hidden="true">01</span>

	<div class="nt-hero__content">
		<h1 class="nt-hero__heading"><?php echo esc_html( newtouch_field( 'hero_heading', 'Everything runs better with one hand on it.' ) ); ?></h1>
		<p class="nt-hero__sub"><?php echo esc_html( newtouch_field( 'hero_subheading', 'New Touch is the single team behind the boardroom decisions and the servers underneath them — strategy, infrastructure and security, held by the same hands from day one.' ) ); ?></p>

		<div class="nt-hero__actions">
			<a href="<?php echo esc_url( newtouch_field( 'hero_primary_button_url', '#contact' ) ); ?>" class="nt-btn nt-btn--primary">
				<?php echo esc_html( newtouch_field( 'hero_primary_button_text', 'Book an Infrastructure Review' ) ); ?>
			</a>
			<a href="<?php echo esc_url( newtouch_field( 'hero_secondary_button_url', '#pillars' ) ); ?>" class="nt-link-underline">
				<?php echo esc_html( newtouch_field( 'hero_secondary_button_text', 'See how we work' ) ); ?>
			</a>
		</div>
	</div>
</section>
