<?php
vc_map(array(
    "name" => 'Cms Social',
    "base" => "cms_social",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    "description" =>  '',
    "params" => array(
         
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Options', 'cargo-pifour' ),
            'param_name' => 'options',
            'description' => esc_html__( 'Enter values for plan option', 'cargo-pifour' ),
            'value' => urlencode( json_encode( array(
                array(
                    'values' => esc_html__( 'Option', 'cargo-pifour' ),
                ),
            ) ) ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Social Link",'cargo-pifour'),
                    "param_name" => "social_link",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Icon class (fa fa-facebook,... for Awesome Font)",'cargo-pifour'),
                    "param_name" => "icon_class",
                    "admin_label" => true,
                ),
            ),
            
        ),
         
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Class",'cargo-pifour'),
            "param_name" => "class",
            "value" => "",
            "description" =>"",
        ),
    )
));
class WPBakeryShortCode_cms_social extends CmsShortCode
{
    protected function content($atts, $content = null){
        $atts_extra = shortcode_atts(array(
            'class' => '',
        ), $atts);
        $atts = array_merge($atts_extra, $atts);
         
        $class = $atts['class'];
          
        return parent::content($atts, $content);
    }
    
}
?>