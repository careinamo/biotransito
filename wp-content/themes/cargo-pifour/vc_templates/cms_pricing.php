<?php
$css = $el_class = $pr1_heading = $pr1_sub_heading = $pr1_package_number = '';
$pr1_heading_1 = $pr1_price_currency_1 = $pr1_heading_2 = $pr1_price_currency_2 = $pr1_heading_3 = $pr1_price_currency_3 = $pr1_heading_4 = $pr1_price_currency_4 = '';
$classes = array();
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
$pricing_lists = array();
$classes[] = $el_class;
$classes[] = vc_shortcode_custom_css_class($css);
$css_class = preg_replace('/\s+/', ' ', apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($classes)), $this->settings['base'], $atts));

        $pricing_lists = (array)vc_param_group_parse_atts($pricing);

        $pricing_data = wp_hosthubs_build_pricing_data(
            array(
                'heading' => esc_html($pr1_heading),
                'subheading' => esc_html($pr1_sub_heading)
            ),
            $pr1_package_number,
            $atts,
            $pricing_lists
        );
        // $col_collection
        $pr_class = $pr_intro_class = '';
        if (empty($pricing_data)) return '';
        switch (intval($pr1_package_number)) {
            case '2':
                $pr_intro_class = 'col-md-4 col-sm-4 col-xs-12 pricing-choose nopadding';
                $pr_class = 'col-md-4 col-sm-4 col-xs-12 pricing-plan text-center nopadding';
                break;
            case '3':
                $pr_intro_class = 'col-md-3 col-sm-3 col-xs-12 pricing-choose nopadding';
                $pr_class = 'col-md-3 col-sm-3 col-xs-12 pricing-plan text-center nopadding';
                break;
            case '4':
                $pr_intro_class = 'col-md-4 col-sm-4 col-xs-12 pricing-choose nopadding';
                $pr_class = 'col-md-2 col-sm-2 col-xs-12 pricing-plan text-center nopadding';
                break;
            default:
                $pr_intro_class = 'col-md-4 col-sm-4 col-xs-12 pricing-choose nopadding';
                $pr_class = 'col-md-8 col-sm-8 col-xs-12 pricing-plan text-center nopadding';
                break;
        }
        ?>

        <div class="pricing-wrap pricing-1-wrap clearfix <?php echo esc_attr($css_class); ?>">
        <?php $i=0; ?>
            <?php foreach ($pricing_data as $key => $cols) {
                if ( $key == 'heading' ) {
                    ?>
                    <div class="<?php echo esc_html($pr_intro_class); ?>">
                        <div class="pricing-header pricing-header-wrap">
                            <p><?php echo esc_html($cols['subheading']); ?></p>
                            <h3><?php echo esc_html($cols['heading']); ?></h3>
                        </div>
                        <div class="pricing-body">
                            <ul>
                            <?php 
                             if (isset($cols['options']) && count($cols)>0): ?>
                                <?php foreach ($cols['options'] as $value): ?>
                                    <?php if (!empty($value)): ?>
                                        <?php echo '<li><strong>'.$value.'</strong></li>'; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                             <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="<?php echo esc_html($pr_class); ?>">
                        <div class="pricing-header pricing-header-wrap">
                             <p><?php echo esc_html($cols['currency']); ?></p>
                            <h3><?php echo esc_html($cols['heading']); ?></h3>
                        </div>
                        <div class="pricing-body <?php if($i == ($pr2_is_features)){echo esc_html('features');}?>">
                            <ul>
                            <?php foreach ($cols['values'] as $key => $value) {
                                if ( $key === 'end_row') {
                                    $link = vc_build_link($value);

                                    $use_link = false;
                                    if (strlen($link['url']) > 0) {
                                        $use_link = true;
                                        $a_href = $link['url'];
                                        $a_title = (!empty($link['title'])) ? $link['title'] : esc_html__('Order Now', 'cargo-pifour');
                                        $a_target = strlen($link['target']) > 0 ? $link['target'] : '_self';
                                    }
                                    ?>
                                    <?php if (strlen($link['url']) > 0): ?>
                                    <li><a title="<?php echo esc_attr($a_title); ?>" href="<?php echo esc_url($a_href); ?>"
                                       class="cms-button btn-primary"
                                       target="<?php echo esc_attr($a_target) ?>"><?php echo esc_html($a_title); ?></a></li>
                                       <?php endif ?>
                                    <?php
                                } else {
                                    
                                    if ($value['value_type'] == 'text' && !empty($value['value']) ) {
                                        echo '<li>'. esc_html($value['value']).'</li>';
                                    } elseif($value['value_type'] != 'text') {
                                        echo ($value['value'] == 'n') ? '<li><i class="fa fa-close"></i></li>' : '<li><i class="fa fa-check"></i></li>';
                                    }
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                $i++;
            }?>
        </div>