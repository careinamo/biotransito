<?php defined( 'ABSPATH' ) or exit();
/**
 * Simple Image Widget
 * This widget allows you to pick image and show at the front-end with some options
 *
 * @author knightdev
 * @version 1.0
 */

class Cms_Image_Widget extends WP_Widget {
    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        parent::__construct(
            'cms_image', // Base ID
            esc_html__( 'Cms Image', 'cargo-pifour' ), // Name
            array(
                'description' => esc_html__( 'Add image with some options and optional link.', 'cargo-pifour' ),
                'customize_selective_refresh' => true
            ) // Args
        );
    }


    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        extract( $args, EXTR_SKIP );
        
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title' => '',
                'image' => '',
                'link' => '',
                'align' => '',
                'target' => '',
                'size' => 'thumbnail',
                'name'  => '',
                'url'   => '',
                'desc'  => '',
                'signature_img_url' => ''
            )
        );

        if ( ! empty( $instance['title'] ) ) {
            $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        }

        echo balanceTags($before_widget);

        if ( ! empty( $title ) )
        {
            echo balanceTags($before_title . $title . $after_title);
        }
        $size = empty( $instance['size'] ) ? 'thumbnail' : strval( $instance['size'] );

        if ( ! empty( $instance['image'] ) ) {
            $image = ( is_numeric( $instance['image'] ) && $instance['image'] > 0 ) ? intval( $instance['image'] ) : 0;
            if ( $image > 0 ) {
                echo '<div class="image';
                if ( ! empty( $instance['align'] ) ) {
                    echo ' text-' . esc_attr( $instance['align'] );
                }
                echo '">';
                if ( ! empty( $instance['link'] ) ) {
                    $target = ( '' === $instance['target'] ) ? '_self' : '_blank';
                    echo '<a href="' . esc_url( $instance['link'] ) . '" target="' . esc_attr( $target ) . '">';
                }
                $alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
                $alt = empty( $alt ) ? '' : strval( $alt );
                $image_src = wp_get_attachment_image_src( $image, $size );
                
                if ( $image_src ) {
                    echo '<img src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr( $alt ) . '"/>';
                }
                if ( ! empty( $instance['link'] ) ) {
                    echo '</a>';
                }
                echo '</div>';
            }
            
        }
        
        if ( ! empty( $instance['name'] ) || ! empty( $instance['desc'] ) || ! empty( $instance['signature_img_url'] )){
            echo '<div class="about-desc">';  
            if ( ! empty( $instance['desc'] ) )
            {
                printf( '%s', wpautop( $instance['desc'] ) );
            }
            
            if ( ! empty( $instance['name'] ) )
            {
                $name_markup = '';
                if ( ! empty( $instance['url'] ) )
                {
                    $name_markup = sprintf( '<a href="%1$s">%2$s</a>', esc_url( $instance['url'] ), esc_html( $instance['name'] ) );
                }
                else
                {
                    $name_markup = esc_html( $instance['name'] );
                }
                printf( '<h4 class="my-name">%s</h4>', $name_markup );
            }
                   
            if ( ! empty( $instance['signature_img_url'] ) )
            {
                printf( '<img src="%s" alt=""/>', esc_url( $instance['signature_img_url'] ) );
            }
            echo '</div>';
        }


        echo balanceTags($after_widget);



    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['image'] = strip_tags( $new_instance['image'] );
        $instance['link'] = esc_url( strip_tags( $new_instance['link'] ) );
        $instance['align'] = strip_tags( $new_instance['align'] );
        $instance['size'] = strip_tags( $new_instance['size'] );
        $instance['target'] = strip_tags( $new_instance['target'] );
        $instance['name'] = sanitize_text_field( $new_instance['name'] );
        $instance['url'] = esc_url( $new_instance['url'] );
        $instance['desc'] = $new_instance['desc'];
        $instance['signature_img_url'] = esc_url( $new_instance['signature_img_url'] );

        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title' => '',
                'image' => 0,
                'link' => '',
                'align' => '',
                'target' => '',
                'size' => 'thumbnail',
                'name' => '',
                'url' => '',
                'desc' => '',
                'signature_img_url' => ''
            )
        );

        $image_holder = $this->get_field_id( 'images' ) . '-' . cargo_pifour_generate_uiqueid();
        $title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $image      = intval( $instance['image'] );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'cargo-pifour' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'align' ) ); ?>"><?php esc_html_e( 'Align:', 'cargo-pifour' ); ?></label>
            <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'align' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'align' ) ); ?>">
                <option value=""><?php esc_html_e( 'Default', 'cargo-pifour' ); ?></option>
                <option value="left" <?php selected( "left", $instance['align'] ); ?>><?php esc_html_e( 'Left', 'cargo-pifour' ); ?></option>
                <option value="center" <?php selected( "center", $instance['align'] ); ?>><?php esc_html_e( 'Center', 'cargo-pifour' ); ?></option>
                <option value="right" <?php selected( "right", $instance['align'] ); ?>><?php esc_html_e( 'Right', 'cargo-pifour' ); ?></option>
            </select>
        </p>
        <div class="redexp-widget-image">
            <label><?php esc_html_e( 'Image', 'cargo-pifour' ); ?></label>
            <ul class="redexp-mu-images" id="<?php echo esc_attr( $image_holder ); ?>" data-img-mu-field="<?php echo $this->get_field_id( 'image' ); ?>"><?php
            
                $attachment_image = wp_get_attachment_image_src( $image, 'thumbnail' );
                if ( ! empty( $attachment_image ) )
                {
                    printf(
                        '<li data-id="%1$s" style="background-image:url(%2$s);">',
                        esc_attr( $image ),
                        esc_url( $attachment_image[0] )
                    );

                    printf(
                        '<a class="image-edit" href="#" onclick="RedExpMedia.Image.edit(event,%s);"><i class="dashicons dashicons-edit"></i></a>',
                        esc_attr( '"' . $image_holder . '"' )
                    );

                    printf(
                        '<a class="image-delete" href="#" onclick="RedExpMedia.Image.remove(event,%s);"><i class="dashicons dashicons-trash"></i></a>',
                        esc_attr( '"' . $image_holder . '"' )
                    );

                    echo '</li>';
                }

                printf(
                    '<li data-id="0"><a class="image-add" href="#" onclick="RedExpMedia.Image.add(event,%s);"><i class="dashicons dashicons-plus-alt"></i></a></li>',
                    esc_attr( '"' . $image_holder . '"' )
                );

            ?></ul>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'cargo-pifour' ); ?></label>
            <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>">
                <?php
                    $image_sizes = apply_filters( 'image_size_names_choose', array(
                        'thumbnail' => esc_html__( 'Thumbnail', 'cargo-pifour' ),
                        'medium'    => esc_html__( 'Medium', 'cargo-pifour' ),
                        'large'     => esc_html__( 'Large', 'cargo-pifour' ),
                        'full'      => esc_html__( 'Full Size', 'cargo-pifour' )
                    ) );
                    foreach ( $image_sizes as $size => $text )
                    {
                        printf(
                            '<option value="%1$s" %2$s">%3$s</option>',
                            esc_attr( $size ),
                            selected( $size, $instance['size'], false ),
                            esc_html( $text )
                        );
                    }
                ?>
            </select>
            
        </p>
            <p class="howto"><?php echo esc_html__( 'Add image size string, defaults include "thumbnail", "medium", "large", "full", or your defined size.', 'cargo-pifour' ); ?></p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php echo esc_html__( 'Link', 'cargo-pifour' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" value="<?php echo esc_url( $instance['link'] ); ?>" />

            <p class="howto"><?php echo esc_html__( 'Add link for image', 'cargo-pifour' ); ?></p>
            <input type="hidden" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php echo esc_attr( $instance['image'] ); ?>"/>
        </div>
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" type="checkbox" value="1" <?php checked( "1", $instance['target'] );  ?>/><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open link in new tab?', 'cargo-pifour' ); ?></label>
        </p>


         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Name:', 'cargo-pifour' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php esc_html_e( 'Profile URL:', 'cargo-pifour' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="url" value="<?php echo esc_url( $instance['url'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php echo esc_html__( 'Description', 'cargo-pifour' ); ?></label>
            <textarea rows="5"
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $instance['desc'] ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'signature_img_url' ) ); ?>"><?php esc_html_e( 'Signature Image Url:', 'cargo-pifour' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'signature_img_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'signature_img_url' ) ); ?>" type="url" value="<?php echo esc_url( $instance['signature_img_url'] ); ?>" />
        </p>
        <p class="howto">
        <label><?php echo esc_html__( 'Optional signature image url.', 'cargo-pifour' ); ?></label>
      
        </p>
        


        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'Cms_Image_Widget' );" ) );