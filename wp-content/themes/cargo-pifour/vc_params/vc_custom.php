<?php

     
    add_action( 'vc_after_init', 'cargo_pifour_add_vc_tta_tabs_new_shape' ); 
    function cargo_pifour_add_vc_tta_tabs_new_shape() {
      $param = WPBMap::getParam( 'vc_tta_tabs', 'shape' );
      $param['value'][esc_html__( 'Theme Style', 'cargo-pifour' )] = 'theme';
      $param['std'] = 'theme';
      vc_update_shortcode_param( 'vc_tta_tabs', $param );
    }
     
    add_action( 'vc_after_init', 'cargo_pifour_add_vc_tta_tabs_new_color' ); 
    function cargo_pifour_add_vc_tta_tabs_new_color() {
      $param = WPBMap::getParam( 'vc_tta_tabs', 'color' );
      $param['value'][esc_html__( 'Theme Color', 'cargo-pifour' )] = 'theme';
      $param['std'] = 'theme';
      vc_update_shortcode_param( 'vc_tta_tabs', $param );
    }

/* VC Panels */
  add_action( 'vc_after_init', 'cargo_pifour_add_vc_tta_panels_new_style' );
  function cargo_pifour_add_vc_tta_panels_new_style() {
      $param = WPBMap::getParam( 'vc_tta_accordion', 'style' );
      $param['value'][esc_html__( 'Small header', 'cargo-pifour' )] = 'accordion-small';
      $param['std'] = 'accordion-small';
      vc_update_shortcode_param( 'vc_tta_accordion', $param );
    }