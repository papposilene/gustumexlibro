<?php
/**
 * Gustrumexlibro Theme Customizer.
 *
 * @package gustumexlibro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function gustumexlibro_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport		= 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // create an empty array
    $gustumexlibro_cats = array();
    $gustumexlibro_cats[''] = esc_html__( 'Select Category', 'gustumexlibro' );
    foreach ( get_categories() as $categories => $category ){
	$gustumexlibro_cats[$category->term_id] = $category->name;
    }

    /** About Section */
    $wp_customize->add_section(
        'gustumexlibro_about_settings',
        array(
            'title' => esc_html__( 'Settings for about section', 'gustumexlibro' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
	'gustumexlibro_about_settings',
	array(
	    'capability' => 'edit_theme_options',
	    'default' => 'Lorem Ipsum Dolor Sit amet',
	    'sanitize_callback' => 'sanitize_text_field'
	)
    );
    $wp_customize->add_control(
	'gustumexlibro_about_settings',
	array(
	    'type' => 'textarea',
	    'section' => 'gustumexlibro_about_settings',
	    'label' => esc_html__( 'About Text', 'gustumexlibro' ),
	    'description' => esc_html__( 'Write an About text for the footer', 'gustumexlibro' ),
	)
    );
    
    /** Featured Posts Section */    
    $wp_customize->add_section(
        'gustumexlibro_featured_post_settings',
        array(
            'title' => esc_html__( 'Settings for featured posts', 'gustumexlibro' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    /** Enable/Disable Featured Post Section */
    $wp_customize->add_setting(
        'gustumexlibro_ed_featured_post',
        array(
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_ed_featured_post',
        array(
            'label' => esc_html__( 'Enable Featured Post Section', 'gustumexlibro' ),
            'section' => 'gustumexlibro_featured_post_settings',
            'type' => 'checkbox',
        )
    );
    /** Featured Section Title */
    $wp_customize->add_setting(
        'gustumexlibro_featured_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'gustumexlibro_featured_section_title',
        array(
            'label'   => esc_html__( 'Featured Section Title', 'gustumexlibro' ),
            'section' => 'gustumexlibro_featured_post_settings',
            'type'    => 'text',
        )
    );
    /** Featured Section Category */
    $wp_customize->add_setting(
        'gustumexlibro_featured_category_select',
        array(
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_featured_category_select',
        array(
            'label' => esc_html__( 'Select Category For Featured Posts Section', 'gustumexlibro' ),
            'description' => esc_html__( 'Latest 3 posts from the selected category will be shown in the featured post section.', 'gustumexlibro' ),			
            'section' => 'gustumexlibro_featured_post_settings',
            'type' => 'select',
            'choices' => $gustumexlibro_cats,
        )
    );	
    /** Featured Posts Section Ends */	

    /** Social Settings */
    $wp_customize->add_section(
        'gustumexlibro_sociallinks_settings',
        array(
            'title' => esc_html__( 'Settings for social networks', 'gustumexlibro' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social Link in Header */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_header',
        array(
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_header',
        array(
            'label' => esc_html__( 'Enable Social Links in Header', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'checkbox',
        )
    );
    /** Enable/Disable Social Link in Footer */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_footer',
        array(
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_footer',
        array(
            'label' => esc_html__( 'Enable Social Links in Footer', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'checkbox',
        )
    );	
    /** Facebook Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_facebook_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_facebook_url',
        array(
            'label' => esc_html__( 'Facebook Page URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Twiter Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_twitter_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_twitter_url',
        array(
            'label' => esc_html__( 'Twitter Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Flickr Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_flickr_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_flickr_url',
        array(
            'label' => esc_html__( 'Flickr Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Pinterest Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_pinterest_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_pinterest_url',
        array(
            'label' => esc_html__( 'Pinterest Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Instagram Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_instagram_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_instagram_url',
        array(
            'label' => esc_html__( 'Instagram Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Last.FM Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_lastfm_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_lastfm_url',
        array(
            'label' => esc_html__( 'Last.FM Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Spotify Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_spotify_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_spotify_url',
        array(
            'label' => esc_html__( 'Spotify Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Snapchat Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_snapchat_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_snapchat_url',
        array(
            'label' => esc_html__( 'Snapchat Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Youtube Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_youtube_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_youtube_url',
        array(
            'label' => esc_html__( 'Youtube Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /**  Google Plus Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_googleplus_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_googleplus_url',
        array(
            'label' => esc_html__( 'Google+ Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /**  LinkedIn Button Url */
    $wp_customize->add_setting(
        'gustumexlibro_sociallinks_linkedin_url',
        array( 
            'default' => '',
            'sanitize_callback' => 'gustumexlibro_sanitize_url',
        )
    );
    $wp_customize->add_control(
        'gustumexlibro_sociallinks_linkedin_user',
        array(
            'label' => esc_html__( 'LinkedIn Profile URL', 'gustumexlibro' ),
            'section' => 'gustumexlibro_sociallinks_settings',
            'type' => 'text',
        )
    );
    /** Social Settings Ends */

    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */
    function gustumexlibro_sanitize_checkbox( $checked ){
	// Boolean check
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
    
    function gustumexlibro_sanitize_select( $input, $setting ){
        // Ensure input is a slug.
    	$input = sanitize_key( $input );
    	$choices = $setting->manager->get_control( $setting->id )->choices;
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
    function gustumexlibro_sanitize_url( $url ){
	return esc_url_raw( $url );
    }
}
add_action( 'customize_register', 'gustumexlibro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gustumexlibro_customize_preview_js() {
    wp_enqueue_script( 'gustumexlibro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'gustumexlibro_customize_preview_js' );