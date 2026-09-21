<?php
/**
 * Default template for standard (non-homepage) pages.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

newtouch_get_header();
?>
<div class="nt-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="nt-page__thumb"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>
</div>
<?php
newtouch_get_footer();
