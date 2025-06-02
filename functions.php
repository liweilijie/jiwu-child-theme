<?php
if (!function_exists('jiwu_listing_price')) {
    function jiwu_listing_price($post_id = null) {
        $post_id = $post_id ?? get_the_ID();

        $lower_price = get_post_meta($post_id, 'fave_property_price', true);
        $postfix = get_post_meta($post_id, 'fave_property_price_postfix', true);
        $price_text = get_post_meta($post_id, 'price_text', true); // 可选字段，若你导入时写入了这个字段

        $output = '';

        // 判断是否是价格区间（格式为 " - $xxx,xxx"）
        if (!empty($lower_price) && !empty($postfix) && preg_match('/- \$([\d,]+)/', $postfix, $matches)) {
            $upper_price = str_replace(',', '', $matches[1]);
            $output = '$' . number_format($lower_price) . ' - $' . number_format($upper_price);
        }
        // 单独的价格
        elseif (!empty($lower_price)) {
            $output = '$' . number_format($lower_price);
            if (!empty($postfix) && !preg_match('/- \$([\d,]+)/', $postfix)) {
                $output .= ' ' . esc_html($postfix);
            }
        }
        // 只有 postfix（例如 "Contact Agent"）
        elseif (!empty($postfix)) {
            $output = esc_html($postfix);
        }
        // 最后备选
        elseif (!empty($price_text)) {
            $output = esc_html($price_text);
        } else {
            $output = 'Price on request';
        }

        return $output;
    }
}

if (!function_exists('houzez_listing_price_v1')) {
    function houzez_listing_price_v1() {
        echo '<li class="item-price">' . jiwu_listing_price() . '</li>';
    }
}

?>