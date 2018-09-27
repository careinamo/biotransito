<?php
vc_remove_param('cms_grid', 'layout');
vc_remove_param('cms_grid', 'filter');
$params = array(
    array(
        'type' => 'checkbox',
        'heading' => esc_html__("Show Read more", 'cargo-pifour'),
        'param_name' => 'show_read_more',
        'value' => array(
            'Yes' => true
        ),
        'std' => true,
        'template' => array('cms_grid--blog.php'),
    ),
     array(
        'type' => 'checkbox',
        'heading' => esc_html__("Top Overlap", 'cargo-pifour'),
        'param_name' => 'top-overlap',
        'value' => array(
            'Yes' => true
        ),
        'std' => true,
        'template' => array('cms_grid--gallery.php'),
    ),
    array(
    	"type" => "dropdown",
    	"heading" => esc_html__("Icon type",'cargo-pifour'),
        "admin_label" => true,
    	"param_name" => "icon_type",
    	"value" => array(
            esc_html__('Image icon','cargo-pifour') => '',
            esc_html__('Font icon','cargo-pifour') => 'font_icon',
        ),
        "std" => '',
        "group" => esc_html__("Template",'cargo-pifour'),
        'template' => array('cms_grid--service_style1.php','cms_grid--service_style2.php'),
    ), 
    array(
        'type' => 'checkbox',
        'heading' => esc_html__("Show Read More", 'cargo-pifour'),
        'param_name' => 'show_read_more',
        'value' => array(
            'Yes' => true
        ),
        'template' => array('cms_grid--gallery_style.php'),
        'std' => true,
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__("Show pagination", 'cargo-pifour'),
        'param_name' => 'show_patination',
        'value' => array(
            'Yes' => true
        ),
        'std' => false,
    ),
);

?>