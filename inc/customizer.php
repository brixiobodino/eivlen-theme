<?php
/**
 * eivlen Theme Customizer
 *
 * @package eivlen
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eivlen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'eivlen_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'eivlen_customize_partial_blogdescription',
		) );
	}
	$wp_customize->add_setting( 'eivlen_link_color', array(
      'default' => '#deb841',
      'transfort' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_setting( 'eivlen_button_color', array(
      'default' => '#DEB841',
      'transfort' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_setting( 'eivlen_button_text_color', array(
      'default' => '#fff',
      'transfort' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
     
     $wp_customize->add_section( 'eivlen_color_section', array(
      'title' => __('Eivlen Theme Colors','eivlen'),
      'priority' => '30',
    ) );
    $wp_customize->add_control(new wp_customize_Color_Control($wp_customize,'eivlen_link_color_control',array(
     'label'=> __('Link Colors','eivlen'),
     'section'=>'eivlen_color_section',
     'settings'=>'eivlen_link_color',
    )));
    $wp_customize->add_control(new wp_customize_Color_Control($wp_customize,'eivlen_button_color_control',array(
     'label'=> __('Button Color','eivlen'),
     'section'=>'eivlen_color_section',
     'settings'=>'eivlen_button_color',
    )));
    $wp_customize->add_control(new wp_customize_Color_Control($wp_customize,'eivlen_button_text_color_control',array(
     'label'=> __('Button Text Color','eivlen'),
     'section'=>'eivlen_color_section',
     'settings'=>'eivlen_button_text_color',
    )));

   
    //homepage hero options
    $wp_customize->add_setting( 'eivlen_hero_display', array(
  'capability' => 'edit_theme_options',
  'default' => 'block',
  'sanitize_callback' => 'themeslug_customizer_sanitize_radio',
  'transfort' => 'refresh',
    ) );
    $wp_customize->add_section( 'eivlen_hero_section', array(
      'title' => __('Eivlen Hero Section','eivlen'),
      'priority' => '33',
    ) );
    $wp_customize->add_control( 'eivlen_hero_display', array(
      'type' => 'radio',
      'section' => 'eivlen_hero_section', // Add a default or your own section
      'label' => __( 'Hero Visibility','eivlen' ),
      'description' => __( 'This will affect the visibility of Hero section in homepage','eivlen' ),
      'choices' => array(
        'none' => __( 'Hidden','eivlen' ),
        'block' => __( 'Visible','eivlen' ),
      ),
    ) );
      $wp_customize->add_setting('hero_image_setting', array(
        'default' => '',
        'transfort' => 'refresh',
        'sanitize_callback' => 'theme_slug_sanitize_file'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image_control', array(
        'label' => 'Featured Image',
        'description' => __( 'This will display image in hero section','eivlen' ),
        'settings'  => 'hero_image_setting',
        'section'   => 'eivlen_hero_section'
    ) ));
    //file input sanitization function
        function theme_slug_sanitize_file( $file, $setting ) {
          
            //allowed file types
            $mimes = array(
                'jpg|jpeg|jpe' => 'image/jpeg',
                'gif'          => 'image/gif',
                'png'          => 'image/png'
            );
              
            //check file type from file name
            $file_ext = wp_check_filetype( $file, $mimes );
              
            //if file has a valid mime type return it, otherwise return default
            return ( $file_ext['ext'] ? $file : $setting->default );
        }
    function themeslug_customizer_sanitize_radio( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( 'eivlen_hero_display')->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//hero title text
$wp_customize->add_setting( 'hero_title_setting', array(
  'capability' => 'edit_theme_options',
  'default' => 'Lorem Ipsum',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'hero_title_setting', array(
  'type' => 'text',
  'section' => 'eivlen_hero_section', // Add a default or your own section
  'label' => __( 'Hero Title Text','eivlen' ),
  'description' => __( 'This will be the title of your Hero.','eivlen' ),
) );

//hero paragraph text
$wp_customize->add_setting( 'hero_content_setting', array(
  'capability' => 'edit_theme_options',
  'default' => 'Lorem Ipsum',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'hero_content_setting', array(
  'type' => 'textarea',
  'section' => 'eivlen_hero_section', // Add a default or your own section
  'label' => __( 'Hero Content Text','eivlen' ),
  'description' => __( 'This will be the content of your Hero.','eivlen' ),
) );
//hero button
$wp_customize->add_setting( 'hero_button_link_setting', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'hero_button_link_setting', array(
  'type' => 'text',
  'section' => 'eivlen_hero_section', // Add a default or your own section
  'label' => __( 'Hero Button Link','eivlen' ),
  'description' => __( 'This will be link of your hero button.','eivlen' ),
) );
//hero button
$wp_customize->add_setting( 'hero_button_text_setting', array(
  'capability' => 'edit_theme_options',
  'default' => 'Read More',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'hero_button_text_setting', array(
  'type' => 'text',
  'section' => 'eivlen_hero_section', // Add a default or your own section
  'label' => __( 'Hero Button Text','eivlen' ),
  'description' => __( 'This will be the text of your hero button.','eivlen' ),
) );
//top menu option
 $wp_customize->add_setting( 'eivlen_top_menu_background_setting', array(
      'default' => '##2B292D',
      'transfort' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
     $wp_customize->add_section( 'eivlen_top_menu_option', array(
      'title' => __('Eivlen Theme Top Menu','eivlen'),
      'priority' => '31',
    ) );
    $wp_customize->add_control(new wp_customize_Color_Control($wp_customize,'eivlen_top_menu_background_control',array(
     'label'=> __('Top Menu Background Color','eivlen'),
     'section'=>'eivlen_top_menu_option',
     'settings'=>'eivlen_top_menu_background_setting',
    )));

// blog layout
    $wp_customize->add_setting( 'eivlen_blog_layout', array(
  'capability' => 'edit_theme_options',
  'default' => 'fullwidth',
  'sanitize_callback' => 'themeslug_customizer_sanitize_radio_blog_layout',
  'transfort' => 'refresh',
    ) );
    $wp_customize->add_section( 'eivlen_blog_layout_section', array(
      'title' => __('Eivlen Blog Layout','eivlen'),
      'priority' => '34',
    ) );
    $wp_customize->add_control( 'eivlen_blog_layout', array(
      'type' => 'radio',
      'section' => 'eivlen_blog_layout_section', // Add a default or your own section
      'label' => __( 'Blog Layout','eivlen' ),
      'description' => __( 'This will set the layout of your Blog page','eivlen' ),
      'choices' => array(
        'fullwidth' => __( 'Full Width','eivlen' ),
        'with_sidebar' => __( 'With Sidebar','eivlen' ),
      ),
    ) );
    function themeslug_customizer_sanitize_radio_blog_layout( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( 'eivlen_blog_layout')->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
     $wp_customize->add_setting( 'eivlen_blog_display', array(
  'capability' => 'edit_theme_options',
  'default' => 'grid',
  'sanitize_callback' => 'themeslug_customizer_sanitize_radio_blog_display',
  'transfort' => 'refresh',
    ) );
    $wp_customize->add_control( 'eivlen_blog_display', array(
      'type' => 'radio',
      'section' => 'eivlen_blog_layout_section', // Add a default or your own section
      'label' => __( 'Blog Display','eivlen' ),
      'description' => __( 'This will set the display of your Blog page','eivlen' ),
      'choices' => array(
        'grid' => __( 'Grid','eivlen' ),
        'left-aligned' => __( 'Left Aligned Featured Image','eivlen'),
        'full_grid_below' => __( 'Full Width first post and grid succeeding post','eivlen' ),
        'right-aligned' => __( 'Right Aligned Featured Image','eivlen' ),
      ),
    ) );
    function themeslug_customizer_sanitize_radio_blog_display( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( 'eivlen_blog_display')->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//social media fb
 $wp_customize->add_section( 'eivlen_socials_section', array(
      'title' => __('Eivlen Social Media','eivlen'),
      'priority' => '32',
    ) );
$wp_customize->add_setting( 'eivlen_fb_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_fb_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Facebook','eivlen' ),
  'description' => __( 'Enter Url of your Facebook Account','eivlen' ),
) );
//social media instagram
$wp_customize->add_setting( 'eivlen_instagram_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_instagram_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Instagram' ,'eivlen'),
  'description' => __( 'Enter Url of your Instagram Account' ,'eivlen'),
) );
//social media twitter
$wp_customize->add_setting( 'eivlen_twitter_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_twitter_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Twitter', 'eivlen'),
  'description' => __( 'Enter Url of your Twitter Account','eivlen' ),
) );
//social media pinterest
$wp_customize->add_setting( 'eivlen_pinterest_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_pinterest_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Pinterest','eivlen'),
  'description' => __( 'Enter Url of your Pinterest Account','eivlen' ),
) );
//social media youtube
$wp_customize->add_setting( 'eivlen_youtube_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_youtube_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Youtube','eivlen' ),
  'description' => __( 'Enter Url of your Youtube Account','eivlen' ),
) );
//social media linkedin
$wp_customize->add_setting( 'eivlen_linkedin_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_linkedin_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Linkedin','eivlen' ),
  'description' => __( 'Enter Url of your Linkedin Account','eivlen' ),
) );
//social media reddit
$wp_customize->add_setting( 'eivlen_reddit_settings', array(
  'capability' => 'edit_theme_options',
  'default' => '',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'eivlen_reddit_settings', array(
  'type' => 'text',
  'section' => 'eivlen_socials_section', // Add a default or your own section
  'label' => __( 'Reddit','eivlen' ),
  'description' => __( 'Enter Url of your Reddit Account','eivlen' ),
) );
// icon size
  $wp_customize->add_setting( 'eivlen_icon_size', array(
  'capability' => 'edit_theme_options',
  'default' => '20px',
  'sanitize_callback' => 'themeslug_customizer_sanitize_radio_icon_size',
  'transfort' => 'refresh',
    ) );
    $wp_customize->add_control( 'eivlen_icon_size', array(
      'type' => 'radio',
      'section' => 'eivlen_socials_section', // Add a default or your own section
      'label' => __( 'Icon Size','eivlen' ),
      'description' => __( 'This will set the size of Social Media Icon','eivlen'),
      'choices' => array(
        '16px' => __( 'Small','eivlen' ),
        '20px' => __( 'Regular','eivlen' ),
        '26px' => __( 'Medium','eivlen' ),
        '32px' => __( 'Large' ,'eivlen'),
      ),
    ) );
     function themeslug_customizer_sanitize_radio_icon_size( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( 'eivlen_icon_size')->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/*footer customizer*/
$wp_customize->add_setting( 'eivlen_footer_background_setting', array(
      'default' => '#2B292D',
      'transfort' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
     $wp_customize->add_section( 'eivlen_footer_option', array(
      'title' => __('Eivlen Footer Option','eivlen'),
      'priority' => '35',
    ) );
    $wp_customize->add_control(new wp_customize_Color_Control($wp_customize,'eivlen_top_menu_background_control',array(
     'label'=> __('Footer Background Color','eivlen'),
     'section'=>'eivlen_footer_option',
     'settings'=>'eivlen_footer_background_setting',
    )));

    $wp_customize->add_setting( 'eivlen_footer_text_color_setting', array(
      'default' => '#787878',
      'transfort' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control(new wp_customize_Color_Control($wp_customize,'eivlen_footer_text_color_control',array(
     'label'=> __('Footer Text Color','eivlen'),
     'section'=>'eivlen_footer_option',
     'settings'=>'eivlen_footer_text_color_setting',
    )));

    $wp_customize->add_setting( 'copyright_text_setting', array(
  'capability' => 'edit_theme_options',
  'default' => 'Theme : Eivlen by Brix Bodino',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 'copyright_text_setting', array(
  'type' => 'text',
  'section' => 'eivlen_footer_option', // Add a default or your own section
  'label' => __( 'Footer Copyright Text','eivlen' ),
) );
}
add_action( 'customize_register', 'eivlen_customize_register' );

/**
* Output Customizer style
*/
function eivlen_customizer_output(){
?>
    <style type="text/css">
        .site-content a,footer a,footer a:visited{
            color:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
        }
        .site-content a:hover,footer a:hover{
           opacity:0.8 !important;
        }
        a.white_text{
          color:#fff !Important;
        }
        
       
        
        button, input[type="submit"]{ 
            background-color:<?php echo get_theme_mod('eivlen_button_color') ?> !Important;
            color:<?php echo get_theme_mod('eivlen_button_text_color') ?> !Important;
        }
        a.button{ 
            border-color:<?php echo get_theme_mod('eivlen_button_color') ?> !Important;
            background-color:<?php echo get_theme_mod('eivlen_button_color') ?> !Important;
        }
        .hero-body a.button{
          color:<?php echo get_theme_mod('eivlen_button_text_color') ?> !Important;
        }
         button:hover, input[type="submit"]:hover{ 
            background-color:<?php echo get_theme_mod('eivlen_button_color') ?> !Important;
            color:<?php echo get_theme_mod('eivlen_button_text_color') ?> !Important;
            opacity:0.8 !important;
        }
        
        input[type="submit"]{
            background-color:<?php echo get_theme_mod('eivlen_button_color') ?> !Important;
            border-color:<?php echo get_theme_mod('eivlen_button_color') ?> !Important;
        }
         span.tags-links a{
          color:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
          border-color:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
          background:transparent !important;
        }
        
         .control a.button.is-outlined.read-more,span.tags-links a{
          color:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
          border-color:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
          background:transparent !Important;
        }
        .control a.button.is-outlined.read-more:hover,span.tags-links a:hover{
          background:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
          color:#fff !important;
        }
        section.hero.is-dark.homepage_hero{
            display: <?php echo get_theme_mod('eivlen_hero_display') ?> !Important;
        }
        nav.navbar.top-menu-bar {
          background-color:<?php echo get_theme_mod('eivlen_top_menu_background_setting') ?>!important;
        }
        .navbar-start i {
            font-size:<?php echo get_theme_mod("eivlen_icon_size")?>;
            
        }
        .posted_on_div{
           background:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
          color:#fff !important;
        }
        div#navMenu a{
          color:#2B292D !Important;
        }
        div#navMenu a.is-active {
          color:<?php echo get_theme_mod('eivlen_link_color') ?> !Important;
        }
        h3.entry-title a {
          color:#2B292D !Important;
          margin-top:0px !Important;
          margin-bottom:0px !Important;
        }
        .site-footer{
          background:<?php echo get_theme_mod('eivlen_footer_background_setting') ?> !Important;
          color:<?php echo get_theme_mod('eivlen_footer_text_color_setting') ?> !important;
        }
        
    </style>
<?php
}
add_action('wp_head','eivlen_customizer_output');
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function eivlen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function eivlen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eivlen_customize_preview_js() {
	wp_enqueue_script( 'eivlen-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'eivlen_customize_preview_js' );
