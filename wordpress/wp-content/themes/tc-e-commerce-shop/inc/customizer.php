<?php
/**
 * TC E-Commerce Shop Theme Customizer
 *
 * @package TC E-Commerce Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tc_e_commerce_shop_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_blogdescription',
		)
	);

	/* Custom panel type - used for multiple levels of panels */
	if ( class_exists( 'WP_Customize_Panel' ) ) {

		/**
		 * Class TC_E_Commerce_Shop_WP_Customize_Panel
		 */
		class TC_E_Commerce_Shop_WP_Customize_Panel extends WP_Customize_Panel {

			/**
			 * Panel
			 *
			 * @var $panel string Panel
			 */
			public $panel;

			/**
			 * Panel type
			 *
			 * @var $type string Panel type.
			 */
			public $type = 'tc_e_commerce_shop_panel';

			/**
			 * Form the json
			 */
			public function json() {

				$array                   = wp_array_slice_assoc(
					(array) $this, array(
						'id',
						'description',
						'priority',
						'type',
						'panel',
					)
				);
				$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
				$array['content']        = $this->get_content();
				$array['active']         = $this->active();
				$array['instanceNumber'] = $this->instance_number;

				return $array;

			}

		}

	}

	$wp_customize->register_panel_type( 'TC_E_Commerce_Shop_WP_Customize_Panel' );

	/**
	 * Upsells
	 */
	load_template( trailingslashit( get_template_directory() ) . 'inc/class-customizer-theme-info-control.php' );

	$wp_customize->add_section(
		'tc_e_commerce_shop_theme_info_main_section', array(
			'title'    => __( 'View PRO version', 'tc-e-commerce-shop' ),
			'priority' => 1,
		)
	);
	$wp_customize->add_setting(
		'tc_e_commerce_shop_theme_info_main_control', array(
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control(
		new TC_E_Commerce_Shop_Theme_Info(
			$wp_customize, 'tc_e_commerce_shop_theme_info_main_control', array(
				'section'     => 'tc_e_commerce_shop_theme_info_main_section',
				'priority'    => 100,
				'options'     => array(
					esc_html__( 'Enable-Disable options on every section', 'tc-e-commerce-shop' ),
					esc_html__( 'Background Color & Image Option', 'tc-e-commerce-shop' ),
					esc_html__( '100+ Font Family Options', 'tc-e-commerce-shop' ),
					esc_html__( 'Advanced Color options', 'tc-e-commerce-shop' ),
					esc_html__( 'Translation ready', 'tc-e-commerce-shop' ),
					esc_html__( 'Gallery, Banner, Post Type Plugin Functionality', 'tc-e-commerce-shop' ),
					esc_html__( 'Integrated Google map', 'tc-e-commerce-shop' ),
					esc_html__( '1 Year Free Support', 'tc-e-commerce-shop' ),
				),
				'button_url'  => esc_url( 'https://www.themescaliber.com/themes/multipurpose-ecommerce-wordpress-theme' ),
				'button_text' => esc_html__( 'View PRO version', 'tc-e-commerce-shop' ),
			)
		)
	);

	$tc_e_commerce_shop_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//add home page setting pannel
	$wp_customize->add_panel( 'tc_e_commerce_shop_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'tc-e-commerce-shop' ),
	    'description' => __( 'Description of what this panel does.', 'tc-e-commerce-shop' )
	) );

	//Color / Font Pallete
	$wp_customize->add_section( 'tc_e_commerce_shop_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'tc-e-commerce-shop' ),
		'priority'   => 30,
		'panel' => 'tc_e_commerce_shop_panel_id'
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'tc_e_commerce_shop_theme_color', array(
	    'default' => '#db3838',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_theme_color', array(
  		'label' => 'Theme Color Option',
	    'section' => 'tc_e_commerce_shop_typography',
	    'settings' => 'tc_e_commerce_shop_theme_color',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_paragraph_color', array(
		'label' => __('Paragraph Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_paragraph_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'Paragraph Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	$wp_customize->add_setting('tc_e_commerce_shop_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_atag_color', array(
		'label' => __('"a" Tag Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_atag_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( '"a" Tag Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_li_color', array(
		'label' => __('"li" Tag Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_li_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( '"li" Tag Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_h1_color', array(
		'label' => __('H1 Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_h1_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'H1 Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('tc_e_commerce_shop_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_h1_font_size',array(
		'label'	=> __('H1 Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_h2_color', array(
		'label' => __('h2 Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_h2_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'h2 Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('tc_e_commerce_shop_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_h2_font_size',array(
		'label'	=> __('h2 Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_h3_color', array(
		'label' => __('h3 Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_h3_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'h3 Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('tc_e_commerce_shop_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_h3_font_size',array(
		'label'	=> __('h3 Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_h4_color', array(
		'label' => __('h4 Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_h4_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'h4 Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('tc_e_commerce_shop_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_h4_font_size',array(
		'label'	=> __('h4 Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_h5_color', array(
		'label' => __('h5 Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_h5_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'h5 Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('tc_e_commerce_shop_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_h5_font_size',array(
		'label'	=> __('h5 Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'tc_e_commerce_shop_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_h6_color', array(
		'label' => __('h6 Color', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_typography',
		'settings' => 'tc_e_commerce_shop_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('tc_e_commerce_shop_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tc_e_commerce_shop_h6_font_family', array(
	    'section'  => 'tc_e_commerce_shop_typography',
	    'label'    => __( 'h6 Fonts','tc-e-commerce-shop'),
	    'type'     => 'select',
	    'choices'  => $tc_e_commerce_shop_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('tc_e_commerce_shop_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_h6_font_size',array(
		'label'	=> __('h6 Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_typography',
		'setting'	=> 'tc_e_commerce_shop_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'tc_e_commerce_shop_left_right', array(
    	'title' => __( 'Theme Layout Settings', 'tc-e-commerce-shop' ),
		'priority'   => null,
		'panel' => 'tc_e_commerce_shop_panel_id'
	) );

	// Preloader
	$wp_customize->add_setting( 'tc_e_commerce_shop_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tc_e_commerce_shop_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','tc-e-commerce-shop' ),
        'section' => 'tc_e_commerce_shop_left_right'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'tc_e_commerce_shop_preloader_type', array(
		'label' => __( 'Preloader Type','tc-e-commerce-shop' ),
		'section' => 'tc_e_commerce_shop_left_right',
		'type'  => 'select',
		'settings' => 'tc_e_commerce_shop_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','tc-e-commerce-shop'),
		    'chasing-square' => __('Chasing Square','tc-e-commerce-shop'),
	    ),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'tc_e_commerce_shop_left_right',
	    'settings' => 'tc_e_commerce_shop_preloader_color',
  	)));

  	$wp_customize->add_setting( 'tc_e_commerce_shop_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tc_e_commerce_shop_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'tc_e_commerce_shop_left_right',
	    'settings' => 'tc_e_commerce_shop_preloader_bg_color',
  	)));

	$wp_customize->add_setting('tc_e_commerce_shop_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','tc-e-commerce-shop'),
            'Contained Layout' => __('Contained Layout','tc-e-commerce-shop'),
            'Boxed Layout' => __('Boxed Layout','tc-e-commerce-shop'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tc_e_commerce_shop_theme_options',array(
	        'default' => 'Right Sidebar',
	        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	)   );
	$wp_customize->add_control('tc_e_commerce_shop_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Options','tc-e-commerce-shop'),
	        'section' => 'tc_e_commerce_shop_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','tc-e-commerce-shop'),
	            'Right Sidebar' => __('Right Sidebar','tc-e-commerce-shop'),
	            'One Column' => __('One Column','tc-e-commerce-shop'),
	            'Three Columns' => __('Three Columns','tc-e-commerce-shop'),
	            'Four Columns' => __('Four Columns','tc-e-commerce-shop'),
	            'Grid Layout' => __('Grid Layout','tc-e-commerce-shop')
	        ),
	    )
    );

    //Topbar
	$wp_customize->add_section('tc_e_commerce_shop_topbar',array(
		'title'	=> __('Top Header','tc-e-commerce-shop'),
		'description'	=> __('Add Header Content here','tc-e-commerce-shop'),
		'priority'	=> null,
		'panel' => 'tc_e_commerce_shop_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'tc_e_commerce_shop_topbar_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tc_e_commerce_shop_topbar_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','tc-e-commerce-shop' ),
        'section' => 'tc_e_commerce_shop_topbar'
    ));

	$wp_customize->add_setting('tc_e_commerce_shop_topbar_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_topbar_top_bottom',array(
		'label'	=> __('Topbar Top Bottom Padding','tc-e-commerce-shop'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'tc_e_commerce_shop_topbar',
		'type'=> 'number',
	));

	//Sticky Header
	$wp_customize->add_setting( 'tc_e_commerce_shop_sticky_header',array(
      	'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tc_e_commerce_shop_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','tc-e-commerce-shop' ),
        'section' => 'tc_e_commerce_shop_topbar'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','tc-e-commerce-shop'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'tc_e_commerce_shop_topbar',
		'type'=> 'number',
	));

    $wp_customize->selective_refresh->add_partial(
		'tc_e_commerce_shop_mail',
		array(
			'selector'        => '.email',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_tc_e_commerce_shop_mail',
		)
	);

	$wp_customize->add_setting('tc_e_commerce_shop_mail_icon',array(
		'default'	=> 'fa fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_mail_icon',array(
		'label'	=> __('Mail Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tc_e_commerce_shop_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_mail',array(
		'label'	=> __('Email','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_mail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_phone_icon',array(
		'default'	=> 'fa fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_phone_icon',array(
		'label'	=> __('Phone Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tc_e_commerce_shop_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_phone_number'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_call',array(
		'label'	=> __('Phone','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_call',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_topbar',
        'choices' => array(
            'uppercase' => __('Uppercase','tc-e-commerce-shop'),
            'capitalize' => __('Capitalize','tc-e-commerce-shop'),
        ),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float',
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_nav_font_size', array(
		'label' => __( 'Navigation Font Size','tc-e-commerce-shop' ),
		'section'     => 'tc_e_commerce_shop_topbar',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_font_weight_menu_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_topbar',
        'choices' => array(
            '100' => __('100','tc-e-commerce-shop'),
            '200' => __('200','tc-e-commerce-shop'),
            '300' => __('300','tc-e-commerce-shop'),
            '400' => __('400','tc-e-commerce-shop'),
            '500' => __('500','tc-e-commerce-shop'),
            'Default' => __('600','tc-e-commerce-shop'),
            '700' => __('700','tc-e-commerce-shop'),
            '800' => __('800','tc-e-commerce-shop'),
            '900' => __('900','tc-e-commerce-shop'),
        ),
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_facebook_icon',array(
		'label'	=> __('Facebook Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_facebook_url',array(
		'label'	=> __('Add Facebook link','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_twitter_icon',array(
		'label'	=> __('Twitter Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_twitter_url',array(
		'label'	=> __('Add Twitter link','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_instagram_icon',array(
		'label'	=> __('Instagram Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_instagram_url',array(
		'label'	=> __('Add Instagram link','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_youtube_icon',array(
		'label'	=> __('Youtube Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_youtube_url',array(
		'label'	=> __('Add Youtube link','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_linkedin_icon',array(
		'label'	=> __('LinkedIn Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_linkedin_url',array(
		'label'	=> __('Add LinkedIn link','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_topbar',
		'setting'	=> 'tc_e_commerce_shop_linkedin_url',
		'type'		=> 'url'
	));
    
    /*Social icon font size*/
	$wp_customize->add_setting('tc_e_commerce_shop_social_icon_fontsize',array(
		'default'=> '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size','tc-e-commerce-shop'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 100,
        ),
		'section'=> 'tc_e_commerce_shop_topbar',
		'type'=> 'number',
	));
	//home page slider
	$wp_customize->add_section( 'tc_e_commerce_shop_slidersettings' , array(
    	'title' => __( 'Slider Settings', 'tc-e-commerce-shop' ),
		'priority' => null,
		'panel' => 'tc_e_commerce_shop_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'tc_e_commerce_shop_slider_hide',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_tc_e_commerce_shop_slider_hide',
		)
	);

	$wp_customize->add_setting('tc_e_commerce_shop_slider_hide',array(
       'default' => false,
       'sanitize_callback'  => 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'tc_e_commerce_shop_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'tc_e_commerce_shop_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'tc_e_commerce_shop_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'tc-e-commerce-shop' ),
			'section'  => 'tc_e_commerce_shop_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('tc_e_commerce_shop_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('tc_e_commerce_shop_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','tc-e-commerce-shop'),
	   'section' => 'tc_e_commerce_shop_slidersettings',
	));

	$wp_customize->add_setting('tc_e_commerce_shop_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('tc_e_commerce_shop_slider_button',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Button','tc-e-commerce-shop'),
	   'section' => 'tc_e_commerce_shop_slidersettings',
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_button_text', array(
		'default'   => __('LEARN MORE','tc-e-commerce-shop'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_button_text', array(
		'label'       => esc_html__( 'Slider Button text','tc-e-commerce-shop' ),
		'section'     => 'tc_e_commerce_shop_slidersettings',
		'type'        => 'text',
		'settings'    => 'tc_e_commerce_shop_slider_button_text'
	) );

	//Opacity
	$wp_customize->add_setting('tc_e_commerce_shop_slider_opacity',array(
        'default'   => 0.6,
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','tc-e-commerce-shop' ),
		'section'    => 'tc_e_commerce_shop_slidersettings',
		'type'        => 'select',
		'settings'   => 'tc_e_commerce_shop_slider_opacity',
		'choices' => array(
	      '0' =>  esc_attr('0','tc-e-commerce-shop'),
	      '0.1' =>  esc_attr('0.1','tc-e-commerce-shop'),
	      '0.2' =>  esc_attr('0.2','tc-e-commerce-shop'),
	      '0.3' =>  esc_attr('0.3','tc-e-commerce-shop'),
	      '0.4' =>  esc_attr('0.4','tc-e-commerce-shop'),
	      '0.5' =>  esc_attr('0.5','tc-e-commerce-shop'),
	      '0.6' =>  esc_attr('0.6','tc-e-commerce-shop'),
	      '0.7' =>  esc_attr('0.7','tc-e-commerce-shop'),
	      '0.8' =>  esc_attr('0.8','tc-e-commerce-shop'),
	      '0.9' =>  esc_attr('0.9','tc-e-commerce-shop')
	  ),
	));

	$wp_customize->add_setting('tc_e_commerce_shop_home_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_home_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Slider Overlay','tc-e-commerce-shop'),
		'description'    => __('This option will add colors over the slider.','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_slidersettings'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_home_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tc_e_commerce_shop_home_slider_overlay_color', array(
		'label'    => __('Slider Overlay Color', 'tc-e-commerce-shop'),
		'section'  => 'tc_e_commerce_shop_slidersettings',
		'settings' => 'tc_e_commerce_shop_home_slider_overlay_color',
	)));

	//content Alignment
    $wp_customize->add_setting('tc_e_commerce_shop_slider_content_option',array(
    	'default' => 'Left',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_slidersettings',
        'choices' => array(
            'Center' => __('Center','tc-e-commerce-shop'),
            'Left' => __('Left','tc-e-commerce-shop'),
            'Right' => __('Right','tc-e-commerce-shop'),
        ),
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_content_spacing',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('tc_e_commerce_shop_content_spacing',array(
		'label'	=> esc_html__('Slider Content Spacing','tc-e-commerce-shop'),
		'section'=> 'tc_e_commerce_shop_slidersettings',
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_top_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_top_spacing', array(
		'label' => esc_html__( 'Top','tc-e-commerce-shop' ),
		'section' => 'tc_e_commerce_shop_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_bottom_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_bottom_spacing', array(
		'label' => esc_html__( 'Bottom','tc-e-commerce-shop' ),
		'section' => 'tc_e_commerce_shop_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_left_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_left_spacing', array(
		'label' => esc_html__( 'Left','tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_right_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_right_spacing', array(
		'label' => esc_html__('Right','tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_speed', array(
		'label' => esc_html__('Slider Speed','tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 500,
			'min' => 500,
			'max' => 5000,
		),
	) );
	
	$wp_customize->add_setting( 'tc_e_commerce_shop_slider_height', array(
		'default'  => ' ',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_slider_height', array(
		'label' => esc_html__('Slider Height','tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 5,
			'min' => 500,
			'max' => 1000,
		),
	) );


	//Our Product
	$wp_customize->add_section('tc_e_commerce_shop_product',array(
		'title'	=> __('Featured Products','tc-e-commerce-shop'),
		'description'=> __('This section will appear below the slider.','tc-e-commerce-shop'),
		'panel' => 'tc_e_commerce_shop_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'tc_e_commerce_shop_sec1_title',
		array(
			'selector'        => '#our-products strong',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_tc_e_commerce_shop_sec1_title',
		)
	);

	$wp_customize->add_setting('tc_e_commerce_shop_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_sec1_title',array(
		'label'	=> __('Section Title','tc-e-commerce-shop'),
		'section'=> 'tc_e_commerce_shop_product',
		'setting'=> 'tc_e_commerce_shop_sec1_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'tc_e_commerce_shop_servicesettings-page-', array(
		'default'           => '',
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'tc_e_commerce_shop_servicesettings-page-', array(
		'label'    => __( 'Select Product Page', 'tc-e-commerce-shop' ),
		'section'  => 'tc_e_commerce_shop_product',
		'type'     => 'dropdown-pages'
	));

	//Blog Post
	$wp_customize->add_section('tc_e_commerce_shop_blog_post',array(
		'title'	=> __('Post Settings','tc-e-commerce-shop'),
		'panel' => 'tc_e_commerce_shop_panel_id',
	));	

	$wp_customize->add_setting('tc_e_commerce_shop_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_blog_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_blog_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_blog_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_blog_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_feature_image_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_blog_post'
    ));

    $wp_customize->add_setting( 'tc_e_commerce_shop_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','tc-e-commerce-shop' ),
		'section' => 'tc_e_commerce_shop_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'tc_e_commerce_shop_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','tc-e-commerce-shop' ),
		'section' => 'tc_e_commerce_shop_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting('tc_e_commerce_shop_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_blog_post',
        'choices' => array(
            'No Content' => __('No Content','tc-e-commerce-shop'),
            'Full Content' => __('Full Content','tc-e-commerce-shop'),
            'Excerpt Content' => __('Excerpt Content','tc-e-commerce-shop'),
        ),
	) );

    $wp_customize->add_setting( 'tc_e_commerce_shop_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','tc-e-commerce-shop' ),
		'section'  => 'tc_e_commerce_shop_blog_post',
		'type'  => 'number',
		'settings' => 'tc_e_commerce_shop_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_button_excerpt_suffix', array(
		'default'   => '[...]',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','tc-e-commerce-shop' ),
		'section'     => 'tc_e_commerce_shop_blog_post',
		'type'        => 'text',
		'settings' => 'tc_e_commerce_shop_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_post_button_text', array(
		'default'   => __('Read Full','tc-e-commerce-shop'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_post_button_text', array(
		'label' => esc_html__('Post Button Text','tc-e-commerce-shop' ),
		'section'     => 'tc_e_commerce_shop_blog_post',
		'type'        => 'text',
		'settings'    => 'tc_e_commerce_shop_post_button_text'
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','tc-e-commerce-shop'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'tc_e_commerce_shop_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('tc_e_commerce_shop_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','tc-e-commerce-shop'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tc_e_commerce_shop_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control('tc_e_commerce_shop_button_border_radius', array(
        'label'  => __('Button Border Radius','tc-e-commerce-shop'),
        'type'=> 'number',
        'section'  => 'tc_e_commerce_shop_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

	$wp_customize->add_setting( 'tc_e_commerce_shop_post_blocks', array(
        'default'			=> 'Within box',
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'tc_e_commerce_shop_post_blocks', array(
        'section' => 'tc_e_commerce_shop_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'tc-e-commerce-shop' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'tc-e-commerce-shop' ),
            'Without box' => __( 'Without box', 'tc-e-commerce-shop' ),
    )));

    $wp_customize->add_setting('tc_e_commerce_shop_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_blog_post'
    ));

    $wp_customize->add_setting( 'tc_e_commerce_shop_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'tc_e_commerce_shop_post_navigation_type', array(
        'section' => 'tc_e_commerce_shop_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'tc-e-commerce-shop' ),
        'choices'		=> array(
            'numbers'  => __( 'Number', 'tc-e-commerce-shop' ),
            'next-prev' => __( 'Next/Prev Button', 'tc-e-commerce-shop' ),
    )));

    $wp_customize->add_setting( 'tc_e_commerce_shop_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'tc_e_commerce_shop_post_navigation_position', array(
        'section' => 'tc_e_commerce_shop_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'tc-e-commerce-shop' ),
        'choices' => array(
            'top'  => __( 'Top', 'tc-e-commerce-shop' ),
            'bottom' => __( 'Bottom', 'tc-e-commerce-shop' ),
            'both' => __( 'Both', 'tc-e-commerce-shop' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('tc_e_commerce_shop_single_post',array(
		'title'	=> __('Single Post Settings','tc-e-commerce-shop'),
		'panel' => 'tc_e_commerce_shop_panel_id',
	));	

	$wp_customize->add_setting('tc_e_commerce_shop_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Feature Image','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comment','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_single_post_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_single_post_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting( 'tc_e_commerce_shop_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_single_post',
		'type' => 'number',
		'settings' => 'tc_e_commerce_shop_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('tc_e_commerce_shop_comment_title',array(
       'default' => __('Leave a Reply','tc-e-commerce-shop'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_comment_submit_text',array(
       'default' => __('Post Comment','tc-e-commerce-shop'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_single_post'
    ));

    $wp_customize->add_setting( 'tc_e_commerce_shop_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'tc_e_commerce_shop_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','tc-e-commerce-shop' ),
		'section' => 'tc_e_commerce_shop_single_post',
		'type' => 'number',
		'settings' => 'tc_e_commerce_shop_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'tc_e_commerce_shop_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'tc_e_commerce_shop_post_order', array(
        'section' => 'tc_e_commerce_shop_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'tc-e-commerce-shop' ),
        'choices' => array(
            'categories'  => __('Categories', 'tc-e-commerce-shop'),
            'tags' => __( 'Tags', 'tc-e-commerce-shop' ),
    )));

    //404 page settings
	$wp_customize->add_section('tc_e_commerce_shop_404_page',array(
		'title'	=> __('404 & No Result Page Settings','tc-e-commerce-shop'),
		'priority'	=> null,
		'panel' => 'tc_e_commerce_shop_panel_id',
	));

	$wp_customize->add_setting('tc_e_commerce_shop_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_404_page'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_404_page'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_404_page'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_404_page'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_404_page'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('tc_e_commerce_shop_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','tc-e-commerce-shop'),
      	'section' => 'tc_e_commerce_shop_404_page',
	));

	//Footer
	$wp_customize->add_section('tc_e_commerce_shop_footer',array(
		'title'	=> __('Footer Section','tc-e-commerce-shop'),
		'description'=> __('This section will appear in  the footer..','tc-e-commerce-shop'),
		'panel' => 'tc_e_commerce_shop_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'tc_e_commerce_shop_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_tc_e_commerce_shop_show_back_to_top',
		)
	);

	$wp_customize->add_setting('tc_e_commerce_shop_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('tc_e_commerce_shop_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','tc-e-commerce-shop'),
      	'section' => 'tc_e_commerce_shop_footer',
	));

	$wp_customize->add_setting('tc_e_commerce_shop_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_footer',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_back_to_top_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('tc_e_commerce_shop_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_footer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_footer',
        'choices' => array(
            'Left' => __('Left','tc-e-commerce-shop'),
            'Right' => __('Right','tc-e-commerce-shop'),
            'Center' => __('Center','tc-e-commerce-shop'),
        ),
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tc_e_commerce_shop_footer_background_color', array(
		'label'    => __('Footer Background Color', 'tc-e-commerce-shop'),
		'section'  => 'tc_e_commerce_shop_footer',
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'tc_e_commerce_shop_footer_background_img',array(
        'label' => __('Footer Background Image','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_footer'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices',
    ));
    $wp_customize->add_control('tc_e_commerce_shop_footer_widget_layout',array(
        'type'        => 'radio',
        'label'       => __('Footer widget layout', 'tc-e-commerce-shop'),
        'section'     => 'tc_e_commerce_shop_footer',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'tc-e-commerce-shop'),
        'choices' => array(
            '1'     => __('One', 'tc-e-commerce-shop'),
            '2'     => __('Two', 'tc-e-commerce-shop'),
            '3'     => __('Three', 'tc-e-commerce-shop'),
            '4'     => __('Four', 'tc-e-commerce-shop')
        ),
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_footer',
        'choices' => array(
            'Left' => __('Left','tc-e-commerce-shop'),
            'Right' => __('Right','tc-e-commerce-shop'),
            'Center' => __('Center','tc-e-commerce-shop'),
        ),
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float',
	));	
	$wp_customize->add_control('tc_e_commerce_shop_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_footer',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float',
	));	
	$wp_customize->add_control('tc_e_commerce_shop_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_footer',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'tc_e_commerce_shop_footer_copy',
		array(
			'selector'        => '.copyright p',
			'render_callback' => 'tc_e_commerce_shop_customize_partial_tc_e_commerce_shop_footer_copy',
		)
	);

	$wp_customize->add_setting('tc_e_commerce_shop_footer_copy',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tc_e_commerce_shop_footer_copy',array(
		'label'	=> __('Copyright Text','tc-e-commerce-shop'),
		'section'=> 'tc_e_commerce_shop_footer',
		'setting'=> 'tc_e_commerce_shop_footer_copy',
		'type'=> 'text'
	));

    $wp_customize->add_setting('tc_e_commerce_copyright_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tc_e_commerce_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'tc-e-commerce-shop'),
		'section'  => 'tc_e_commerce_shop_footer',
	)));  

	//Mobile Media Section
	$wp_customize->add_section( 'tc_e_commerce_shop_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'tc-e-commerce-shop' ),
		'priority'   => null,
		'panel' => 'tc_e_commerce_shop_panel_id'
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tc_e_commerce_shop_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new TC_E_Commerce_Shop_Icon_Changer(
        $wp_customize, 'tc_e_commerce_shop_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'tc_e_commerce_shop_responsive_topbar_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tc_e_commerce_shop_responsive_topbar_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','tc-e-commerce-shop' ),
        'section' => 'tc_e_commerce_shop_mobile_media_options'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_mobile_media_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_mobile_media_slider',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_mobile_media_options'
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('tc_e_commerce_shop_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','tc-e-commerce-shop'),
      	'section' => 'tc_e_commerce_shop_mobile_media_options',
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tc_e_commerce_shop_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','tc-e-commerce-shop' ),
        'section' => 'tc_e_commerce_shop_mobile_media_options'
    ));

    $wp_customize->add_setting( 'tc_e_commerce_shop_responsive_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tc_e_commerce_shop_responsive_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Sticky header','tc-e-commerce-shop' ),
        'section' => 'tc_e_commerce_shop_mobile_media_options'
    ));

	//Woocommerce Section
	$wp_customize->add_section( 'tc_e_commerce_shop_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'tc-e-commerce-shop' ),
		'priority'   => null,
		'panel' => 'tc_e_commerce_shop_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'tc_e_commerce_shop_products_per_row' , array(
		'default'           => '3',
		'transport'         => 'refresh',
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices',
	) );

	$wp_customize->add_control('tc_e_commerce_shop_products_per_row', array(
		'label' => __( 'Product per row', 'tc-e-commerce-shop' ),
		'section'  => 'tc_e_commerce_shop_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('tc_e_commerce_shop_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_float'
	));	
	$wp_customize->add_control('tc_e_commerce_shop_product_per_page',array(
		'label'	=> __('Product per page','tc-e-commerce-shop'),
		'section'	=> 'tc_e_commerce_shop_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('tc_e_commerce_shop_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_woocommerce_options',
    ));
	
	$wp_customize->add_setting('tc_e_commerce_shop_shop_page_pagination',array(
		'default' => true,
		'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('tc_e_commerce_shop_shop_page_pagination',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Shop page pagination','tc-e-commerce-shop'),
		'section' => 'tc_e_commerce_shop_woocommerce_options',
	 ));

    $wp_customize->add_setting('tc_e_commerce_shop_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_woocommerce_options',
    ));

    $wp_customize->add_setting('tc_e_commerce_shop_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_woocommerce_options',
    ));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control( 'tc_e_commerce_shop_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('tc_e_commerce_shop_woocommerce_product_border',array(
       'default' => true,
       'sanitize_callback'	=> 'tc_e_commerce_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('tc_e_commerce_shop_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','tc-e-commerce-shop'),
       'section' => 'tc_e_commerce_shop_woocommerce_options',
    ));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_product_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_product_padding_right',array(
		'default' => 10,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control( 'tc_e_commerce_shop_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('tc_e_commerce_shop_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'tc_e_commerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('tc_e_commerce_shop_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','tc-e-commerce-shop'),
        'section' => 'tc_e_commerce_shop_woocommerce_options',
        'choices' => array(
            'left' => __('Left','tc-e-commerce-shop'),
            'right' => __('Right','tc-e-commerce-shop'),
        ),
	) );

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control( 'tc_e_commerce_shop_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_woocommerce_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tc_e_commerce_shop_product_sale_font_size',array(
		'default' => 16,
		'sanitize_callback' => 'tc_e_commerce_shop_sanitize_float'
	));
	$wp_customize->add_control('tc_e_commerce_shop_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','tc-e-commerce-shop' ),
		'type' => 'number',
		'section' => 'tc_e_commerce_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'tc_e_commerce_shop_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class TC_E_Commerce_Shop_Customizer_Upsell {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager Customizer manager.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . 'inc/ecommerce-customize-theme-info-main.php' );
		load_template( trailingslashit( get_template_directory() ) . 'inc/ecommerce-customize-upsell-section.php' );

		// Register custom section types.
		$manager->register_section_type( 'TC_E_Commerce_Shop_Customizer_Theme_Info_Main' );

		// Main Documentation Link In Customizer Root.
		$manager->add_section(
			new TC_E_Commerce_Shop_Customizer_Theme_Info_Main(
				$manager, 'tc-e-commerce-shop-theme-info', array(
					'theme_info_title' => __( 'Ecommerce Shop', 'tc-e-commerce-shop' ),
					'label_url'        => esc_url( 'https://www.themescaliber.com/demo/doc/free-tc-e-commerce-shop/' ),
					'label_text'       => __( 'Documentation', 'tc-e-commerce-shop' ),
				)
			)
		);

		// Frontpage Sections Upsell.
		$manager->add_section(
			new TC_E_Commerce_Shop_Customizer_Upsell_Section(
				$manager, 'tc-e-commerce-shop-upsell-frontpage-sections', array(
					'panel'       => 'tc_e_commerce_shop_panel_id',
					'priority'    => 500,
					'options'     => array(
						esc_html__( 'Category Tab Section', 'tc-e-commerce-shop' ),
						esc_html__( 'New Arrivals section', 'tc-e-commerce-shop' ),
						esc_html__( 'Mens Product Section ', 'tc-e-commerce-shop' ),
						esc_html__( 'Discount Banner Section', 'tc-e-commerce-shop' ),
						esc_html__( 'Womens Product Section', 'tc-e-commerce-shop' ),
						esc_html__( 'New Arrival / Best Seller section', 'tc-e-commerce-shop' ),
						esc_html__( 'Blog section', 'tc-e-commerce-shop' ),
						esc_html__( 'Brands section', 'tc-e-commerce-shop' ),
						esc_html__( 'Testimonial section', 'tc-e-commerce-shop' ),
						esc_html__( 'Subscribe section', 'tc-e-commerce-shop' ),
					),
					'button_url'  => esc_url( 'https://www.themescaliber.com/themes/multipurpose-ecommerce-wordpress-theme' ),
					'button_text' => esc_html__( 'View PRO version', 'tc-e-commerce-shop' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'tc-e-commerce-shop-upsell-js', trailingslashit( esc_url(get_template_directory_uri()) ) . 'inc/js/ecommerce-customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'tc-e-commerce-shop-theme-info-style', trailingslashit( esc_url(get_template_directory_uri()) ) . 'inc/css/ecommerce-style.css' );
	}
}

TC_E_Commerce_Shop_Customizer_Upsell::get_instance();