<?php
if (!empty($product_ID)) {
    if ($sale_price !== "") {
        $m_price = '<span>' . $current_currency . $sale_price . '</span>' . ' ' . '<del>' . $current_currency . $regular_price . '</del>';
    } elseif ($regular_price !== "") {
        $m_price = '<span>' . $current_currency . $regular_price . '</span>';
    } else {
        $m_price = '';
    }
    echo $m_price;
} else {
    echo "Free";
}
?>