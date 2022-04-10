<?php

namespace Loader\Loader;

use function Loader\Formater\formatUrlToFileName;

const ROOT_PATH = __DIR__ . "/.." ;

function loadPage($url, $path, $client)
{
    $content =  $client->get($url)->getBody()->getContents();
    $fileName =  formatUrlToFileName($url);
    if (!is_dir(ROOT_PATH . $path)) {
        mkdir(ROOT_PATH . $path);
    }
    file_put_contents(ROOT_PATH . "{$path}/{$fileName}", $content);
    return "ok";
}