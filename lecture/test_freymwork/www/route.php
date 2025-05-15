<?php
return [
    '~^hello/(.*)$~' => [\controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\controllers\MainController::class, 'sayBye'],
    '~^$~' => [\controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [controllers\ArticlesController::class, 'delete'],
    '~^articles/(\d+)/comment/add$~' => [controllers\CommentsController::class, 'add'],
    '~^articles/\d+/comment/(\d+)/edit$~' => [controllers\CommentsController::class, 'edit'],
    '~^articles/\d+/comment/(\d+)/delete$~' => [controllers\CommentsController::class, 'delete'],
    '~^(.*)$~' => [\controllers\MainController::class, 'catchAll'],
];