<?php
vc_map(array(
    "name" => 'Pricing Table',
    "base" => "cms_pricing",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    "description" =>  '',
    "params" => array(
        array(
            'type' => 'hidden',
            'param_name' => 'html_id',
            'value' => 'cargo-pifour-pricing',
        ),

        /* Pricing 1 */
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Heading",'cargo-pifour'),
            "param_name" => "pr1_heading",
            'admin_label' => true,
           
        ), 
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Sub Heading",'cargo-pifour'),
            "param_name" => "pr1_sub_heading",
           
        ),
        array(
            "type" => "dropdown",
            "heading" =>esc_html__("Select Package Number",'cargo-pifour'),
            "param_name" => "pr1_package_number",
            "value" => array(
                '2 Packages' => '2',
                '3 Packages' => '3',
                '4 Packages' => '4',
            )
        ),
        /* Start Items */
        array(
            "type" => "heading",
            "heading" => __("Package 1", 'cargo-pifour'),
            "param_name" => "pr1_heading_label_1",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4') 
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading", 'cargo-pifour'),
            "param_name" => "pr1_heading_1",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4') 
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price & Currency", 'cargo-pifour'),
            "param_name" => "pr1_price_currency_1",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4')  
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Register (Link)', 'cargo-pifour' ),
            'param_name' => 'pr1_url_1', 
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4') 
            ),
        ),
        array(
            "type" => "heading",
            "heading" => __("Package 2", 'cargo-pifour'),
            "param_name" => "pr1_heading_label_2",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4') 
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading", 'cargo-pifour'),
            "param_name" => "pr1_heading_2",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4')  
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price & Currency", 'cargo-pifour'),
            "param_name" => "pr1_price_currency_2",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4') 
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Register (Link)', 'cargo-pifour' ),
            'param_name' => 'pr1_url_2'  ,
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('2', '3', '4') 
            ),
        ),
        array(
            "type" => "heading",
            "heading" => __("Package 3", 'cargo-pifour'),
            "param_name" => "pr1_heading_label_3",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('3', '4')
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading", 'cargo-pifour'),
            "param_name" => "pr1_heading_3",
            'dependency' => array(
                "element"=>"pr1_package_number",
               "value"=>array('3', '4')
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price & Currency", 'cargo-pifour'),
            "param_name" => "pr1_price_currency_3",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('3', '4')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Register (Link)', 'cargo-pifour' ),
            'param_name' => 'pr1_url_3',  
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>array('3', '4')
            ),
        ),
        array(
            "type" => "heading",
            "heading" => __("Package 4", 'cargo-pifour'),
            "param_name" => "pr1_heading_label_4",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>'4'
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading", 'cargo-pifour'),
            "param_name" => "pr1_heading_4",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>'4'
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price & Currency", 'cargo-pifour'),
            "param_name" => "pr1_price_currency_4",
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>'4'
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Register (Link)', 'cargo-pifour' ),
            'param_name' => 'pr1_url_4', 
            'dependency' => array(
                "element"=>"pr1_package_number",
                "value"=>'4'
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Select package is features', 
            'param_name' => 'pr2_is_features',
            "value" => array(
                'Packages 1' => '1',
                'Packages 2' => '2',
                'Packages 3' => '3',
                'Packages 4' => '4',
            ),  
        ),
        /* Param group for Layout1 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Pricing Params', 'cargo-pifour' ),
            'param_name' => 'pricing',
            'description' => esc_html__( 'Enter values for pricing item', 'cargo-pifour' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'pr1_param_1' => 'Disk Space',
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Param name",'cargo-pifour'),
                    "param_name" => "pr1_param_name",
                    'admin_label' => true,
                ),
                
                array(
                    "type" => "dropdown",
                    "heading" =>esc_html__("Value type",'cargo-pifour'),
                    "param_name" => "value_type",
                    'value' => array(
                        'Text' => 'text',
                        'Select' => 'select',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Value Package 1",'cargo-pifour'),
                    "param_name" => "pr1_param_value_text_1",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'text',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),
                array(
                    "type" => "dropdown",
                    "heading" =>esc_html__("Value Package 1",'cargo-pifour'),
                    "param_name" => "pr1_param_value_checkbox_1",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'select',
                    ),
                    'value' => array(
                        'No' => 'n',
                        'Yes' => 'y',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),

                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Value Package 2",'cargo-pifour'),
                    "param_name" => "pr1_param_value_text_2",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'text',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),
                array(
                    "type" => "dropdown",
                    "heading" =>esc_html__("Value Package 2",'cargo-pifour'),
                    "param_name" => "pr1_param_value_checkbox_2",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'select',
                    ),
                    'value' => array(
                        'No' => 'n',
                        'Yes' => 'y',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),

                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Value Package 3",'cargo-pifour'),
                    "param_name" => "pr1_param_value_text_3",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'text',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),
                array(
                    "type" => "dropdown",
                    "heading" =>esc_html__("Value Package 3",'cargo-pifour'),
                    "param_name" => "pr1_param_value_checkbox_3",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'select',
                    ),
                    'value' => array(
                        'No' => 'n',
                        'Yes' => 'y',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Value Package 4",'cargo-pifour'),
                    "param_name" => "pr1_param_value_text_4",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'text',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),
                array(
                    "type" => "dropdown",
                    "heading" =>esc_html__("Value Package 4",'cargo-pifour'),
                    "param_name" => "pr1_param_value_checkbox_4",
                    'dependency' => array(
                        'element' => 'value_type',
                        'value' => 'select',
                    ),
                    'value' => array(
                        'No' => 'n',
                        'Yes' => 'y',
                    ),
                    'edit_field_class' => 'vc_col-sm-3 vc_column',
                ),

            ),
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Class",'cargo-pifour'),
            "param_name" => "el_class",
            "value" => "",
            "description" =>"",
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'cargo-pifour' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design Options', 'cargo-pifour' ),
        ),
    )
));

class WPBakeryShortCode_cms_pricing extends CmsShortCode
{
    protected function content($atts, $content = null) {
        $atts_extra = shortcode_atts(array(
            'class' => '',
        ), $atts);
        $atts = array_merge($atts_extra, $atts);
        $html_id = cmsHtmlID('cargo-pifour-pricing'); 
        $class = $atts['class'];
        $atts['html_id'] = $html_id;

        return parent::content($atts, $content);
    }
}