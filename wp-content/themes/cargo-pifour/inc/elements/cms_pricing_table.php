<?php
vc_map(array(
    "name" => 'Pricing Table Template',
    "base" => "cms_pricing_table",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    "description" =>  '',
    "params" => array(
         array(
            'type' => 'checkbox',
            'heading' => esc_html__("Is Active?", 'cargo-pifour'),
            'param_name' => 'is_active',
            'value' => array(
                'Yes' => true
            ),
            'std' => false,
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Title",'cargo-pifour'),
            "param_name" => "title",
            'description' => esc_html( 'premium'),
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Sub title",'cargo-pifour'),
            "param_name" => "sub_title",
            'description' => esc_html( 'per month'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Features', 'cargo-pifour' ),
            'param_name' => 'features',
            'description' => esc_html__( 'Enter values for feature', 'cargo-pifour' ),
            'value' => urlencode( json_encode( array(
                array( 
                    'values' => esc_html__( 'Value', 'cargo-pifour' ),
                ),
            ) ) ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Attribute name",'cargo-pifour'),
                    "param_name" => "feature_name",
                    'admin_label' => true,
                ),
            ),
        ), 
        array(
            "type"        => "vc_link",
            "heading"     => esc_html__("URL (Link)",'cargo-pifour'),
            "param_name"  => "link",
            "value"       => "",
        ),
        array(
            'type'       => 'css_editor',
            'heading'    => esc_html__( 'CSS box', 'cargo-pifour' ),
            'param_name' => 'css',
            'group'      => esc_html__( 'Design Options', 'cargo-pifour' ),
        ), 
    )
));

class WPBakeryShortCode_cms_pricing_table extends CmsShortCode
{
    protected function content($atts, $content = null){
        return parent::content($atts, $content);
    }
    
}

?>