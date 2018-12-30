# Installation
make sure your php version > 7.0
```bash
composer require viloveul/router
```
## HOW
```php
require __DIR__ . '/vendor/autoload.php';

// init collection object
$collection = new Viloveul\Router\Collection();

// declare class controller for handler
class MyController
{
	public function look($name)
	{
		return $name;
	}
}
// declare hello handler from my controller
$helloRoute = new Viloveul\Router\Route('/hello/:name', [MyController::class, 'look']);
// add foo to collection
$collection->add('hello', $helloRoute);

// declare foo handler
$fooRoute = new Viloveul\Router\Route('/foo/{:bar}', function($bar) {
	return $bar;
});
// add foo to collection
$collection->add('foo', $fooRoute);

// declare test handler
$testRoute = new Viloveul\Router\Route('/test/:name', [
	'method' => 'GET|POST|PUT|PATCH',
	'handler' => function ($name) {
		return $name;
	}
]);
// add test to collection
$collection->add('test', $testRoute);

// init object dispatcher with collection
$router = new Viloveul\Router\Dispatcher($collection);

// in action

$route1 = $router->dispatch('GET', '/hello/zafex');
$route2 = $router->dispatch('GET', '/foo/hello-world');
$route3 = $router->dispatch('GET', '/test/fajrul-akbar-zuhdi');

var_dump($route1, $route2, $route3);

```