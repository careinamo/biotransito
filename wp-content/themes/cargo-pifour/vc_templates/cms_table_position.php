<?php 
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$values=(array) vc_param_group_parse_atts($values );
?>
    <div class="cms-table-position">
        <table class="table-position <?php echo esc_attr($table_layout);?>">            
            <thead>
                <tr>
                <?php if(!empty(esc_attr($table_title1))){
                        echo '<th>'. esc_attr($table_title1).'</th>';
                    } ?>
                <?php if(!empty(esc_attr($table_title2))){
                        echo '<th>'. esc_attr($table_title2).'</th>';
                    } ?>
                <?php if(!empty(esc_attr($table_title3))){
                        echo '<th>'. esc_attr($table_title3).'</th>';
                    } ?>
                <?php if(!empty(esc_attr($table_title4))){
                        echo '<th>'. esc_attr($table_title4).'</th>';
                    } ?>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($values)): ?>
            <?php foreach($values as $value): 
                    $link = (isset($value['link'])) ? $value['link'] : '#';
                    $link = vc_build_link( $link );
                    $use_link = false;
                    if ( strlen( $link['url'] ) > 0 ) {
                        $use_link = true;
                        $a_href = $link['url'];
                        $a_title = !empty($link['title'])?$link['title']: '';
                        $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
                    }
            ?>
                <tr>
                    <?php  if( !empty($value['table_content1'])){?>
                    <td>
                        <?php  
                            if($use_link):
                                echo '<a href="'.esc_url($a_href).'"><span>'.$value['table_content1'].'</span></a>';
                            else:
                                echo '<span>'.$value['table_content1'].'</span>';
                            endif;                            
                        ?>
                    </td>
                    <?php } ?>

                    <?php if( !empty($value['table_content2'])){?>
                    <td>
                        <?php  
                            if( !empty($value['table_content2']))
                            echo '<span>'.$value['table_content2'].'</span>';
                        ?>
                    </td>
                    <?php } ?>
                    <?php if( !empty($value['table_content3'])){?>
                    <td>
                        <?php  
                            if( !empty($value['table_content3']))
                            echo '<span>'.$value['table_content3'].'</span>';
                        ?>
                    </td>
                    <?php } ?>
                    <?php if( !empty($value['table_content4'])){?>
                    <td>
                        <?php  
                            if( !empty($value['table_content4']))
                            echo '<span>'.$value['table_content4'].'</span>';
                        ?>
                    </td>
                    <?php } ?>
                </tr>
            <?php 
                endforeach; 
                endif; 
             ?>
            </tbody>
        </table>
            
    </div>
