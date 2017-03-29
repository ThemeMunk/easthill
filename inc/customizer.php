<?php
/**
 * Easthill Theme Customizer.
 *
 * @package easthill
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function easthill_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// create an empty array
	$easthill_cats = array();
    $easthill_cats[''] = esc_html__( 'Select Category', 'easthill' );	 
	// we loop over the categories and set the names and
	// labels we need
	foreach ( get_categories() as $categories => $category ){
		$easthill_cats[$category->term_id] = $category->name;
	}	
	
    /** Slideshow Settings */
    $wp_customize->add_section(
        'easthill_slideshow_settings',
        array(
            'title' => esc_html__( 'Slideshow Settings', 'easthill' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Slideshow */
    $wp_customize->add_setting(
        'easthill_ed_slideshow',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'easthill_ed_slideshow',
        array(
            'label' => esc_html__( 'Enable Home Page Slideshow', 'easthill' ),
            'section' => 'easthill_slideshow_settings',
            'type' => 'checkbox',
        )
    );
    
  
    /** Enable/Disable Slideshow Caption */
    $wp_customize->add_setting(
        'easthill_slideshow_caption',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'easthill_slideshow_caption',
        array(
            'label' => esc_html__( 'Enable Slideshow Caption', 'easthill' ),
            'section' => 'easthill_slideshow_settings',
            'type' => 'checkbox',
        )
    );    
		
    /** Slider Category */
    $wp_customize->add_setting(
        'easthill_slider_category_select',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'easthill_slider_category_select',
        array(
            'label' => esc_html__( 'Select Category For Slider Posts', 'easthill' ),
            'description' => esc_html__( 'Latest 6 posts from the selected category will be shown in slider.', 'easthill' ),			
            'section' => 'easthill_slideshow_settings',
            'type' => 'select',
            'choices' => $easthill_cats,
        )
    );	
	
    /** Slideshow Settings Ends */	
	
    /** Featured Posts Section */    
    $wp_customize->add_section(
        'easthill_featured_post_settings',
        array(
            'title' => esc_html__( 'Featured Posts Settings', 'easthill' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Featured Post Section */
    $wp_customize->add_setting(
        'easthill_ed_featured_post',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'easthill_ed_featured_post',
        array(
            'label' => esc_html__( 'Enable Featured Post Section', 'easthill' ),
            'section' => 'easthill_featured_post_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Featured Section Title */
    $wp_customize->add_setting(
        'easthill_featured_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'easthill_featured_section_title',
        array(
            'label'   => esc_html__( 'Featured Section Title', 'easthill' ),
            'section' => 'easthill_featured_post_settings',
            'type'    => 'text',
        )
    );
    

    /** Featured Section Category */
    $wp_customize->add_setting(
        'easthill_featured_category_select',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'easthill_featured_category_select',
        array(
            'label' => esc_html__( 'Select Category For Featured Posts Section', 'easthill' ),
            'description' => esc_html__( 'Latest 3 posts from the selected category will be shown in the featured post section.', 'easthill' ),			
            'section' => 'easthill_featured_post_settings',
            'type' => 'select',
            'choices' => $easthill_cats,
        )
    );	
	

    /** Featured Posts Section Ends */	
			       
    /** Social Settings */
    $wp_customize->add_section(
        'easthill_social_settings',
        array(
            'title' => esc_html__( 'Social Media Settings', 'easthill' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social Link in Header */
    $wp_customize->add_setting(
        'easthill_social_ed',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'easthill_social_ed',
        array(
            'label' => esc_html__( 'Enable Social Links in Header', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'checkbox',
        )
    );
    /** Enable/Disable Social Link in Footer */
    $wp_customize->add_setting(
        'easthill_social_ed_footer',
        array(
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'easthill_social_ed_footer',
        array(
            'label' => esc_html__( 'Enable Social Links in Footer', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'checkbox',
        )
    );	

    /** Facebook Button Url */
    $wp_customize->add_setting(
        'easthill_button_url_fb',
        array( 
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'easthill_button_url_fb',
        array(
            'label' => esc_html__( 'Facebook Page Url', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'text',
        )
    );
        /** Twiter Button Url */
    $wp_customize->add_setting(
        'easthill_button_url_tw',
        array( 
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'easthill_button_url_tw',
        array(
            'label' => esc_html__( 'Twitter Page Url', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'text',
        )
    );
    /** Pinterest Button Url */
    $wp_customize->add_setting(
        'easthill_button_url_pin',
        array( 
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'easthill_button_url_pin',
        array(
            'label' => esc_html__( 'Pinterest Page Url', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'text',
        )
    );
    /** Instagram Button Url */
    $wp_customize->add_setting(
        'easthill_button_url_ins',
        array( 
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'easthill_button_url_ins',
        array(
            'label' => esc_html__( 'Instagram Page Url', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'text',
        )
    );

    /**  Google Plus Button Url */
    $wp_customize->add_setting(
        'easthill_button_url_gp',
        array( 
            'default' => '',
            'sanitize_callback' => 'easthill_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'easthill_button_url_gp',
        array(
            'label' => esc_html__( 'Google Plus Url', 'easthill' ),
            'section' => 'easthill_social_settings',
            'type' => 'text',
        )
    );
    /** Social Settings Ends */

    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */
     function easthill_sanitize_checkbox( $checked ){
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
     }
         
     
     function easthill_sanitize_select( $input, $setting ){
        // Ensure input is a slug.
    	$input = sanitize_key( $input );
    	
    	// Get list of choices from the control associated with the setting.
    	$choices = $setting->manager->get_control( $setting->id )->choices;
    	
    	// If the input is a valid key, return it; otherwise, return the default.
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
     }
     
     function easthill_sanitize_url( $url ){
        return esc_url_raw( $url );
     }
         
}
add_action( 'customize_register', 'easthill_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function easthill_customize_preview_js() {
	wp_enqueue_script( 'easthill-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'easthill_customize_preview_js' );