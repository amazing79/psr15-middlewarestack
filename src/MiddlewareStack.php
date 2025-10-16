<?php
namespace Amazing79\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
class MiddlewareStack implements RequestHandlerInterface
{
    private array $middlewares = [];
    private RequestHandlerInterface $defaultHandler;
    public function __construct(RequestHandlerInterface $defaultHandler)
    {
        $this->defaultHandler = $defaultHandler;
    }
    public function add(MiddlewareInterface $middleware): void
    {
        $this->middlewares[] = $middleware;
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (empty($this->middlewares)) {
            return $this->defaultHandler->handle($request);
        }
        $middleware = array_shift($this->middlewares);
        return $middleware->process($request, $this);
    }
}
