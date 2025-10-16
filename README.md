# Middleware Stack

Librería PSR-15 para construir cadenas de middlewares en PHP. Realizada con la ayuda del amigo ChatGpt. 

## Consideraciones importantes

Esta libreria se realizó siguiendo la especificacion PSR-15. Está a su vez, requiere implementar PSR-7 (para trabajar con objetos Request Y Response).
El modo de proceso de los middlewares es LIFO (Last In Firts Out), por lo cual el último en agregarse, será el primero en ejecutarse.



Podemos ver un ejemplo en los tests provistos.

![Build](https://github.com/amazing79/psr15-middlewarestack/actions/workflows/tests.yml/badge.svg)
[![Latest Stable Version](https://img.shields.io/packagist/v/middleware-stack/stack.svg)](https://packagist.org/packages/amazing79/middleware-stack)

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

Podemos ver un uso de la libreria dentro de los tests proveídos.

## 🧪 Tests

```bash
  vendor/bin/phpunit
```

### Consideraciones

Es una libreria muy básica. Se creo para poder combinarla con el framework que cree del tutorial de Symfony.
Para su uso, nuestra app debe contar con un Handler principal, el cual acepta un objeto Request y devuelve un objeto Response.
Los middlewares se pueden ejecutar de dos maneras:

* Previo a la ejecucion de este handle (Ver ejemplo BeforeMiddlewareExample).
* Posterior a la ejecucion del handle principal (Ver ejemplo AfterMiddlewareExample)


## 🧠 Autor
Ignacio Jauregui — [GitHub](https://github.com/amazing79)
