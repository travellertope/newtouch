<?php
/**
 * The header for the New Touch theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#nt-main"><?php esc_html_e( 'Skip to content', 'newtouch' ); ?></a>

<?php $newtouch_has_hero = is_front_page() || is_page_template( 'page-templates/template-homepage.php' ); ?>

<header class="nt-header<?php echo $newtouch_has_hero ? ' nt-header--overlay' : ''; ?>">
	<?php if ( has_custom_logo() ) : ?>
		<div class="nt-brand nt-brand--logo"><?php the_custom_logo(); ?></div>
	<?php else : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nt-brand">
			<span class="nt-brand__mark" aria-hidden="true"></span>
			<span class="nt-brand__name">NEW TOUCH</span>
		</a>
	<?php endif; ?>

	<nav class="nt-nav" aria-label="<?php esc_attr_e( 'Primary', 'newtouch' ); ?>">
		<button class="nt-mobile-toggle" data-nav-toggle aria-expanded="false" aria-controls="nt-primary-menu">
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'newtouch' ); ?></span>
			<svg width="18" height="14" viewBox="0 0 18 14" fill="none" aria-hidden="true"><path d="M0 1H18M0 7H18M0 13H18" stroke="currentColor" stroke-width="1.4"/></svg>
		</button>

		<div id="nt-primary-menu" data-nav-menu>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul>%3$s</ul>',
				) );
			} else {
				echo '<ul>';
				echo '<li><a href="' . esc_url( home_url( '/#pillars' ) ) . '">' . esc_html__( 'What we do', 'newtouch' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/#services' ) ) . '">' . esc_html__( 'Services', 'newtouch' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/#about' ) ) . '">' . esc_html__( 'About', 'newtouch' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/#contact' ) ) . '">' . esc_html__( 'Contact', 'newtouch' ) . '</a></li>';
				echo '</ul>';
			}
			?>
		</div>

		<a href="<?php echo esc_url( newtouch_option( 'nav_cta_url', '#contact' ) ); ?>" class="nt-nav-cta">
			<span class="nt-mono"><?php echo esc_html( newtouch_option( 'nav_cta_text', 'Start a conversation' ) ); ?></span>
			<span class="nt-nav-cta__switch" aria-hidden="true"></span>
		</a>
	</nav>
</header>

<main id="nt-main">
