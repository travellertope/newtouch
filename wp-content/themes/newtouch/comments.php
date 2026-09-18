<?php
/**
 * Comments template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>
<div class="nt-comments" style="margin-top:60px;">
	<?php if ( have_comments() ) : ?>
		<h2 class="nt-mono" style="font-size:14px;letter-spacing:0.05em;"><?php comments_number(); ?></h2>
		<ol class="comment-list" style="list-style:none;padding:0;">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol>
		<?php the_comments_pagination(); ?>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<?php comment_form(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Comments are closed.', 'newtouch' ); ?></p>
	<?php endif; ?>
</div>
