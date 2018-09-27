<?php
$params = array( 
    array(
        'type' => 'checkbox',
        'heading' => esc_html__("Top Overlap", 'cargo-pifour'),
        'param_name' => 'top_overlap',
        'value' => array(
            'Yes' => true
        ),
        'std' => false,
        'template' => array('cms_carousel--services.php'),
    ),     
);

?>