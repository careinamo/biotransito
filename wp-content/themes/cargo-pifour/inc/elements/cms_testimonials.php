<?php
vc_map(array(
    'name' => 'CMS Testimonials',
    'base' => 'cms_testimonials',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    'description' => esc_html__('Add clients testimonial', 'cargo-pifour'),
    'params' => array(
        array(
            'type' => 'img',
            'heading' => esc_html__('Layout Mode','cargo-pifour'),
            'param_name' => 'layout_mode',
                'value' =>  array(
                    'layout1' => get_template_directory_uri().'/vc_params/layouts/cms_testimonial1.png',
                    'layout2' => get_template_directory_uri().'/vc_params/layouts/cms_testimonial2.png',
            ),
        ),
        array(
            'type'          => 'param_group',
            'heading'       => esc_html__( 'Add your testimonial', 'cargo-pifour' ),
            'param_name'    => 'values',
            'value'         => '',
            'params' => array(
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'Title', 'cargo-pifour' ),
                    'param_name'    => 'title',
                    'admin_label'   => true,
                    'value'         => ""
                ),
                array(
                    'type'          => 'attach_image',
                    'heading'       => esc_html__( 'Image', 'cargo-pifour' ),
                    'param_name'    => 'testi_avatar',
                    'value'         => ''
                ),
                array(
                    'type'          => 'textarea',
                    'heading'       => esc_html__( 'Testimonial text', 'cargo-pifour' ),
                    'description'   => esc_html__('Press double ENTER to get line-break','cargo-pifour'),
                    'param_name'    => 'text',
                    'value'         => ''
                ),
            ),
            'group' => esc_html__('Testimonial Item','cargo-pifour')
        ), 
    )
));

class WPBakeryShortCode_cms_testimonials extends CmsShortCode
{
  protected function content($atts, $content = null){
        $html_id = cmsHtmlID('cms-testimonials');
         
        $atts['html_id'] = $html_id; 
        return parent::content($atts, $content);
    }
}
?>