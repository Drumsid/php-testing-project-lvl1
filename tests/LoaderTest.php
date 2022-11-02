<?php

namespace Loader\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

use Psr\Http\Message\ResponseInterface;

use Psr\Http\Message\StreamInterface;

use function Loader\Loader\loadPage;

class LoaderTest extends TestCase
{

    private Client $client;
    private $mock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mock = new MockHandler([
          new Response(404),
          new Response(200, [],"first"),
        ]);
        $this->client = new Client(["handler" => HandlerStack::create($this->mock)]);

    }

//    function testCorrectLoader(): void
//    {
////        $stub = $this->createMock(Client::class);
////        print_r(loadPage("https://fakeLink", "test", $this->client));
//        $this->assertEquals(
//          "Link no valid!",
//          loadPage("https://fakeLink", "test", $this->client)
//        );
//    }

    function testCorrectLoader2(): void
    {
        $url = "https://ru.hexlet.io/courses";
        $path = "test";

        $this->assertEquals(
          "Link no valid!",
          loadPage("https://fakeLink", "test", $this->client)
        );

        $this->assertEquals(
          "Saved in /result/{$path}/ru-hexlet-io-courses.html\n",
          loadPage($url, $path, $this->client)
        );
    }

}