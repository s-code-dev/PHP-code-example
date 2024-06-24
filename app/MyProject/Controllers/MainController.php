<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Db\Db;
use MyProject\Models\Users\WorkCookiesUser;
use MyProject\Controllers\AbstractController;
use MyProject\Models\Todo\Todo;

/**
 * MainController  контроллер для  основной страници 
 */

class MainController extends AbstractController 
{

    public function main()
    {
        
        if(empty($this->user[0])){
        
            $this->view->renderTemplates('main/main.php', ['title'=>'To do list']);
            return;

        }

            $case = Todo::getAffairsIfId($this->user[0]['id']);
        
            $this->view->renderTemplates('main/main.php', ['title'=>'To do list','case'=>$case]);
            return;
               
    }
 
}

?>