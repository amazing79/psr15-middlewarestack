<?php
namespace Amazing79\Middleware\Tests;

use Amazing79\Middleware\Middleware\BeforeExampleMiddleware;
use PHPUnit\Framework\TestCase;
use Amazing79\Middleware\MiddlewareStack;
use Amazing79\Middleware\Middleware\AfterExampleMiddleware;
use Amazing79\Middleware\Handler\ExampleMainHandler;
use GuzzleHttp\Psr7\ServerRequest;

class MiddlewareStackTest extends TestCase
{
    public function testMiddlewarePipelineProcessesRequest()
    {
        $stack = new MiddlewareStack(new ExampleMainHandler());
        $stack->add(new AfterExampleMiddleware());
        $stack->add(new BeforeExampleMiddleware());
        $request = new ServerRequest('GET', '/');
        $response = $stack->handle($request);
        $body = (string) $response->getBody();
        $this->assertStringContainsString('Middleware antes del handler principal', $body);
        $this->assertStringContainsString('Hola desde el Handler principal!', $body);
        $this->assertStringContainsString('Procesado por AfterExampleMiddleware', $body);
    }
}
