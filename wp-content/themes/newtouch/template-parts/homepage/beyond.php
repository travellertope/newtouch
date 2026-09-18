<?php
/**
 * Homepage — "Beyond fragmented IT vendors" split section.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="nt-section nt-beyond">
	<div class="nt-beyond__media">
		<?php newtouch_image( 'beyond_image', 'large', 'IMAGE PLACEHOLDER' ); ?>
	</div>

	<div class="nt-beyond__copy">
		<h2 class="nt-beyond__heading"><?php echo esc_html( newtouch_field( 'beyond_heading', 'Beyond fragmented IT vendors.' ) ); ?></h2>
		<p><?php echo esc_html( newtouch_field( 'beyond_paragraph_1', 'Traditional IT support creates friction — a gap between strategic goals and technical execution, with nobody accountable for the whole picture.' ) ); ?></p>
		<p><?php echo esc_html( newtouch_field( 'beyond_paragraph_2', 'We offer one cohesive operational backbone instead. Our directors work directly with your leadership, closing the distance between what the business needs and what the infrastructure delivers.' ) ); ?></p>
		<a href="<?php echo esc_url( newtouch_field( 'beyond_link_url', '#about' ) ); ?>" class="nt-link-underline" style="display:inline-flex;align-items:center;gap:10px;">
			<?php echo esc_html( newtouch_field( 'beyond_link_text', 'Learn about our method' ) ); ?>
			<?php newtouch_arrow_svg(); ?>
		</a>
	</div>
</section>
