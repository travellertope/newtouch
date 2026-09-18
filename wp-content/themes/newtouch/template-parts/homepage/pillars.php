<?php
/**
 * Homepage — Pillars. A real interactive tab selector (vanilla JS in
 * assets/js/main.js) rather than three static cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pillars = function_exists( 'get_field' ) ? get_field( 'pillars' ) : false;

if ( ! $pillars ) {
	$pillars = array(
		array(
			'pillar_number'         => '01',
			'pillar_title'          => 'Boardroom Strategy',
			'pillar_description'    => 'Aligning your IT roadmap with core business objectives. Our directors sit with your leadership, translating commercial ambition into a technology plan that actually gets built.',
			'pillar_icon'           => false,
			'pillar_icon_fallback'  => 'strategy',
		),
		array(
			'pillar_number'         => '02',
			'pillar_title'          => 'Managed Infrastructure',
			'pillar_description'    => 'Robust, scalable IT foundations with proactive UK-based monitoring. We keep the lights on quietly, so problems get fixed before they reach your desk.',
			'pillar_icon'           => false,
			'pillar_icon_fallback'  => 'infrastructure',
		),
		array(
			'pillar_number'         => '03',
			'pillar_title'          => 'Sovereign Security',
			'pillar_description'    => 'Comprehensive cybersecurity and data compliance, built for UK regulation. Your assets stay protected and provably compliant, not just insured against blame.',
			'pillar_icon'           => false,
			'pillar_icon_fallback'  => 'security',
		),
	);
}
?>
<section class="nt-section nt-pillars" id="pillars" data-pillars>
	<span class="nt-pillars__watermark" aria-hidden="true">02</span>

	<div class="nt-pillars__tabs" role="tablist" aria-label="<?php esc_attr_e( 'Pillars', 'newtouch' ); ?>">
		<h2 class="nt-pillars__title"><?php echo esc_html( newtouch_field( 'pillars_heading', 'Three pillars, one operator.' ) ); ?></h2>

		<?php foreach ( $pillars as $index => $pillar ) : ?>
			<button
				type="button"
				class="nt-pillar-tab<?php echo 0 === $index ? ' is-active' : ''; ?>"
				data-pillar-tab="<?php echo esc_attr( $index ); ?>"
				role="tab"
				aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
			>
				<span class="nt-pillar-tab__index nt-mono"><?php echo esc_html( $pillar['pillar_number'] ); ?></span>
				<span class="nt-pillar-tab__label"><?php echo esc_html( $pillar['pillar_title'] ); ?></span>
			</button>
		<?php endforeach; ?>
	</div>

	<div class="nt-pillars__stage">
		<?php foreach ( $pillars as $index => $pillar ) : ?>
			<div class="nt-pillar-panel<?php echo 0 === $index ? ' is-active' : ''; ?>" data-pillar-panel="<?php echo esc_attr( $index ); ?>" role="tabpanel">
				<div class="nt-pillar-panel__icon">
					<?php
					if ( ! empty( $pillar['pillar_icon']['ID'] ) ) {
						echo wp_get_attachment_image( $pillar['pillar_icon']['ID'], 'thumbnail' );
					} else {
						echo newtouch_pillar_icon_svg( ! empty( $pillar['pillar_icon_fallback'] ) ? $pillar['pillar_icon_fallback'] : 'strategy' );
					}
					?>
				</div>
				<div>
					<h3 class="nt-pillar-panel__title"><?php echo esc_html( $pillar['pillar_title'] ); ?></h3>
					<p class="nt-pillar-panel__desc"><?php echo esc_html( $pillar['pillar_description'] ); ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
