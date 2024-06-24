<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Db\Db;
use MyProject\Models\Users\WorkCookiesUser;

/**
 * AbstractController  контроллер с общими методами
 */


class AbstractController 
{
    protected $data;
    protected $user;
    protected $view;
    

    public function __construct()
    {
        $this->user = WorkCookiesUser::checkCookieUser();
        $this->view = new View(__DIR__ .'/../../../templates');
        $this->view-> userInfo('user', $this->user);
        

    }
}


?>