<?php
vc_map(array(
    'name' => 'CMS Download File',
    'base' => 'cms_download_file',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    'description' => esc_html__('Add file for download', 'cargo-pifour'),
    'params' => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'cargo-pifour'),
            "param_name" => "title",
            "value" => "",
            "description" =>"",
        ),
         
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Add file for download', 'cargo-pifour' ),
            'param_name' => 'files',
            'value' => urlencode( json_encode( array(
                array(
                    'values' => esc_html__( 'files', 'cargo-pifour' ),
                ),
            ) ) ),
            
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'File Icon class', 'cargo-pifour' ),
                    'param_name' => 'file_icon_class',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'File Name', 'cargo-pifour' ),
                    'param_name' => 'file_name',
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("File link",'cargo-pifour'),
                    "param_name" => "file_link", 
                ),
                 
            ),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'cargo-pifour' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design Options', 'cargo-pifour' ),
        ),
    )
));
class WPBakeryShortCode_cms_download_file extends CmsShortCode
{
    protected function content($atts, $content = null){
         
        return parent::content($atts, $content);
    }
}
?>