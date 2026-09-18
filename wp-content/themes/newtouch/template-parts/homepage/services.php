<?php
/**
 * Homepage — Services index (table-of-contents style list, not cards).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = function_exists( 'get_field' ) ? get_field( 'services' ) : false;

if ( ! $services ) {
	$services = array(
		array( 'service_title' => 'Business Consulting', 'service_description' => 'Helping businesses improve operations, solve challenges and make better strategic decisions.', 'service_url' => '#contact' ),
		array( 'service_title' => 'Administrative Support', 'service_description' => 'Day-to-day administrative assistance, documentation, scheduling and coordination.', 'service_url' => '#contact' ),
		array( 'service_title' => 'Operations Management', 'service_description' => 'Streamlining workflows, improving efficiency and establishing effective processes.', 'service_url' => '#contact' ),
		array( 'service_title' => 'Financial Planning', 'service_description' => 'Supporting budgeting, financial organisation, forecasting and strategic planning.', 'service_url' => '#contact' ),
		array( 'service_title' => 'HR & People Support', 'service_description' => 'Assistance with recruitment, onboarding, employee administration and policies.', 'service_url' => '#contact' ),
		array( 'service_title' => 'Business Growth & Development', 'service_description' => 'Identifying opportunities and strategies to improve market position and growth.', 'service_url' => '#contact' ),
	);
}
?>
<section class="nt-section nt-services" id="services">
	<div class="nt-services__head">
		<h2 class="nt-services__heading"><?php echo esc_html( newtouch_field( 'services_heading', 'Expert business management, on tap.' ) ); ?></h2>
		<a href="<?php echo esc_url( newtouch_field( 'services_link_url', '#contact' ) ); ?>" class="nt-link-underline">
			<?php echo esc_html( newtouch_field( 'services_link_text', 'See all services' ) ); ?>
		</a>
	</div>

	<div class="nt-services__list">
		<?php foreach ( $services as $index => $service ) : ?>
			<a href="<?php echo esc_url( ! empty( $service['service_url'] ) ? $service['service_url'] : '#contact' ); ?>" class="nt-service-row">
				<span class="nt-service-row__index nt-mono"><?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
				<span class="nt-service-row__title"><?php echo esc_html( $service['service_title'] ); ?></span>
				<span class="nt-service-row__desc"><?php echo esc_html( $service['service_description'] ); ?></span>
				<?php newtouch_arrow_svg( 'nt-service-row__arrow' ); ?>
			</a>
		<?php endforeach; ?>
	</div>
</section>
