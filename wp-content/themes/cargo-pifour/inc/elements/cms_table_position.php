<?php
vc_map(array(
    'name' => 'CMS Table Position',
    'base' => 'cms_table_position',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    'description' => esc_html__('Add Position', 'cargo-pifour'),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Table Layout",'cargo-pifour'),
            "param_name" => "table_layout",
            "value" => array(
                'Default' => 'table-default',
                'Pricing' => 'table-pricing',
            ),
            "std" => 'table-default',
            "description" => esc_html__( 'Select table layout.', 'cargo-pifour' ),
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Table title 1",'cargo-pifour'),
            "param_name" => "table_title1",
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Table title 2",'cargo-pifour'),
            "param_name" => "table_title2",
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Table title 3",'cargo-pifour'),
            "param_name" => "table_title3",
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Table title 4",'cargo-pifour'),
            "param_name" => "table_title4",
        ),
        array(
            'type'          => 'param_group',
            'heading'       => esc_html__( 'Add your testimonial', 'cargo-pifour' ),
            'param_name'    => 'values',
            'value'         => urlencode( json_encode( array(
                array(
                    'values' => esc_html__( 'Option', 'cargo-pifour' ),
                ),
            ) ) ),
            'params' => array(
                 array(
                    "type" => "vc_link",
                    "heading" => esc_html__("URL (Link)",'cargo-pifour'),
                    "param_name" => "link",
                    "value" => "",
                    ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'table content 1', 'cargo-pifour' ),
                    'param_name'    => 'table_content1',
                    'admin_label'   => true,
                    'value'         => ''
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'table content 2', 'cargo-pifour' ),
                    'param_name'    => 'table_content2',
                    'value'         => ''                   
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'table content 3', 'cargo-pifour' ),
                    'param_name'    => 'table_content3',
                    'value'         => ''
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'table content 4', 'cargo-pifour' ),
                    'param_name'    => 'table_content4',
                    'value'         => ''
                ),

            ),
            'group' => esc_html__('Table Item','cargo-pifour')
        ),      
    )
));

class WPBakeryShortCode_cms_table_position extends CmsShortCode
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