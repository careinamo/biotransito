<?php
extract(wp_parse_args($dropdown_attrs, array(
    'is_cart_empty' => 0,
    'list_class'    => '',
    'products'      => array(),
    'cart_subtotal' => '',
    'cart_url'      => '',
    'checkout_url'  => ''
)));
?>
<div class="shopping_cart_dropdown">
    <div class="shopping_cart_dropdown_inner">
        <ul class="cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
            <?php if (!$is_cart_empty) : ?>
                <?php foreach ($products as $product) :
                    extract(wp_parse_args($product, array(
                        'id'          => '',
                        'sku'         => '',
                        'permalink'   => '',
                        'image'       => '',
                        'title'       => '',
                        'data'        => '',
                        'quantity'    => '',
                        'remove_link' => '',
                        'remove_id'   => ''

                    )));
                    ?>
                    <li class="<?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item')); ?>">
                        <div class="pull-left">
                            <?php
                            echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                '<a href="%s" class="remove" title="%s" data-remove_id="%s" data-product_sku="%s"><i class="fa fa-trash-o"></i></a>',
                                $remove_link,
                                esc_html__('Remove this item', 'cargo-pifour'),
                                $remove_id,
                                $sku
                            ));
                            ?>

                            <a href="<?php echo esc_url($permalink); ?>">
                                <?php echo $image; ?>
                            </a>
                        </div>
                        <div class="product-desc">
                            <h5><?php echo $title; ?></h5>
                            <?php echo $data; ?>
                            <?php echo $quantity; ?>

                        </div>

                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li class="cart-list clearfix"><?php esc_html_e('No products in the cart.', 'cargo-pifour'); ?></li>
            <?php endif; ?>
        </ul>
    </div>
    <p class="total">
        <span class="total"><?php esc_html_e('Total: ', 'cargo-pifour'); ?>
            <span><?php echo $cart_subtotal; ?></span></span>
    </p>
    <p class="button">
        <a href="<?php echo esc_url($cart_url) ?>"
           class="btn btn-primary "><?php esc_html_e('Cart', 'cargo-pifour'); ?></a>
        <?php if (!$is_cart_empty): ?>
            <a href="<?php echo esc_url($checkout_url) ?>"
               class="btn btn-primary "><?php esc_html_e('Checkout', 'cargo-pifour'); ?></a>
        <?php endif; ?>
    </p>


</div>