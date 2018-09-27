<?php
vc_remove_param('cms_fancybox_single', 'title');
vc_remove_param('cms_fancybox_single', 'description');
vc_remove_param('cms_fancybox_single', 'content_align');
vc_remove_param('cms_fancybox_single', 'button_text');
vc_remove_param('cms_fancybox_single', 'button_link');
vc_remove_param('cms_fancybox_single', 'button_type');
vc_remove_param('cms_fancybox_single', 'cms_template');

vc_add_param("cms_fancybox_single", array(
    'type' => 'img',
    'heading' => esc_html__( 'Fancy Style', 'cargo-pifour' ),
    'value' => array(
        'style-1' => get_template_directory_uri().'/vc_params/layouts/fancy-style1.png', 
        'style-2' => get_template_directory_uri().'/vc_params/layouts/fancy-style2.png',
        'style-3' => get_template_directory_uri().'/vc_params/layouts/fancy-style3.png',
        'style-4' => get_template_directory_uri().'/vc_params/layouts/fancy-style4.png',
    ),
    'param_name' => 'fancy_style',
    "admin_label" => true,
    'description' => esc_html__( 'Select fancybox style', 'cargo-pifour' ),
    "group" => esc_html__("Layout", 'cargo-pifour'),
    'weight' => 1
));
vc_add_param("cms_fancybox_single", array(
    'type' => 'dropdown',
    'heading' => esc_html__( 'Animation', 'cargo-pifour' ),
    'param_name' => 'animation_effect',
    'std' => '',
    'description' => esc_html__( 'Animations  for grid', 'cargo-pifour' ),
    'value' =>  array(
        esc_html__( 'None', 'cargo-pifour' ) => '',
        esc_html__( 'fadeIn', 'cargo-pifour' ) => 'wow fadeIn',
        esc_html__( 'FadeInUp', 'cargo-pifour' ) => 'wow fadeInUp',
        esc_html__( 'BounceInUp', 'cargo-pifour' ) => 'wow bounceInUp',
        esc_html__( 'BounceInDown', 'cargo-pifour' ) => 'wow bounceInDown',
        esc_html__( 'BounceInLeft', 'cargo-pifour' ) => 'wow bounceInLeft',
        esc_html__( 'BounceInRight', 'cargo-pifour' ) => 'wow bounceInRight',  
     ),
     "group" => esc_html__("Animation", 'cargo-pifour'),
     'weight' => 1
));
vc_add_param("cms_fancybox_single", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Data duration", 'cargo-pifour'),
    "param_name" => "data_wow_duration",
    "value" =>  array(
        'None'  => '',
        '1s'    => '1s',
        '2s'    => '2s',
        '3s'    => '3s',
        '4s'    => '4s',
        '5s'    => '5s',
        '6s'    => '6s',
    ),
    "group" => esc_html__("Animation", 'cargo-pifour'),
    'weight' => 1
));
vc_add_param("cms_fancybox_single", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Data delay", 'cargo-pifour'),
    "param_name" => "data_wow_delay",
    "value" =>  array(
        'None'  => '',
        '0.2s'    => '0.2s',
        '0.4s'    => '0.4s',
        '0.6s'    => '0.6s',
        '0.8s'    => '0.8s',
    ),
    "group" => esc_html__("Animation", 'cargo-pifour'),
    'weight' => 1
));
vc_add_param("cms_fancybox_single", array(
    "type" => "textfield",
    "heading" => esc_html__("Extra Class",'cargo-pifour'),
    "param_name" => "class",
    "value" => "",
    "description" => "",
    "group" => esc_html__("Layout", 'cargo-pifour'),
    'weight' => 1
));
 
vc_add_param("cms_fancybox_single", array(
    'type' => 'dropdown',
	'heading' => esc_html__( 'Icon library', 'cargo-pifour' ),
	'value' => array(
		esc_html__( 'Font Awesome', 'cargo-pifour' ) => 'fontawesome',
		esc_html__( 'Open Iconic', 'cargo-pifour' ) => 'openiconic',
		esc_html__( 'Typicons', 'cargo-pifour' ) => 'typicons',
		esc_html__( 'Entypo', 'cargo-pifour' ) => 'entypo',
		esc_html__( 'Linecons', 'cargo-pifour' ) => 'linecons',
		esc_html__( 'P7 Stroke', 'cargo-pifour' ) => 'pe7stroke',
		esc_html__( 'RT Icon', 'cargo-pifour' ) => 'rticon',
	),
	'param_name' => 'icon_type',
	'description' => esc_html__( 'Select icon library.', 'cargo-pifour' ),
    'dependency' => array(
        'element' => 'fancy_style',
        'value' => array(
            'style-2',
            'style-3',
        ),
    ),
	"group" => esc_html__("Fancy Icon Settings", 'cargo-pifour')
));

vc_add_param("cms_fancybox_single", array(
    'type'       => 'iconpicker',
    'heading'    => esc_html__( 'Icon Item', 'cargo-pifour' ),
    'param_name' => 'icon_flaticon',
    'value'      => '',
    'settings'   => array(
        'emptyIcon'    => true, 
        'type'         => 'flaticon',
        'iconsPerPage' => 200,  
	),
	'dependency' => array(
        'element' => 'icon_type',
        'value'   => 'flaticon',
	),
	'description' => esc_html__( 'Select icon from library.', 'cargo-pifour' ),
    "group" => esc_html__("Fancy Icon Settings", 'cargo-pifour')
)); 
vc_add_param("cms_fancybox_single", array(
    "type" => "attach_image",
    "heading" => esc_html__("Image Item",'cargo-pifour'),
    "param_name" => "image",
    'dependency' => array(
        'element' => 'fancy_style',
        'value' => array(
            'style-1',
        ),
    ),
    "group" => esc_html__("Option", 'cargo-pifour')
));


vc_add_param("cms_fancybox_single", array(
	"type" => "textfield",
    "heading" => esc_html__("Title Item",'cargo-pifour'),
    "param_name" => "title_item",
    "value" => "",
    "admin_label" => true,
    "description" => esc_html__("Title Of Item",'cargo-pifour'),
    "group" => esc_html__("Option", 'cargo-pifour')
));

vc_add_param("cms_fancybox_single", array(
	"type" => "textarea",
    "heading" => esc_html__("Content Item",'cargo-pifour'),
    "param_name" => "description_item",
    "group" => esc_html__("Option", 'cargo-pifour')
));

vc_add_param("cms_fancybox_single", array(
	'type' => 'vc_link',
    'heading' => esc_html__( 'URL (Link)', 'cargo-pifour' ),
    'param_name' => 'link',
    'description' => esc_html__( 'Add link to button.', 'cargo-pifour' ),
    'dependency' => array(
        'element' => 'fancy_style',
        'value' => array(
            'style-1',
        ),
    ),
    'group' => esc_html__("Option", 'cargo-pifour'),
));

vc_add_param('cms_fancybox_single', array(
    'type' => 'checkbox',
    'heading' => esc_html__("Box Shadow", 'cargo-pifour'),
    'param_name' => 'box_shadow',
    'value' => '',
    'dependency' => array(
        'element' => 'fancy_style',
        'value' => array(
            'style-1',
        ),
    ),
    'group' => esc_html__("Option", 'cargo-pifour'),
)); 
vc_add_param("cms_fancybox_single", array(
	'type' => 'css_editor',
    'heading' => esc_html__( 'CSS box', 'cargo-pifour' ),
    'param_name' => 'css',
    'group' => esc_html__( 'Design Options', 'cargo-pifour' ),
));
 