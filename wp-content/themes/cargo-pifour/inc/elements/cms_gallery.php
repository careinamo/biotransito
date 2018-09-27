<?php
vc_map(array(
    'name' => 'CMS Gallery',
    'base' => 'cms_gallery',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    'description' => esc_html__('Add gallery image', 'cargo-pifour'),
    'params' => array(
        array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'cargo-pifour' ),
            'param_name' => 'images',
            'value' => '',
            'description' => esc_html__( 'Select images from media library.', 'cargo-pifour' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Class",'cargo-pifour'),
            "param_name" => "class",
            "value" => "",
        ),   
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Columns XS Devices",'cargo-pifour'),
            "param_name" => "col_xs",
            "edit_field_class" => "vc_col-sm-3 vc_column",
            "value" => array(1,2,3,4,6,12),
            "std" => 1,
            "group" => esc_html__("Responsive Options", 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Columns SM Devices",'cargo-pifour'),
            "param_name" => "col_sm",
            "edit_field_class" => "vc_col-sm-3 vc_column",
            "value" => array(1,2,3,4,6,12),
            "std" => 2,
            "group" => esc_html__("Responsive Options", 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Columns MD Devices",'cargo-pifour'),
            "param_name" => "col_md",
            "edit_field_class" => "vc_col-sm-3 vc_column",
            "value" => array(1,2,3,4,6,12),
            "std" => 3,
            "group" => esc_html__("Responsive Options", 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Columns LG Devices",'cargo-pifour'),
            "param_name" => "col_lg",
            "edit_field_class" => "vc_col-sm-3 vc_column",
            "value" => array(1,2,3,4,6,12),
            "std" => 4,
            "group" => esc_html__("Responsive Options", 'cargo-pifour')
        ),
        
        array(
            "type" => "cms_template",
            "param_name" => "cms_template",
            "shortcode" => "cms_gallery",
            "admin_label" => true,
            "heading" => esc_html__("Shortcode Template",'cargo-pifour'),
            "group" => esc_html__("Template", 'cargo-pifour'),
        ),
        
         
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'cargo-pifour' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design Options', 'cargo-pifour' ),
        ),
    )
));

global $cms_carousel;
$cms_carousel = array();
class WPBakeryShortCode_cms_gallery extends CmsShortCode
{
    protected function content($atts, $content = null){
        $atts_extra = shortcode_atts(array(
            'images' => '',
            'list_title' => '',
            'class' => '',
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'cms_template' => 'cms_gallery.php',
            'show_upload_date' => '1',
        ), $atts);
        
		$atts = array_merge($atts_extra, $atts);
          
        $html_id = cmsHtmlID('cms-gallery');
         
        $col_lg = 12 / $atts['col_lg'];
        $col_md = 12 / $atts['col_md'];
        $col_sm = 12 / $atts['col_sm'];
        $col_xs = 12 / $atts['col_xs'];
        $atts['item_class'] = "cms-gallery-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "cms-gallery";
          
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $atts['class'];
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}
?>