<?php
/**
 * Search results template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

newtouch_get_header();
?>
<div class="nt-page">
	<h1>
		<?php
		printf(
			/* translators: %s: search query. */
			esc_html__( 'Search results for: %s', 'newtouch' ),
			'<span>' . get_search_query() . '</span>'
		);
		?>
	</h1>

	<?php if ( have_posts() ) : ?>
		<div class="nt-services__list" style="margin-top:40px;">
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
		<p><?php esc_html_e( 'No results found.', 'newtouch' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
<?php
newtouch_get_footer();
