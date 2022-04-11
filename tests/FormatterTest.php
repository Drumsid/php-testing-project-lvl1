<?php

namespace Loader\Tests;

use PHPUnit\Framework\TestCase;

use function Loader\Formatter\formatUrlToFileName;

class FormatterTest extends TestCase
{
    function testFormatUrlToFileName() : void
    {
        $url = "https://test.io/test";
        $fileName = "test-io-test.html";
        $this->assertEquals($fileName, formatUrlToFileName($url));

        $url = "";
        $this->assertEquals(".html", formatUrlToFileName($url));
    }
}