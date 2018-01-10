<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function blain_custom_css_mods() {

	$custom_css = "";
	//Header image
    if  ( get_theme_mod('blain_header_image_style','default') == 'cover' && ( is_home() || (is_page() && has_post_thumbnail()))) :
        $custom_css .= "@media screen and (max-width: 767px) {
			#masthead #mobile-header-image { display: block; }
			#masthead {
			min-height: auto;
			padding-bottom: 90px;
			background-image: url('".get_theme_mod('blain_header_image_style')."') !important;
			
			}
		}";
    endif;
	//If Highlighting Nav active item is disabled
	if ( get_theme_mod('blain_disable_active_nav') ) :
		$custom_css .= "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;
	
	//If Logo is Centered
	if ( get_theme_mod('blain_center_logo') ) :
		
		$custom_css .= "#masthead #text-title-desc, #masthead #site-logo { float: none; } .site-branding { text-align: center; } #text-title-desc { display: inline-block; }";
		
	endif;
	
	//Exception: When Logo is Centered, and Title Not Set to display in next line.
	if ( get_theme_mod('blain_center_logo') && !get_theme_mod('blain_branding_below_logo') ) :
		$custom_css .= ".site-branding #text-title-desc { text-align: left; }";
	endif;
	
	//Exception: When Logo is centered, but there is no logo.
	if ( get_theme_mod('blain_center_logo') && !get_theme_mod('blain_logo') ) :
		$custom_css .= ".site-branding #text-title-desc { text-align: center; }";
	endif;
	
	//Exception: IMage transform origin should be left on Left Alignment, i.e. Default
	if ( !get_theme_mod('blain_center_logo') ) :
		$custom_css .= "#masthead #site-logo img { transform-origin: left; }";
	endif;	

	
	if ( get_background_color() ) {
		$custom_css .= "#social-search .searchform:before { border-left-color: #".get_background_color()." }";
		$custom_css .= "#social-search .searchform, #social-search .searchform:after { background: #".get_background_color()." }";
	}
	
	if ( get_theme_mod('blain_title_font','Ovo') ) :
		$custom_css .= ".title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('blain_title_font'))."; }";
	endif;
	
	if ( get_theme_mod('blain_body_font','Quattrocento Pro') ) :
		$custom_css .= "body { font-family: ".esc_html(get_theme_mod('blain_body_font'))."; }";
	endif;
	
	if ( get_header_textcolor() ) :
		$custom_css .= "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
	endif;
	
	
	if ( get_theme_mod('blain_header_desccolor') ) :
		$custom_css .= "#masthead h2.site-description { color: ".esc_html(get_theme_mod('blain_header_desccolor','#777'))."; }";
	endif;
	
	
	if ( !display_header_text() ) :
		$custom_css .= "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	if ( blain_load_sidebar() ) :
		$custom_css .= ". { padding: 20px 20px; }";
	endif;
	
	if ( get_theme_mod('blain_logo_resize') ) :
		$val = esc_html(get_theme_mod('blain_logo_resize'))/100;
		$custom_css .= "#masthead #site-logo img { transform: scale(".$val."); -webkit-transform: scale(".$val."); -moz-transform: scale(".$val."); -ms-transform: scale(".$val."); }";
		endif;



    //for showcase
    if(get_theme_mod('nevler_c_img_1', true)):
        $custom_css .= ".showcase-item1_img{ 
                background-image: url('".get_theme_mod('blain_fshowcase1_image')."') !important;
              height: 244px; }";
    endif;
    if(get_theme_mod('nevler_c_img_2', true)):
        $custom_css .= ".showcase-item2_img{ 
                background-image: url('".get_theme_mod('blain_fshowcase2_image')."') !important;
              height: 244px }";
    endif;
    if(get_theme_mod('nevler_c_img_3', true)):
        $custom_css .= ".showcase-item3_img{ 
                background-image: url('".get_theme_mod('blain_fshowcase3_image')."') !important;
              height: 244px; }";
    endif;
    if(get_theme_mod('nevler_c_img_4', true)):
        $custom_css .= ".showcase-item4_img{ 
                background-image: url('".get_theme_mod('blain_fshowcase4_image')."') !important;
              height: 488px;
               }
               @media screen and (min-width: 767px) and (max-width: 991px) {
               .showcase-item4_img{
                    height: 244px !important;
                    }
              }";
    endif;

    //footer background images
    if(get_theme_mod('blain_footer_bg_image')):
        $custom_css .= "#footer-sidebar {background: url(".get_theme_mod('blain_footer_bg_image')."); 
        background-size:cover;
        background-position: center;}";
    endif;

    if(!get_theme_mod('blain_footer_bg_image')):
        $custom_css .= "#footer-sidebar {background: rgba(8, 8, 8, 0.8);}";
    endif;

    //social icons
    if(!get_theme_mod('blain_social_enable')):
        $custom_css .= "#showcase-z::before{width: 100%;
                            border-left: solid 674px #dddddd;
                            border-top: solid 90px transparent;
                            content: \"\";
                            top: -90px;
                            background: transparent;
                            position: absolute;
                            left: 0px;
                            transform: rotate(0deg);
                            -webkit-transform: rotate(0deg);
                            -moz-transform: rotate(0deg);
                            -ms-transform: rotate(0deg);
                            -o-transform: rotate(0deg);
                            -webkit-transform-origin: left bottom;
                            -ms-transform-origin: left bottom;
                            transform-origin: left bottom;
                            border-right: solid 675px #dddddd;
                            z-index: 7;}";

    endif;

    if(!get_theme_mod('blain_showcase_enable_set')):
        $custom_css .=".social-wrapper::after{
                            width: 100%;
                            border-left: solid 674px #dddddd;
                            border-bottom: solid 90px transparent;
                            content: \"\";
                            top: 115px;
                            background: transparent;
                            position: absolute;
                            left: 0px;
                            transform: rotate(0deg);
                            -webkit-transform: rotate(0deg);
                            -moz-transform: rotate(0deg);
                            -ms-transform: rotate(0deg);
                            -o-transform: rotate(0deg);
                            -webkit-transform-origin: left bottom;
                            -ms-transform-origin: left bottom;
                            transform-origin: left bottom;
                            border-right: solid 675px #dddddd;
                            z-index: 7;}
                            #featured-point .popular-articles{margin-top: 80px;};";
        endif;

    if((!is_home() && !is_front_page()) && get_theme_mod('blain_social_enable')):
        $custom_css .=".social-wrapper::after{
                            width: 100%;
                            border-left: solid 674px #dddddd;
                            border-bottom: solid 90px transparent;
                            content: \"\";
                            top: 115px;
                            background: transparent;
                            position: absolute;
                            left: 0px;
                            transform: rotate(0deg);
                            -webkit-transform: rotate(0deg);
                            -moz-transform: rotate(0deg);
                            -ms-transform: rotate(0deg);
                            -o-transform: rotate(0deg);
                            -webkit-transform-origin: left bottom;
                            -ms-transform-origin: left bottom;
                            transform-origin: left bottom;
                            border-right: solid 675px #dddddd;
                            z-index: 7;}
                            .mega-container{
                            margin-top: 300px;}
                            @media screen and (max-width: 991px) {
                            .mega-container{
                            margin-top:20px;}}";
    endif;

    if(!get_theme_mod('blain_featured_angle_enable')):
        $custom_css .="#featured-point{margin-bottom: 100px;}";
    endif;

    if(!get_theme_mod('blain_featured_angle_enable')&& get_theme_mod('blain_static_page_enable')):
        $custom_css .="#static_page .static_page-container{margin-top: 0px !important;}";
    endif;

    if((get_theme_mod('blain_featured_angle_enable')|| get_theme_mod('blain_featured_point_enable'))||get_theme_mod('blain_static_page_enable')):
        $custom_css .=".mega-container{margin-top: 100px;}";
    endif;

    if((get_theme_mod('blain_featured_angle_enable')&& get_theme_mod('blain_showcase_enable_set'))&& !get_theme_mod('blain_featured_point_enable')):
        $custom_css .="#showcase-z {margin-bottom: 207px !important;}
                        #featured-angle .popular-articles::before{
                            border-left: solid 674px #ffffff !important;
                            border-right: solid 675px #ffffff !important;
                        }";
    endif;

    if((!get_theme_mod('blain_featured_angle_enable')&& !get_theme_mod('blain_static_page_enable'))&&
        (get_theme_mod('blain_featured_point_enable')&& get_theme_mod('blain_showcase_enable_set'))):
        $custom_css .="#featured-point {margin-bottom: 0px !important;}";
    endif;

    if((get_theme_mod('blain_showcase_enable_set')&& !get_theme_mod('blain_static_page_enable'))&&
        (!get_theme_mod('blain_featured_point_enable')&& !get_theme_mod('blain_featured_angle_enable'))):
        $custom_css .=".mega-container {margin-top: 0px !important;}
                        #featured-point {margin-bottom: 0px; !important;}";
    endif;

    if((!is_home() && !is_front_page()) && get_theme_mod('blain_social_enable') ):
        $custom_css .=".mega-container {margin-top: 300px !important;}";
    endif;

    if(get_theme_mod('blain_featured_angle_enable')&& get_theme_mod('blain_featured_point_enable')):
        $custom_css .="@media screen and (min-width: 1363px) {
        #featured-point {margin-bottom: 200px !important;}}";
    endif;


    if((get_theme_mod('blain_featured_angle_enable')&& get_theme_mod('blain_social_enable'))
        && (!get_theme_mod('blain_featured_point_enable')&& !get_theme_mod('blain_showcase_enable_set'))):
        $custom_css .="@media screen and (min-width: 1363px){#featured-angle .popular-articles::before{display:none;}
                        #featured-angle{ margin-top:10px;}
                        .social-wrapper::after{ display:none;}}";
    endif;

    if((!get_theme_mod('blain_featured_angle_enable')&& get_theme_mod('blain_social_enable'))
        && (!get_theme_mod('blain_featured_point_enable')&& !get_theme_mod('blain_showcase_enable_set'))):
        $custom_css .=".social-wrapper::after{ display:none;}";
    endif;

    if((!get_theme_mod('blain_featured_angle_enable')&& get_theme_mod('blain_social_enable'))
        && (!get_theme_mod('blain_featured_point_enable')&& !get_theme_mod('blain_showcase_enable_set'))):

        $custom_css .="@media screen and (min-width: 1363px) {.mega-container{ margin-top: 200px !important}
                        #static_page{ margin-top: 200px !important}";

    endif;
    if((get_theme_mod('blain_static_page_enable')&& get_theme_mod('blain_social_enable'))
        && (!get_theme_mod('blain_featured_point_enable')&& !get_theme_mod('blain_showcase_enable_set'))
        && (!get_theme_mod('blain_featured_angle_enable'))):
        $custom_css .=".mega-container{ margin-top: 0px !important}";
    endif;

    if(is_home() && is_front_page()):
        $custom_css .=".mega-container{ margin-top: 150px !important}";
    endif;


    if((get_theme_mod('blain_static_page_enable')&& get_theme_mod('blain_social_enable'))
        && (get_theme_mod('blain_featured_point_enable')&& !get_theme_mod('blain_showcase_enable_set'))
        && (!get_theme_mod('blain_featured_angle_enable'))):
        $custom_css .="#static_page{ margin-top: 100px !important}";
    endif;
    // hero image for single page
    if(!is_home() && !is_front_page() ):
        $custom_css .="#hero {min-height: 300px !important;}
                        .social-wrapper::after{ display:none;}
                        .mega-container{ margin-top:200px !important;}
                        .social-wrapper {padding: 20px !important;}
                        .social-wrapper .social-inner a{ font-size:18px !important;}
                        #searchicon{ top: 10px !important;}";
    endif;



//sidebar layout
    //disable on home
    if(is_home() && get_theme_mod('blain_disable_sidebar_home','false')):
        $custom_css .= ".home #secondary{ display:none}
                        .home #primary{ width:100%}";
        endif;

    //disable on front page
    if(is_front_page() && get_theme_mod('blain_disable_sidebar_front','false')):
        $custom_css .= "body.page-template-default #secondary{ display:none}
                        body.page-template-default #primary-mono{ width:100%}";
    endif;
    //disable anywhere
    if(get_theme_mod('blain_disable_sidebar','false')):
        $custom_css .= "#secondary{ display:none}
                        #primary{ width:100%}
                        #primary-mono{ width:100%}";

    endif;
    wp_add_inline_style( '-main-theme-style', wp_strip_all_tags($custom_css) );
	
}

add_action('wp_enqueue_scripts', 'blain_custom_css_mods');