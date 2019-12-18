<?php

namespace Tests\Framework;

use Framework\App;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppTest extends TestCase
{
    public function test404Page()
    {
        $app = new App();
        $request = Request::create("/xxx");

        $response = $app->run($request, []);

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testNormalURL()
    {
        $app = new App();
        $request = Request::create('/blog');
        $response = $app->run($request, ['/blog' => function () {
            return new Response('Blog !', 200);
        }]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Blog', $response->getContent());
    }

    public function testWithController()
    {
        $app = new App();
        $request = Request::create('/hello?name=Lior', "GET");
        $response = $app->run($request, ['/hello' => 'App\Controller\HelloController@hello']);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Hello Lior', $response->getContent());
    }
}
