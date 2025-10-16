# Middleware Stack
Librería PSR-15 para construir cadenas de middlewares en PHP.

![Build](https://github.com/amazing79/psr15-middlewarestack/actions/workflows/tests.yml/badge.svg)
[![Latest Stable Version](https://img.shields.io/packagist/v/psr15-middlewarestack/stack.svg)](https://packagist.org/packages/amazing79/psr15-middlewarestack)

## 🚀 Instalación

```bash
composer require amazing79/psr15-middlewarestack
```

## 🧱 Uso

```php
use Milderware\Middleware\ExampleMiddleware;
use Milderware\Handler\ExampleHandler;
use Milderware\MiddlewareStack;
use GuzzleHttp\Psr7\ServerRequest;

$stack = new MiddlewareStack(new ExampleHandler());
$stack->add(new ExampleMiddleware());
$request = new ServerRequest('GET', '/');
$response = $stack->handle($request);
echo (string) $response->getBody();
```

## 🧪 Tests

```bash
  vendor/bin/phpunit
```

## 🧠 Autor
Ignacio Jauregui — [GitHub](https://github.com/amazing79)
