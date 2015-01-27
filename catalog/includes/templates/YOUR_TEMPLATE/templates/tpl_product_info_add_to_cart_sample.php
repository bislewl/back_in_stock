<?php
/**
 * @copyright Copyright 2010-2014  ZenCart.codes Owned & Operated by PRO-Webs, Inc. 
 * @copyright Copyright 2003-2014 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
// This will replace the normal add to cart button code
?>
<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
    // do nothing
} else {
    ?>
    <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart(zen_db_prepare_input($_GET['products_id']))) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity(zen_db_prepare_input($_GET['products_id'])) . '</p>' : '');
    if ($products_qty_box_status == 0 or $products_quantity_order_max == 1) {
        // hide the quantity box and default to 1
        $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int) zen_db_prepare_input($_GET['products_id'])) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
    } else {
        // show the quantity box
        $the_button = PRODUCTS_ORDER_QTY_TEXT . '<input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty(zen_db_prepare_input($_GET['products_id']))) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int) zen_db_prepare_input($_GET['products_id'])) . '<br />' . zen_draw_hidden_field('products_id', (int) zen_db_prepare_input($_GET['products_id'])) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
    }
    $display_button = zen_get_buy_now_button(zen_db_prepare_input($_GET['products_id'], $the_button));
    ?>
    <?php if ($display_qty != '' or $display_button != '') { ?>
        <div id="cartAdd">
        <?php
        echo $display_qty;
        echo $display_button;
        ?>
        </div>
        <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3  ?>
<!--eof Add to Cart Box-->