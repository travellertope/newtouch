<?php
/**
 * The footer for the New Touch theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>

<footer class="nt-footer" id="about">
	<div class="nt-footer__top">
		<div class="nt-footer__brand">
			<div class="nt-footer__brand-row">
				<span class="nt-brand__mark" aria-hidden="true"></span>
				<span class="nt-brand__name">NEW TOUCH</span>
			</div>
			<p class="nt-footer__blurb"><?php echo esc_html( newtouch_option( 'footer_blurb', 'Unified boardroom advisory and enterprise IT management across the UK.' ) ); ?></p>
		</div>

		<div class="nt-footer__col">
			<div class="nt-footer__col-label nt-mono"><?php esc_html_e( 'SITEMAP', 'newtouch' ); ?></div>
			<nav class="nt-footer__links" aria-label="<?php esc_attr_e( 'Footer', 'newtouch' ); ?>">
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'link_before'    => '',
					) );
				} else {
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'newtouch' ) . '</a>';
					echo '<a href="' . esc_url( home_url( '/#services' ) ) . '">' . esc_html__( 'Services', 'newtouch' ) . '</a>';
					echo '<a href="' . esc_url( home_url( '/#about' ) ) . '">' . esc_html__( 'About', 'newtouch' ) . '</a>';
					echo '<a href="' . esc_url( home_url( '/#contact' ) ) . '">' . esc_html__( 'Contact', 'newtouch' ) . '</a>';
				}
				?>
			</nav>
		</div>

		<div class="nt-footer__col">
			<div class="nt-footer__col-label nt-mono"><?php esc_html_e( 'HEADQUARTERS', 'newtouch' ); ?></div>
			<div class="nt-footer__contact">
				<?php echo nl2br( esc_html( newtouch_option( 'footer_address', "The Artist Studio, Hylands House,\nHylands Estate, Chelmsford, CM2 8WQ" ) ) ); ?>
				<br><br>
				<?php $phone = newtouch_option( 'footer_phone', '+44 020 8050 0485' ); ?>
				<?php esc_html_e( 'Direct desk:', 'newtouch' ); ?> <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><br>
				<?php $email = newtouch_option( 'footer_email', 'site@newtouch.co.uk' ); ?>
				<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
			</div>
		</div>
	</div>

	<div class="nt-footer__bottom">
		<span><?php echo esc_html( newtouch_option( 'footer_copyright', '© ' . date( 'Y' ) . ' New Touch Ltd. Unified executive advisory and enterprise IT management across the UK.' ) ); ?></span>
		<span class="nt-footer__tagline"><?php echo esc_html( newtouch_option( 'footer_tagline', 'OPERATIONAL RESILIENCE · UK INFRASTRUCTURE' ) ); ?></span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
