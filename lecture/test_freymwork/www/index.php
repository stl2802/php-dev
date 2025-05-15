<?php
spl_autoload_register(function (string $className) {
    $filePath = __DIR__.'/../src/'.str_replace('\\', '/', $className).'.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        throw new Exception("Файл класса не найден: ".$filePath);
    }
});

$route = $_GET['route'] ?? '';

$routesFile = 'route.php';
if (!file_exists($routesFile)) {
    die('Файл маршрутов не найден');
}

$routes = require $routesFile;

$matched = false;
foreach ($routes as $pattern => $handler) {
    if (preg_match($pattern, $route, $matches)) {
        $matched = true;
        [$controllerClass, $method] = $handler;

        try {
            $controller = new $controllerClass();
            $controller->$method($matches[1] ?? null);
        } catch (Throwable $e) {
            die('Ошибка при выполнении контроллера: '.$e->getMessage());
        }
        break;
    }
}

if (!$matched) {
    http_response_code(404);
    die('Страница не найдена');
}
?>