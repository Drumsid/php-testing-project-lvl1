<?php

namespace Loader\Loader;

use function Loader\Formatter\formatUrlToFileName;

const ROOT_PATH = __DIR__ . "/../../result/";

function loadPage($url, $path, $client)
{
    createResultDir();
    $content =  $client->get($url, ['http_errors' => false]);
    if ($content->getStatusCode() != '200') {
        return "Link no valid!";
    }
    $fileName =  formatUrlToFileName($url);
    if (!is_dir(ROOT_PATH . $path)) {
        mkdir(ROOT_PATH . $path);
    }
    file_put_contents(ROOT_PATH . "{$path}/{$fileName}", $content->getBody()->getContents());
    return "Saved in /result/{$path}/{$fileName}" . PHP_EOL;
}

function createResultDir()
{
    if (!is_dir(__DIR__ . "/../../result/")) {
        mkdir(__DIR__ . "/../../result/");
    }
}