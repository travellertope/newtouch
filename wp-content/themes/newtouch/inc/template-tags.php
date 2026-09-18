<?php
/**
 * Small helpers used across templates. Keeping ACF calls behind these means
 * every template still renders sensible copy if ACF isn't active yet, and
 * the mockup's copy doubles as the fallback content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get an ACF field with a fallback, on the current post (or a given post ID).
 */
function newtouch_field( $selector, $default = '', $post_id = false ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $selector, $post_id );
		if ( $value !== null && $value !== false && $value !== '' ) {
			return $value;
		}
	}
	return $default;
}

/**
 * Get an ACF field from the Site Settings options page, with a fallback.
 */
function newtouch_option( $selector, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $selector, 'option' );
		if ( $value !== null && $value !== false && $value !== '' ) {
			return $value;
		}
	}
	return $default;
}

/**
 * Render an ACF image field (array or ID) at a given size, or a labelled
 * placeholder box so missing content is obvious in the admin/preview
 * rather than silently blank.
 */
function newtouch_image( $field, $size = 'large', $placeholder_label = 'IMAGE PLACEHOLDER', $post_id = false, $img_attrs = array() ) {
	$image = function_exists( 'get_field' ) ? get_field( $field, $post_id ) : false;

	if ( is_array( $image ) && ! empty( $image['ID'] ) ) {
		echo wp_get_attachment_image( $image['ID'], $size, false, $img_attrs );
		return;
	}

	printf(
		'<div class="nt-image-placeholder"><span class="nt-image-placeholder__tag">%s — ACF: %s</span></div>',
		esc_html( $placeholder_label ),
		esc_html( $field )
	);
}

/**
 * Background-image placeholder used by the hero: same idea as
 * newtouch_image(), but returns an inline background-image style
 * (or the diagonal-stripe placeholder class) instead of an <img>.
 */
function newtouch_hero_bg_style( $field, $post_id = false ) {
	$image = function_exists( 'get_field' ) ? get_field( $field, $post_id ) : false;

	if ( is_array( $image ) && ! empty( $image['url'] ) ) {
		return sprintf( 'style="background-image:url(%s);"', esc_url( $image['url'] ) );
	}

	return '';
}

function newtouch_hero_bg_has_image( $field, $post_id = false ) {
	$image = function_exists( 'get_field' ) ? get_field( $field, $post_id ) : false;
	return is_array( $image ) && ! empty( $image['url'] );
}

/**
 * Built-in line-art icons used by the Pillars section when an editor
 * hasn't uploaded a custom icon. Kept inline (not raster images) so they
 * stay crisp and pick up the accent colour.
 */
function newtouch_pillar_icon_svg( $key, $accent = 'var(--nt-accent)' ) {
	$icons = array(
		'strategy' => '<svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="10" y="10" width="100" height="100" stroke="#0A0A0A" stroke-width="1.2"/><polyline points="24,86 46,60 64,72 96,28" stroke="' . esc_attr( $accent ) . '" stroke-width="2.5" fill="none"/><circle cx="96" cy="28" r="4.5" fill="' . esc_attr( $accent ) . '"/></svg>',
		'infrastructure' => '<svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="20" y="14" width="80" height="22" rx="2" stroke="#0A0A0A" stroke-width="1.2"/><rect x="20" y="49" width="80" height="22" rx="2" stroke="#0A0A0A" stroke-width="1.2"/><rect x="20" y="84" width="80" height="22" rx="2" stroke="#0A0A0A" stroke-width="1.2"/><circle cx="30" cy="25" r="3" fill="' . esc_attr( $accent ) . '"/><circle cx="30" cy="60" r="3" fill="' . esc_attr( $accent ) . '"/><circle cx="30" cy="95" r="3" fill="' . esc_attr( $accent ) . '"/></svg>',
		'security' => '<svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M60 12 L100 26 V58 C100 86 82 102 60 110 C38 102 20 86 20 58 V26 Z" stroke="#0A0A0A" stroke-width="1.2"/><rect x="48" y="56" width="24" height="20" rx="2" stroke="' . esc_attr( $accent ) . '" stroke-width="2"/><path d="M52 56 V48 a8 8 0 0 1 16 0 V56" stroke="' . esc_attr( $accent ) . '" stroke-width="2" fill="none"/></svg>',
	);

	return isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['strategy'];
}

/**
 * Simple right-pointing arrow used on hover states (service rows, links).
 */
function newtouch_arrow_svg( $class = '' ) {
	printf(
		'<svg class="%s" width="18" height="12" viewBox="0 0 18 12" fill="none" aria-hidden="true"><path d="M1 6H17M17 6L12 1M17 6L12 11" stroke="#0A0A0A" stroke-width="1.3"/></svg>',
		esc_attr( $class )
	);
}
