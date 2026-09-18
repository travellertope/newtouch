<?php
/**
 * Default template for single blog posts.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="nt-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>>
			<p class="nt-mono" style="font-size:12px;letter-spacing:0.05em;color:var(--nt-text-muted);margin-bottom:12px;">
				<?php echo esc_html( get_the_date() ); ?>
			</p>
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
get_footer();
