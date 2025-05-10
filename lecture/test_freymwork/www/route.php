<?php
return [
    '~^hello/(.*)$~' => [\controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\controllers\MainController::class, 'sayBye'],
    '~^$~' => [\controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\controllers\ArticlesController::class, 'view'],
    '~^(.*)$~' => [\controllers\MainController::class, 'catchAll'],
];