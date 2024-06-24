<?php

/**
 * фронт контроллер
 */

try{
spl_autoload_register(function(string $className){
    require_once __DIR__ .'/app/'. str_replace('\\', '/', $className) . '.php';
});


$route = $_GET['route'];

$regulControllerMethod = require __DIR__ .'/app/MyProject/routes.php';

$element = false;

foreach($regulControllerMethod as $regular => $controllerMethod)
{

    preg_match($regular, $route, $matches);

    if(!empty($matches)){
        $element = true;

        break;

    }
}


if($element === false){

    throw new \MyProject\Exceptions\RoutException('такого адреса не существует');
    
}

unset($matches[0]);

$controllerSring = $controllerMethod[0];
$controller = new $controllerSring();
$method = $controllerMethod[1];

echo $controller->$method(...$matches);


}

/**
 * ошибки 
 */

catch(\MyProject\Exceptions\DbException $e){
    $obj = new \MyProject\View\View(__DIR__ .'/templates');
    $obj->renderTemplates('error/500.php', ['error'=>$e->getMessage()], 500);

}

catch(\MyProject\Exceptions\RoutException $e){
    $obj = new \MyProject\View\View(__DIR__ .'/templates');
    $obj->renderTemplates('error/401.php', ['error'=>$e->getMessage()], 404);
}


?>