<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Db\Db;
use MyProject\Models\Users\WorkCookiesUser;
use MyProject\Models\Todo\Todo;
use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\RoutException;

/**
 * ListsController  контроллер для работы с list
 */

class ListsController extends AbstractController 
{

    public function addCase()
    {

        if(empty($this->user[0])){
            throw new RoutException('такого адреса не существует');
        }

        if($_POST){

            try{

                $data = Todo::addCaseData($_POST);
                
            header('Location: /', true, 302);

            }catch(RoutException $e){

                throw new RoutException('Такого адреса не существует');
                
            }

        }

    }

    public function deleteCase(int $id): void
    {
        if(empty($this->user[0])){

            throw new RoutException('не верный роут');
            
        }

        $res = Todo::deleteCase($id);

        header('Location: / ', true, 302);
        exit();
        
    }


}

?>