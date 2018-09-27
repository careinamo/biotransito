<?php
/**
 * Add row params
 * 
 * @author Knight
 * @since 1.0.0
 */

vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => esc_html__("Overlay opacity", 'cargo-pifour'),
    'param_name' => 'overlay_opacity',
    'value' => '',
    'group' => esc_html__("Design Options",'cargo-pifour'),
));
vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => esc_html__("Background image fixed", 'cargo-pifour'),
    'param_name' => 'bg_fixed',
    'value' => '',
    'group' => esc_html__("Design Options",'cargo-pifour'),
));

vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => esc_html__("Visible overflow", 'cargo-pifour'),
    'param_name' => 'visible_overflow',
    'value' => '',
    'group' => esc_html__("Other setting",'cargo-pifour'),
));
 