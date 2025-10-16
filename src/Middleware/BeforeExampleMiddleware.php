<?php

namespace Middleware\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class BeforeExampleMiddleware implements MiddlewareInterface
{

    /**
     * Example of a middleware that executes BEFORE the main handler
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $request->getBody()->write("Middleware antes del handler principal\n");
        return  $handler->handle($request);
    }
}