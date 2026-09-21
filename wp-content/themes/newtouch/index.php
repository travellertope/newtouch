<?php
/**
 * Fallback template — blog index / catch-all loop.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

newtouch_get_header();
?>
<div class="nt-page">
	<?php if ( have_posts() ) : ?>
		<div class="nt-services__list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<a href="<?php the_permalink(); ?>" class="nt-service-row">
					<span class="nt-service-row__title" style="width:auto;flex:1;"><?php the_title(); ?></span>
					<?php newtouch_arrow_svg( 'nt-service-row__arrow' ); ?>
				</a>
				<?php
			endwhile;
			?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing found.', 'newtouch' ); ?></p>
	<?php endif; ?>
</div>
<?php
newtouch_get_footer();
