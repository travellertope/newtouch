<?php
/**
 * 404 template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

newtouch_get_header();
?>
<div class="nt-page" style="text-align:center;padding-top:140px;padding-bottom:140px;">
	<span class="nt-mono" style="font-size:13px;letter-spacing:0.06em;color:var(--nt-text-muted);">ERROR 404</span>
	<h1 style="margin-top:16px;">This page has gone off-line.</h1>
	<p class="entry-content" style="max-width:480px;margin:16px auto 32px;">
		<?php esc_html_e( 'The page you were looking for could not be found. It may have been moved or no longer exists.', 'newtouch' ); ?>
	</p>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nt-btn nt-btn--primary"><?php esc_html_e( 'Back to the homepage', 'newtouch' ); ?></a>
</div>
<?php
newtouch_get_footer();
