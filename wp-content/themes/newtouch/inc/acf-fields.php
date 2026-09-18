<?php
/**
 * ACF field group registration (code-based, so the theme works with a
 * fresh ACF install with zero manual field setup). Every piece of homepage
 * content and every image is editable through these groups.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function newtouch_register_acf_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	/* ---------------------------------------------------------------------
	 * Homepage — Hero
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'      => 'group_newtouch_hero',
		'title'    => 'Homepage — Hero',
		'fields'   => array(
			array(
				'key'   => 'field_nt_hero_bg_image',
				'label' => 'Background Image',
				'name'  => 'hero_background_image',
				'type'  => 'image',
				'return_format' => 'array',
				'instructions' => 'Full-bleed image behind the hero headline. A duotone tint and bottom scrim are applied automatically for text legibility.',
			),
			array(
				'key'   => 'field_nt_hero_heading',
				'label' => 'Heading',
				'name'  => 'hero_heading',
				'type'  => 'text',
				'default_value' => 'Everything runs better with one hand on it.',
			),
			array(
				'key'   => 'field_nt_hero_sub',
				'label' => 'Subheading',
				'name'  => 'hero_subheading',
				'type'  => 'textarea',
				'rows'  => 3,
				'default_value' => 'New Touch is the single team behind the boardroom decisions and the servers underneath them — strategy, infrastructure and security, held by the same hands from day one.',
			),
			array(
				'key'   => 'field_nt_hero_primary_text',
				'label' => 'Primary Button Text',
				'name'  => 'hero_primary_button_text',
				'type'  => 'text',
				'default_value' => 'Book an Infrastructure Review',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_hero_primary_url',
				'label' => 'Primary Button URL',
				'name'  => 'hero_primary_button_url',
				'type'  => 'url',
				'default_value' => '#contact',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_hero_secondary_text',
				'label' => 'Secondary Link Text',
				'name'  => 'hero_secondary_button_text',
				'type'  => 'text',
				'default_value' => 'See how we work',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_hero_secondary_url',
				'label' => 'Secondary Link URL',
				'name'  => 'hero_secondary_button_url',
				'type'  => 'url',
				'default_value' => '#pillars',
				'wrapper' => array( 'width' => '50' ),
			),
		),
		'location' => newtouch_homepage_location(),
		'menu_order' => 10,
	) );

	/* ---------------------------------------------------------------------
	 * Homepage — Signal Strip (trust stats)
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'    => 'group_newtouch_signal',
		'title'  => 'Homepage — Signal Strip',
		'fields' => array(
			array(
				'key'     => 'field_nt_signal_stats',
				'label'   => 'Stats',
				'name'    => 'signal_stats',
				'type'    => 'repeater',
				'layout'  => 'table',
				'button_label' => 'Add stat',
				'min'     => 1,
				'max'     => 6,
				'sub_fields' => array(
					array(
						'key'   => 'field_nt_signal_stat_label',
						'label' => 'Label',
						'name'  => 'stat_label',
						'type'  => 'text',
						'instructions' => 'e.g. 99.99% UPTIME GUARANTEE',
					),
				),
			),
		),
		'location'   => newtouch_homepage_location(),
		'menu_order' => 20,
	) );

	/* ---------------------------------------------------------------------
	 * Homepage — Pillars
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'    => 'group_newtouch_pillars',
		'title'  => 'Homepage — Pillars',
		'fields' => array(
			array(
				'key'   => 'field_nt_pillars_heading',
				'label' => 'Section Heading',
				'name'  => 'pillars_heading',
				'type'  => 'text',
				'default_value' => 'Three pillars, one operator.',
			),
			array(
				'key'     => 'field_nt_pillars',
				'label'   => 'Pillars',
				'name'    => 'pillars',
				'type'    => 'repeater',
				'layout'  => 'block',
				'button_label' => 'Add pillar',
				'min'     => 1,
				'max'     => 3,
				'sub_fields' => array(
					array(
						'key'   => 'field_nt_pillar_number',
						'label' => 'Index',
						'name'  => 'pillar_number',
						'type'  => 'text',
						'instructions' => 'e.g. 01',
						'wrapper' => array( 'width' => '20' ),
					),
					array(
						'key'   => 'field_nt_pillar_title',
						'label' => 'Title',
						'name'  => 'pillar_title',
						'type'  => 'text',
						'wrapper' => array( 'width' => '80' ),
					),
					array(
						'key'   => 'field_nt_pillar_description',
						'label' => 'Description',
						'name'  => 'pillar_description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_nt_pillar_icon',
						'label' => 'Custom Icon (optional)',
						'name'  => 'pillar_icon',
						'type'  => 'image',
						'return_format' => 'array',
						'instructions' => 'Leave empty to use one of the theme\'s built-in line-art icons, chosen below.',
					),
					array(
						'key'   => 'field_nt_pillar_icon_fallback',
						'label' => 'Built-in Icon',
						'name'  => 'pillar_icon_fallback',
						'type'  => 'select',
						'choices' => array(
							'strategy'       => 'Chart (Strategy)',
							'infrastructure' => 'Rack (Infrastructure)',
							'security'       => 'Shield (Security)',
						),
						'default_value' => 'strategy',
					),
				),
			),
		),
		'location'   => newtouch_homepage_location(),
		'menu_order' => 30,
	) );

	/* ---------------------------------------------------------------------
	 * Homepage — Beyond Fragmented Vendors
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'    => 'group_newtouch_beyond',
		'title'  => 'Homepage — Beyond Fragmented Vendors',
		'fields' => array(
			array(
				'key'   => 'field_nt_beyond_image',
				'label' => 'Image',
				'name'  => 'beyond_image',
				'type'  => 'image',
				'return_format' => 'array',
			),
			array(
				'key'   => 'field_nt_beyond_heading',
				'label' => 'Heading',
				'name'  => 'beyond_heading',
				'type'  => 'text',
				'default_value' => 'Beyond fragmented IT vendors.',
			),
			array(
				'key'   => 'field_nt_beyond_p1',
				'label' => 'Paragraph 1',
				'name'  => 'beyond_paragraph_1',
				'type'  => 'textarea',
				'rows'  => 3,
				'default_value' => 'Traditional IT support creates friction — a gap between strategic goals and technical execution, with nobody accountable for the whole picture.',
			),
			array(
				'key'   => 'field_nt_beyond_p2',
				'label' => 'Paragraph 2',
				'name'  => 'beyond_paragraph_2',
				'type'  => 'textarea',
				'rows'  => 3,
				'default_value' => 'We offer one cohesive operational backbone instead. Our directors work directly with your leadership, closing the distance between what the business needs and what the infrastructure delivers.',
			),
			array(
				'key'   => 'field_nt_beyond_link_text',
				'label' => 'Link Text',
				'name'  => 'beyond_link_text',
				'type'  => 'text',
				'default_value' => 'Learn about our method',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_beyond_link_url',
				'label' => 'Link URL',
				'name'  => 'beyond_link_url',
				'type'  => 'url',
				'default_value' => '#about',
				'wrapper' => array( 'width' => '50' ),
			),
		),
		'location'   => newtouch_homepage_location(),
		'menu_order' => 40,
	) );

	/* ---------------------------------------------------------------------
	 * Homepage — Services Index
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'    => 'group_newtouch_services',
		'title'  => 'Homepage — Services',
		'fields' => array(
			array(
				'key'   => 'field_nt_services_heading',
				'label' => 'Section Heading',
				'name'  => 'services_heading',
				'type'  => 'text',
				'default_value' => 'Expert business management, on tap.',
			),
			array(
				'key'   => 'field_nt_services_link_text',
				'label' => '"See all" Link Text',
				'name'  => 'services_link_text',
				'type'  => 'text',
				'default_value' => 'See all services',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_services_link_url',
				'label' => '"See all" Link URL',
				'name'  => 'services_link_url',
				'type'  => 'url',
				'default_value' => '#contact',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'     => 'field_nt_services',
				'label'   => 'Services',
				'name'    => 'services',
				'type'    => 'repeater',
				'layout'  => 'block',
				'button_label' => 'Add service',
				'min'     => 1,
				'sub_fields' => array(
					array(
						'key'   => 'field_nt_service_title',
						'label' => 'Title',
						'name'  => 'service_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_nt_service_description',
						'label' => 'Description',
						'name'  => 'service_description',
						'type'  => 'textarea',
						'rows'  => 2,
					),
					array(
						'key'   => 'field_nt_service_url',
						'label' => 'Link URL',
						'name'  => 'service_url',
						'type'  => 'url',
						'default_value' => '#contact',
					),
				),
			),
		),
		'location'   => newtouch_homepage_location(),
		'menu_order' => 50,
	) );

	/* ---------------------------------------------------------------------
	 * Homepage — CTA
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'    => 'group_newtouch_cta',
		'title'  => 'Homepage — Call to Action',
		'fields' => array(
			array(
				'key'   => 'field_nt_cta_heading',
				'label' => 'Heading',
				'name'  => 'cta_heading',
				'type'  => 'text',
				'default_value' => 'Schedule your operational infrastructure review.',
			),
			array(
				'key'   => 'field_nt_cta_sub',
				'label' => 'Subtext',
				'name'  => 'cta_paragraph',
				'type'  => 'textarea',
				'rows'  => 2,
				'default_value' => 'Connect with our senior directors to discuss how New Touch can unify your strategy and IT for unparalleled resilience.',
			),
			array(
				'key'   => 'field_nt_cta_button_text',
				'label' => 'Button Text',
				'name'  => 'cta_button_text',
				'type'  => 'text',
				'default_value' => 'Contact Us',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_cta_button_url',
				'label' => 'Button URL',
				'name'  => 'cta_button_url',
				'type'  => 'url',
				'default_value' => '#',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_cta_phone_text',
				'label' => 'Phone Button Text',
				'name'  => 'cta_phone_text',
				'type'  => 'text',
				'default_value' => '+44 020 8050 0485',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_cta_phone_url',
				'label' => 'Phone Button URL (tel:)',
				'name'  => 'cta_phone_url',
				'type'  => 'url',
				'default_value' => 'tel:+440208050485',
				'wrapper' => array( 'width' => '50' ),
			),
		),
		'location'   => newtouch_homepage_location(),
		'menu_order' => 60,
	) );

	/* ---------------------------------------------------------------------
	 * Site Settings (ACF Options page) — brand, footer, global CTA
	 * ------------------------------------------------------------------- */
	acf_add_local_field_group( array(
		'key'    => 'group_newtouch_site_settings',
		'title'  => 'Site Settings',
		'fields' => array(
			array(
				'key'   => 'field_nt_opt_accent_color',
				'label' => 'Accent Colour',
				'name'  => 'accent_color',
				'type'  => 'color_picker',
				'default_value' => '#ff3d00',
				'instructions' => 'The single spot colour used across buttons, dots and highlights.',
			),
			array(
				'key'   => 'field_nt_opt_nav_cta_text',
				'label' => 'Header CTA Text',
				'name'  => 'nav_cta_text',
				'type'  => 'text',
				'default_value' => 'Start a conversation',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_opt_nav_cta_url',
				'label' => 'Header CTA URL',
				'name'  => 'nav_cta_url',
				'type'  => 'url',
				'default_value' => '#contact',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_opt_footer_blurb',
				'label' => 'Footer Blurb',
				'name'  => 'footer_blurb',
				'type'  => 'textarea',
				'rows'  => 2,
				'default_value' => 'Unified boardroom advisory and enterprise IT management across the UK.',
			),
			array(
				'key'   => 'field_nt_opt_footer_address',
				'label' => 'Address',
				'name'  => 'footer_address',
				'type'  => 'textarea',
				'rows'  => 2,
				'default_value' => "The Artist Studio, Hylands House,\nHylands Estate, Chelmsford, CM2 8WQ",
			),
			array(
				'key'   => 'field_nt_opt_footer_phone',
				'label' => 'Phone',
				'name'  => 'footer_phone',
				'type'  => 'text',
				'default_value' => '+44 020 8050 0485',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_opt_footer_email',
				'label' => 'Email',
				'name'  => 'footer_email',
				'type'  => 'email',
				'default_value' => 'site@newtouch.co.uk',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_nt_opt_footer_copyright',
				'label' => 'Copyright Line',
				'name'  => 'footer_copyright',
				'type'  => 'text',
				'default_value' => sprintf( '© %s New Touch Ltd. Unified executive advisory and enterprise IT management across the UK.', date( 'Y' ) ),
			),
			array(
				'key'   => 'field_nt_opt_footer_tagline',
				'label' => 'Footer Tagline',
				'name'  => 'footer_tagline',
				'type'  => 'text',
				'default_value' => 'OPERATIONAL RESILIENCE · UK INFRASTRUCTURE',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'newtouch-site-settings',
				),
			),
		),
		'menu_order' => 0,
	) );
}
add_action( 'acf/init', 'newtouch_register_acf_fields' );

/**
 * Shared location rules for the homepage field groups: the static front
 * page, or any page using the Homepage template.
 */
function newtouch_homepage_location() {
	return array(
		array(
			array(
				'param'    => 'page_type',
				'operator' => '==',
				'value'    => 'front_page',
			),
		),
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'template-homepage.php',
			),
		),
	);
}
