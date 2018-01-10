<?php
/**
 * AyaPortfolio functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

if ( ! function_exists( 'ayaportfolio_setup' ) ) :
	/**
	 * AyaPortfolio setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function ayaportfolio_setup() {

		/*
		 * Make theme available for translation.
		 *
		 * Translations can be filed in the /languages/ directory
		 *
		 * If you're building a theme based on AyaPortfolio, use a find and replace
		 * to change 'ayaportfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ayaportfolio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'ayaportfolio-thumbnail-avatar', 100, 100, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 ayaportfolio_fonts_url()
						  ) );

		/*
		 * Set Custom Background
		 */				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ayaportfolio' ),
			'footer'    => __( 'Footer Menu', 'ayaportfolio' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );
	}
endif; // ayaportfolio_setup
add_action( 'after_setup_theme', 'ayaportfolio_setup' );

if ( ! function_exists( 'ayaportfolio_fonts_url' ) ) :
	/**
	 *	Load google font url used in the AyaPortfolio theme
	 */
	function ayaportfolio_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Varela Round, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Varela Round font: on or off', 'ayaportfolio' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Varela Round';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayaportfolio_fonts_url

if ( ! function_exists( 'ayaportfolio_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the AyaPortfolio theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function ayaportfolio_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
		wp_enqueue_style( 'ayaportfolio-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'ayaportfolio-fonts', ayaportfolio_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array( 'jquery' ) );

		wp_enqueue_script( 'ayaportfolio-utilities',
			get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

		wp_enqueue_script( 'jquery.resize',
			get_template_directory_uri() . '/js/jquery.resize.js',
			array( 'jquery' ) );
	
		wp_enqueue_script( 'jquery.waitforimages',
			get_template_directory_uri() . '/js/jquery.waitforimages.js',
			array( 'jquery' ) );
	
		wp_enqueue_script( 'modernizr',
			get_template_directory_uri() . '/js/modernizr.js',
			array( 'jquery' ) );

		wp_enqueue_script( 'jquery.carousel-3d',
			get_template_directory_uri() . '/js/jquery.carousel-3d.min.js',
			array( 'jquery' ) );

		$data = array(
    		'loading_effect' => ( get_theme_mod('ayaportfolio_animations_display', 1) == 1 ),
    	);
    	wp_localize_script('ayaportfolio-utilities', 'ayaportfolio_options', $data);
	}
endif; // ayaportfolio_load_scripts
add_action( 'wp_enqueue_scripts', 'ayaportfolio_load_scripts' );

if ( ! function_exists( 'ayaportfolio_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ayaportfolio_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayaportfolio'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ayaportfolio'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'ayaportfolio' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'ayaportfolio' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'ayaportfolio' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'ayaportfolio' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'ayaportfolio' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'ayaportfolio' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // ayaportfolio_widgets_init
add_action( 'widgets_init', 'ayaportfolio_widgets_init' );

if ( ! function_exists( 'ayaportfolio_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function ayaportfolio_show_copyright_text() {

		$footerText = get_theme_mod('ayaportfolio_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // ayaportfolio_show_copyright_text

if ( ! function_exists( 'ayaportfolio_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ayaportfolio_header_style()
   */
  function ayaportfolio_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ayaportfolio_header_style',
                      ) );
  }
endif; // ayaportfolio_custom_header_setup
add_action( 'after_setup_theme', 'ayaportfolio_custom_header_setup' );

if ( ! function_exists( 'ayaportfolio_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ayaportfolio_custom_header_setup().
   */
  function ayaportfolio_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ayaportfolio-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo esc_attr( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of ayaportfolio_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class ayaportfolio_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ayaportfolio';

		// Custom button text to output.
		public $pro_text = '';

		// Custom pro button URL.
		public $pro_url = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		// Outputs the template
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}

/**
 * Singleton class for handling the theme's customizer integration.
 */
final class ayaportfolio_Customize {

	// Returns the instance.
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	// Constructor method.
	private function __construct() {}

	// Sets up initial actions.
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	// Sets up the customizer sections.
	public function sections( $manager ) {

		// Load custom sections.

		// Register custom section types.
		$manager->register_section_type( 'ayaportfolio_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ayaportfolio_Customize_Section_Pro(
				$manager,
				'ayaportfolio',
				array(
					'title'    => esc_html__( 'AyaPortfolioPro', 'ayaportfolio' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ayaportfolio' ),
					'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayaportfoliopro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ayaportfolio-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ayaportfolio-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ayaportfolio_Customize::get_instance();

if ( ! function_exists( 'ayaportfolio_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function ayaportfolio_customize_register( $wp_customize ) {

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayaportfolio_footer_section',
			array(
				'title'       => __( 'Footer', 'ayaportfolio' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'ayaportfolio_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaportfolio_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ayaportfolio' ),
	            'section'        => 'ayaportfolio_footer_section',
	            'settings'       => 'ayaportfolio_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section(
			'ayaportfolio_slider_section',
			array(
				'title'       => __( 'Slider', 'ayaportfolio' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add slide 1 background image
		$wp_customize->add_setting( 'ayaportfolio_slide1_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '1.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaportfolio_slide1_image',
				array(
					'label'   	 => __( 'Slide 1 Image', 'ayaportfolio' ),
					'section' 	 => 'ayaportfolio_slider_section',
					'settings'   => 'ayaportfolio_slide1_image',
				) 
			)
		);
		
		// Add slide 2 background image
		$wp_customize->add_setting( 'ayaportfolio_slide2_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '2.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaportfolio_slide2_image',
				array(
					'label'   	 => __( 'Slide 2 Image', 'ayaportfolio' ),
					'section' 	 => 'ayaportfolio_slider_section',
					'settings'   => 'ayaportfolio_slide2_image',
				) 
			)
		);
		
		// Add slide 3 background image
		$wp_customize->add_setting( 'ayaportfolio_slide3_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '3.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaportfolio_slide3_image',
				array(
					'label'   	 => __( 'Slide 3 Image', 'ayaportfolio' ),
					'section' 	 => 'ayaportfolio_slider_section',
					'settings'   => 'ayaportfolio_slide3_image',
				) 
			)
		);
		
		// Add slide 4 background image
		$wp_customize->add_setting( 'ayaportfolio_slide4_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '4.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaportfolio_slide4_image',
				array(
					'label'   	 => __( 'Slide 4 Image', 'ayaportfolio' ),
					'section' 	 => 'ayaportfolio_slider_section',
					'settings'   => 'ayaportfolio_slide4_image',
				) 
			)
		);
		
		// Add slide 5 background image
		$wp_customize->add_setting( 'ayaportfolio_slide5_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '5.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayaportfolio_slide5_image',
				array(
					'label'   	 => __( 'Slide 5 Image', 'ayaportfolio' ),
					'section' 	 => 'ayaportfolio_slider_section',
					'settings'   => 'ayaportfolio_slide5_image',
				) 
			)
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'ayaportfolio_animations_display',
			array(
				'title'       => __( 'Animations', 'ayaportfolio' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'ayaportfolio_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'esc_attr',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'ayaportfolio_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'ayaportfolio' ),
									'section'        => 'ayaportfolio_animations_display',
									'settings'       => 'ayaportfolio_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // ayaportfolio_customize_register
add_action( 'customize_register', 'ayaportfolio_customize_register' );

function ayaportfolio_shoild_display_slider() {

	$result = false;
	for ( $i = 1; $i <= 5; ++$i ) {

		$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';
		$slideImage = get_theme_mod( 'ayaportfolio_slide'.$i.'_image', $defaultSlideImage );
			
		if ($slideImage != '') {

			$result = true;
			break;
		}
	}

	return $result;
}

/**
 * Displays the slider
 */
function ayaportfolio_display_slider() {

	if ( !ayaportfolio_shoild_display_slider() ) {
		return;
	}

	?>

	 <div data-carousel-3d="true">
		<?php
			// display slides
			for ( $i = 1; $i <= 5; ++$i ) {
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';
					$slideImage = get_theme_mod( 'ayaportfolio_slide'.$i.'_image', $defaultSlideImage );
				?>		
					<?php if ($slideImage != '') : ?>
							<div class="slide" style="background-image: url('<?php echo esc_url( $slideImage ); ?>');">
							</div>
					<?php endif; ?>
<?php		} ?>
	</div><!-- [data-carousel-3d] -->
<?php 
}