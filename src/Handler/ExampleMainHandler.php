<?php
namespace Middleware\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use GuzzleHttp\Psr7\Response;
class ExampleMainHandler implements RequestHandlerInterface
{
    /**
     * This is the main execution point of our application. Depending on how we chain our middleware, we can process
     * validations before and after it executes.
     *
     * It is imperative to include this handler when creating our middleware stack.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getBody();
        $body->write("\nHola desde el Handler principal!\n");
        return new Response(200, ['Content-Type' => 'text/plain'], $body);
    }
}
