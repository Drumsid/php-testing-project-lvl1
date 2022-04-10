<?php

namespace Loader\Formater;

function formatUrlToFileName($url)
{
    $urlData = parse_url($url);
    $format = array_filter($urlData, function ($val, $key) {
        if ($key != "scheme") {
            return $val;
        }
    }, ARRAY_FILTER_USE_BOTH);
    $path = array_reduce($format, function ($acc, $item) {
        $acc .= preg_replace('/[^0-9a-zA-Z]/', '-', $item);
        return $acc;
    }, "");
    return $path . ".html";
}