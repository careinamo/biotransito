<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    "description" => esc_html__('Show social from theme option', 'cargo-pifour'),
    "params" => array(
        array(
        	"type" => "textfield",
            "heading" => esc_html__("Title",'cargo-pifour'),
            "param_name" => "title",
            "value" => "",
            "admin_label" => true,
            "description" => esc_html__("Title",'cargo-pifour'),
        ),
        array(
        	'type' => 'vc_link',
            'heading' => esc_html__( 'URL (Link)', 'cargo-pifour' ),
            'param_name' => 'link',
            'description' => esc_html__( 'Add link to button.', 'cargo-pifour' ),
        ),
        array(
        	"type" => "dropdown",
        	"heading" => esc_html__("Type",'cargo-pifour'),
        	"param_name" => "btn_type",
        	"value" => array(
                'Default' => 'btn-default',
                'Primary' => 'btn-primary',
                'Inverse' => 'btn-inverse',
            ),
            "std" => 'btn-default',
        ),
        array(
        	"type" => "dropdown",
        	"heading" => esc_html__("Size",'cargo-pifour'),
        	"param_name" => "size",
        	"value" => array(
                'Large' => 'btn-lg',
                'Medium' => 'btn-md',
                'Small' => 'btn-sm',
            ),
            "std" => 'btn-md',
            "description" => esc_html__( 'Select button size.', 'cargo-pifour' ),
        ),
        
        array(
        	"type" => "dropdown",
        	"heading" => esc_html__("Alignment",'cargo-pifour'),
        	"param_name" => "align",
        	"value" => array(
                'inline' => 'inline',
                'left' => 'left',
                'right' => 'right',
                'center' => 'center',
            ),
            "std" => 'inline',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__("Set full width button?", 'cargo-pifour'),
            'param_name' => 'button_block',
            'value' => array(
                'Yes' => true
            ),
            'dependency' => array(
                'element' => 'align',
                'value' => array(
                    'left',
                    'right',
                    'center',
                ),
            ),
            'std' => false,
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__("Add icon", 'cargo-pifour'),
            'param_name' => 'add_icon',
            'value' => array(
                'Yes' => true
            ),
            'std' => false,
        ),
        array(
        	"type" => "dropdown",
        	"heading" => esc_html__("Icon Alignment",'cargo-pifour'),
        	"param_name" => "i_align",
        	"value" => array(
                'Left' => 'left',
                'Right' => 'right',
            ),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => array(
                    '1',
                ),
            ),
            "std" => 'left',
        ),
        
        array(
            'type' => 'dropdown',
        	'heading' => esc_html__( 'Icon library', 'cargo-pifour' ),
        	'value' => array(
        		esc_html__( 'Font Awesome', 'cargo-pifour' ) => 'fontawesome',
                esc_html__( 'P7 Stroke', 'cargo-pifour' ) => 'pe7stroke',
        	),
        	'param_name' => 'icon_type',
        	'description' => esc_html__( 'Select icon library.', 'cargo-pifour' ),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => array(
                    '1',
                ),
            ),
        ),
        array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon Item', 'cargo-pifour' ),
			'param_name' => 'icon_fontawesome',
            'value' => '',
			'settings' => array(
				'emptyIcon' => true,  
				'type' => 'fontawesome',
				'iconsPerPage' => 200,  
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
			),
			'description' => esc_html__( 'Select icon from library.', 'cargo-pifour' ),
		 
		),
        array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon Item', 'cargo-pifour' ),
			'param_name' => 'icon_pe7stroke',
            'value' => '',
			'settings' => array(
				'emptyIcon' => true, 
				'type' => 'pe7stroke',
				'iconsPerPage' => 200,  
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'pe7stroke',
			),
			'description' => esc_html__( 'Select icon from library.', 'cargo-pifour' ),	 
		),
         
        array(
        	"type" => "textfield",
            "heading" => esc_html__("Class",'cargo-pifour'),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("Class",'cargo-pifour'),
        ), 
        array(
        	'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'cargo-pifour' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design Options', 'cargo-pifour' ),
        )
    )
));
class WPBakeryShortCode_cms_button extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}