<?php

use App\Product;

function update_cart_item_price()
{
    $cart = session('shoppingCart');
    // Have to add "&" before $volumes to modify the original array
    foreach ($cart as $product_id => &$volumes)
    {
        $base_price = Product::find($product_id)->price;
        // Have to add "&" before $volume_detail to modify the original array
        foreach ($volumes as $volume => &$volume_detail)
        {
            $money = order_price($base_price, $volume, $volume_detail['quantity']);
            $volume_detail['subprice'] = format_money($money);
        }
    }
    // Update session$
    session()->put('shoppingCart', $cart);
    return $cart;
}

function format_money($money): string
{
    return number_format($money, '0', '3', '.') . ' ₫';
}

function get_cart_total_price(): string
{
    $cart = session('shoppingCart');
    $total_price = 0;
    foreach ($cart as $product_id => $volumes)
    {
        $base_price = Product::find($product_id)->price;
        foreach ($volumes as $volume => $volume_detail)
        {
            $total_price += order_price($base_price, $volume, $volume_detail['quantity']);
        }
    }
    return $total_price;
}

function order_price($base_price, $volume, $quantity)
{
    $price = $base_price;

    switch ($volume)
    {
        default:
        case '100ml':
            $price = $price * 100 / 100;
            break;
        case '90ml':
            $price = $price * 90 / 100;
            break;
        case '50ml':
            $price = $price * 50 / 100;
            break;
        case '10ml':
            $price = $price * 10 / 100;
            break;
    }

    return $price * $quantity;
}

function utf8_uri_encode($utf8_string, $length = 0)
{
    $unicode = '';
    $values = array();
    $num_octets = 1;
    $unicode_length = 0;

    $string_length = strlen($utf8_string);
    for ($i = 0; $i < $string_length; $i++)
    {

        $value = ord($utf8_string[$i]);

        if ($value < 128)
        {
            if ($length && ($unicode_length >= $length))
                break;
            $unicode .= chr($value);
            $unicode_length++;
        }
        else
        {
            if (count($values) == 0) $num_octets = ($value < 224) ? 2 : 3;

            $values[] = $value;

            if ($length && ($unicode_length + ($num_octets * 3)) > $length)
                break;
            if (count($values) == $num_octets)
            {
                if ($num_octets == 3)
                {
                    $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
                    $unicode_length += 9;
                }
                else
                {
                    $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
                    $unicode_length += 6;
                }

                $values = array();
                $num_octets = 1;
            }
        }
    }

    return $unicode;
}

//taken from wordpress
function seems_utf8($str)
{
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++)
    {
        $c = ord($str[$i]);
        if ($c < 0x80) $n = 0; # 0bbbbbbb
        elseif (($c & 0xE0) == 0xC0) $n = 1; # 110bbbbb
        elseif (($c & 0xF0) == 0xE0) $n = 2; # 1110bbbb
        elseif (($c & 0xF8) == 0xF0) $n = 3; # 11110bbb
        elseif (($c & 0xFC) == 0xF8) $n = 4; # 111110bb
        elseif (($c & 0xFE) == 0xFC) $n = 5; # 1111110b
        else return false; # Does not match any model
        for ($j = 0; $j < $n; $j++)
        { # n bytes matching 10bbbbbb follow ?
            if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                return false;
        }
    }
    return true;
}

//function sanitize_title_with_dashes taken from wordpress
function sanitize($title)
{
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

    if (seems_utf8($title))
    {
        if (function_exists('mb_strtolower'))
        {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 200);
    }

    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);
    $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');

    return $title;
}


?>
