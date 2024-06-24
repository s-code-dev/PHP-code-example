<?php
namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Exception\Db;
use MyProject\Models\Users\User;
use MyProject\Exceptions\ValidateRegistrateExamination;
use MyProject\Models\Users\WorkCookiesUser;
use MyProject\Controllers\AbstractController;

/**
 * UserController  контроллер для работы с пользователем 
 */

class UserController extends AbstractController 
{

    public function autoMethod()
    {

         $this->view->renderTemplates('users/authorization.php', []);

    }

    public function registrMethod()
    {

        if(!empty($_POST)){

            try{

            $data = User::createReistrUser($_POST);

            }catch(ValidateRegistrateExamination $e){

                $this->view->renderTemplates('users/registration.php', ['error' => $e->getMessage()]);
                return;
            }      

        }

         $this->view->renderTemplates('users/registration.php', []);

    }



    public function authorizationUser():void
    {

        if(!empty($_POST)){
            
            try{

                $data = User::CheckAuthUser($_POST);
                

            }catch(ValidateRegistrateExamination $e){
                $this->view->renderTemplates('users/authorization.php', ['error' => $e->getMessage()]);
                return;
            }

            
            if($data !== null){
                
                WorkCookiesUser::makeCookies($data);
                
            }
        }

    }
    public function clearCookies()
    {  
        setcookie('token', '', -1, '/', false, '', true);
        header('Location: /', true, 302);
        exit();
    }

}

?>