<?php
/**
 * Homepage — Signal Strip. Dark status-readout bar with pulsing dots.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = function_exists( 'get_field' ) ? get_field( 'signal_stats' ) : false;

if ( ! $stats ) {
	$stats = array(
		array( 'stat_label' => '99.99% UPTIME GUARANTEE' ),
		array( 'stat_label' => '15 MIN SLA RESPONSE' ),
		array( 'stat_label' => 'UK-BASED, DIRECTOR-LED SUPPORT' ),
	);
}
?>
<div class="nt-signal">
	<?php foreach ( $stats as $index => $stat ) : ?>
		<?php if ( $index > 0 ) : ?>
			<div class="nt-signal__divider" aria-hidden="true"></div>
		<?php endif; ?>
		<div class="nt-signal__item">
			<span class="nt-signal__dot" aria-hidden="true"></span>
			<span class="nt-signal__label"><?php echo esc_html( $stat['stat_label'] ); ?></span>
		</div>
	<?php endforeach; ?>
</div>
