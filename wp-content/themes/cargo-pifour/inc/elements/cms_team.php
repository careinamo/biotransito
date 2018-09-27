<?php
vc_map(array(
    "name" => 'Cms Team',
    "base" => "cms_team",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    "description" =>  '',
    "params" => array(
        array(
            'type' => 'img',
            'heading' => esc_html__('Layout Mode','cargo-pifour'),
            'param_name' => 'layout_mode',
                'value' =>  array(
                    'layout1' => get_template_directory_uri().'/vc_params/layouts/cms_team1.png',
                    'layout2' => get_template_directory_uri().'/vc_params/layouts/cms_team2.png',
            ),
        ),
        array(
            "type" => "attach_image",
            "param_name" => "image",
            "heading" => esc_html__("Image Item",'cargo-pifour'),
            "shortcode" => "cms_team",
        ),
         
        array(
            "type" => "textfield",
            "heading" => esc_html__("Name",'cargo-pifour'),
            "param_name" => "name",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Position",'cargo-pifour'),
            "param_name" => "position",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description",'cargo-pifour'),
            "param_name" => "desc",
            'dependency' => array(
                "element"=>"layout_mode",
                "value"=>array('layout2') 
            ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Phone Number",'cargo-pifour'),
            "param_name" => "phone",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Email",'cargo-pifour'),
            "param_name" => "email",
        ),  
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text align",'cargo-pifour'),
            "param_name" => "textalign_type",
            "value" => array(
                'center' => 'center',
                'left' => 'left',
                'right'  => 'right',
            ),
            "std" => 'center',
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("URL (Link)",'cargo-pifour'),
            "param_name" => "link",
            "value" => "",
        ),
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
            'group' => esc_html__('Social','cargo-pifour')
        ),
     
    )
));

class WPBakeryShortCode_cms_team extends CmsShortCode
{
    protected function content($atts, $content = null){
        $html_id = cmsHtmlID('cms-team');
         
        $atts['html_id'] = $html_id; 
        return parent::content($atts, $content);
    }
  
}

?>