<?php
/**
 * роутинг
 */
return [
    '~^$~'=>[ \MyProject\Controllers\MainController::class, 'main'],
    '~^avto$~'=>[ \MyProject\Controllers\UserController::class, 'autoMethod'],
    '~^reg$~'=>[ \MyProject\Controllers\UserController::class, 'registrMethod'],
    '~^auth$~'=>[ \MyProject\Controllers\UserController::class, 'authorizationUser'],
    '~^logout$~'=>[ \MyProject\Controllers\UserController::class, 'clearCookies'],
    '~^delete/(\d+)$~'=>[ \MyProject\Controllers\ListsController::class, 'deleteCase'],
    '~^addCase$~'=>[ \MyProject\Controllers\ListsController::class, 'addCase'],
];




?>