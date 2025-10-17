# Middleware Stack

Librería PSR-15 para construir cadenas de middlewares en PHP. Realizada con la ayuda del amigo ChatGpt. 

## Consideraciones importantes

Esta libreria se realizó siguiendo la especificacion PSR-15. Está a su vez, requiere implementar PSR-7 (para trabajar con objetos Request y Response).

El modo de proceso de los middlewares es LIFO (Last In First Out), por lo cual el último en agregarse, será el primero en ejecutarse.


![Build](https://github.com/amazing79/psr15-middlewarestack/actions/workflows/phptests.yml/badge.svg)
![Total Downloads](https://img.shields.io/packagist/dt/amazing79/middleware-stack)
[![Latest Stable Version](https://img.shields.io/packagist/v/amazing79/middleware-stack)](https://packagist.org/packages/amazing79/middleware-stack)
![License](https://img.shields.io/packagist/l/amazing79/middleware-stack)

## 🚀 Instalación

```bash
composer require amazing79/middleware-stack
```

## 🧱 Uso

```php
use Amazing79\Middleware\Middleware\BeforeExampleMiddleware;
use Amazing79\Middleware\MiddlewareStack;
use Amazing79\Middleware\Middleware\AfterExampleMiddleware;
use Amazing79\Middleware\Handler\ExampleMainHandler;
use GuzzleHttp\Psr7\ServerRequest;

$stack = new MiddlewareStack(new ExampleMainHandler());
$stack->add(new AfterExampleMiddleware());
$stack->add(new BeforeExampleMiddleware());
$request = new ServerRequest('GET', '/');
$response = $stack->handle($request);
echo (string) $response->getBody();
```



## 🧪 Tests

```bash
  composer tests
```

### Consideraciones

Es una libreria muy básica. Se creo para poder combinarla con el framework que cree del tutorial de Symfony.
Para su uso, nuestra app debe contar con un Handler principal, el cual acepta un objeto Request y devuelve un objeto Response.
Los middlewares se pueden ejecutar de dos maneras:

* Previo a la ejecucion de este handle (Ver ejemplo BeforeMiddlewareExample).
* Posterior a la ejecucion del handle principal (Ver ejemplo AfterMiddlewareExample)
* Se incluye para pruebas la libreria guzzlehttp, la cual implementa el standard PSR-7

Podemos ver un uso completo de la librería dentro de los tests provistos.

## 🧠 Autor
Ignacio Jauregui — [GitHub](https://github.com/amazing79)
