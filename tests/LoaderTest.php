<?php

namespace Loader\Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

use function Loader\Loader\loadPage;

class LoaderTest extends TestCase
{
    private Client $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client();
    }

    function testCorrectLoader() : void
    {
        $stub = $this->createMock(Client::class);
        $this->assertEquals("Link no valid!", loadPage("https://fakeLink", "test", $stub));
    }

    function testCorrectLoader2() : void
    {
        $url = "https://ru.hexlet.io/courses";
        $path = "test";

        $this->assertEquals(
            "Saved in /result/{$path}/ru-hexlet-io-courses.html\n",
            loadPage($url, $path, $this->client));
    }
}