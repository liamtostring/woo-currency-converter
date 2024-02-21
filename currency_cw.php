<?php
/*
Plugin Name: Currency Converter for WooCommerce
Description: Plugin to set currency baseline per product and update exchange rates via WooCommerce API.
Version: 1.0
Author: Your Name
*/

// Function to add custom meta box for setting currency baseline per product
function add_currency_baseline_meta_box() {
    add_meta_box(
        'currency_baseline_meta_box',
        'Currency Baseline',
        'render_currency_baseline_meta_box',
        'product',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_currency_baseline_meta_box');

// Function to render the custom meta box
function render_currency_baseline_meta_box($post) {
    $currency_baseline = get_post_meta($post->ID, 'currency_baseline', true);
    echo '<label for="currency_baseline">Currency Baseline:</label>';
    echo '<select name="currency_baseline" id="currency_baseline">';
    echo '<option value="USD" ' . selected($currency_baseline, 'USD', false) . '>USD</option>';
    echo '<option value="MXN" ' . selected($currency_baseline, 'MXN', false) . '>MXN</option>';
    echo '</select>';
}

// Function to save currency baseline data
function save_currency_baseline_data($post_id) {
    if (array_key_exists('currency_baseline', $_POST)) {
        update_post_meta(
            $post_id,
            'currency_baseline',
            sanitize_text_field($_POST['currency_baseline'])
        );
    }
}
add_action('save_post', 'save_currency_baseline_data');

// Function to update product prices based on exchange rate
function update_product_prices_based_on_exchange_rate($product_id, $exchange_rate) {
    $product = wc_get_product($product_id);
    $currency_baseline = get_post_meta($product_id, 'currency_baseline', true);

    if ($currency_baseline == 'MXN') {
        $price = $product->get_regular_price() / $exchange_rate;
        $product->set_regular_price($price);
        $product->save();
    }
}

// Function to update exchange rate via WooCommerce API
function update_exchange_rate_via_api($exchange_rate) {
    $args = array(
        'numberposts' => -1,
        'post_type' => 'product',
    );

    $products = get_posts($args);

    foreach ($products as $product) {
        update_product_prices_based_on_exchange_rate($product->ID, $exchange_rate);
    }
}

// Example usage of update_exchange_rate_via_api function (you can use it when needed)
// $exchange_rate = 20; // Example exchange rate
// update_exchange_rate_via_api($exchange_rate);
?>
