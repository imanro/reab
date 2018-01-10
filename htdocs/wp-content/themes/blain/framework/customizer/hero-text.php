<?php
function blain_customize_register_header_heading( $wp_customize ) {
	
	$wp_customize->add_section('blain_hero_text', array(
		'title' => __('Header Title & Button','blain'),
		'panel' => 'blain_header_panel'	
	));
	
	$wp_customize->add_setting( 'blain_heading' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'blain_heading', array(
		'label' => __('Heading','blain'),
		'section' => 'blain_hero_text',
		'settings' => 'blain_heading',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'blain_btn' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'blain_btn', array(
		'label' => __('Button','blain'),
		'section' => 'blain_hero_text',
		'settings' => 'blain_btn',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'blain_h_url' , array(
	    'sanitize_callback' => 'esc_url_raw'
	) );
	
	$wp_customize->add_control(
	'blain_h_url', array(
		'label' => __('Button URL','blain'),
		'section' => 'blain_hero_text',
		'settings' => 'blain_h_url',
		'type' => 'url',
	) );
	
}
add_action( 'customize_register', 'blain_customize_register_header_heading' );