<?php

namespace MyProject\View;

/**
 * шаблонизатор
 */

class View
{
    private $templatePath;
    private $userCheck;

    public function __construct(string $templatePath)
    {

        $this->templatePath = $templatePath;    

    }

    public function userInfo($name, $userCheck): void
    {

        $this->userCheck[$name] = $userCheck;    

    }

    public function renderTemplates(string $path, array $vars, int $per = 200): void
    {
        
        http_response_code($per);
        
        extract($vars);
        extract($this->userCheck);
        
        ob_start();

        include $this->templatePath.'/'.$path;
        $res = ob_get_contents();
        ob_end_clean();

        echo $res;

    }
}


?>