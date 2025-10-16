<?php
namespace Middleware\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
class AfterExampleMiddleware implements MiddlewareInterface
{
    /**
     * Example of a middleware that executes AFTER the main handler
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $request = $request->withAttribute('middleware_time', microtime(true));
        $response = $handler->handle($request);
        $body = $response->getBody();
        $body->write("\n -- Procesado por AfterExampleMiddleware --");
        return $response->withBody($body);
    }
}
