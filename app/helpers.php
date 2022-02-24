<?php

use App\Models\Settings;
use Illuminate\Support\Str;

function array_to_jsdecode(array $array)
{
    return json_decode(json_encode($array));
}


function sql_with_bindings($query)
{
    return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
        return is_numeric($binding) ? $binding : "'{$binding}'";
    })->toArray());
}
function slug($string)
{
   return preg_replace('/\s+/u', '-', trim(Str::lower($string)));
    $t = $string;

    $specChars = array(
        ' ' => '-',    '!' => '',    '"' => '',
        '#' => '',    '$' => '',    '%' => '',
        '&' => '',    '\'' => '',   '(' => '',
        ')' => '',    '*' => '',    '+' => '',
        ',' => '',    '₹' => '',    '.' => '-',
        '/-' => '',    ':' => '',    ';' => '',
        '<' => '',    '=' => '',    '>' => '',
        '?' => '',    '@' => '',    '[' => '',
        '\\' => '',   ']' => '',    '^' => '',
        '_' => '',    '`' => '',    '{' => '',
        '|' => '',    '}' => '',    '~' => '',
        '-----' => '-',    '----' => '-',    '---' => '-',
        '/' => '',    '--' => '-',   '/_' => '-',

    );

    foreach ($specChars as $k => $v) {
        $t = str_replace($k, $v, $t);
    }
    return strtolower($t);
}

/**
 * Get product from session api
 * @param int $id
 * @return stdclass product
 */
function product( $id)
{
    if ($id) {
        foreach (session('products',[]) as $product) {
            if ($product->id == $id) {
                return  $product;
                break;
            }
        }
    }
}
function category( $id)
{
    if ($id) {
        foreach (session('categories',[]) as $category) {
            if ($category->id == $id) {
                return  $category;
                break;
            }
        }
    }
}
function shipping($id)
{
    if ($id) {
        foreach (session('shippings',[]) as $shipping) {
            if ($shipping->id == $id) {
                return  $shipping;
                break;
            }
        }
    }
}

function settings($name, $default = null)
{
    return Settings::where('name', $name)->pluck('value')->first() ?? $default;
}
