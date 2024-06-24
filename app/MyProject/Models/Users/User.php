<?php

namespace MyProject\Models\Users;

use MyProject\Models\Db\Db;
use MyProject\Exceptions\ValidateRegistrateExamination;
use MyProject\Models\AbstractClassMain;

/**
 * User класс для работы с пользователями
 */

class User extends AbstractClassMain
{
    
    public static function createReistrUser(array $data): void
    {
        if(empty($data['nik'])){

            throw new ValidateRegistrateExamination('вы не передали никнейм');

        }if(empty($data['password'])){

            throw new ValidateRegistrateExamination('вы не передали пароль');

        }if(empty($data['email'])){

            throw new ValidateRegistrateExamination('вы не передали email');
            
        }if(!preg_match('/^[a-zA-Z0-9]+$/', $data['nik'])){

            throw new ValidateRegistrateExamination('Никнейм должен быть задан из латинских букв');

        }if(mb_strlen($data['password']) < 3){

            throw new ValidateRegistrateExamination('пароль должен буть 3 симболов');

        }if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){

            throw new ValidateRegistrateExamination('вы не правильно ввели email');

        }if(User::checkNicknameAndEmail( 'users', 'email', $data['email'])){

            throw new ValidateRegistrateExamination('такой email уже занят');

        }if(User::checkNicknameAndEmail( 'users', 'nikname', $data['nik'])){

            throw new ValidateRegistrateExamination('такой nikname уже занят');
        }
         
        $nik = $data['nik'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $hash = sha1(random_bytes(100)).sha1(random_bytes(100));
        $role = 0;

        $sql = "INSERT INTO `users` (`nikname`, `email`, `password`, `role`, `hash`) VALUES (?, ?, ?, ?, ?)";
        $data = [$nik, $email, $password, $role, $hash  ];


        $db = Db::getInstanse();

        $db->query($sql, $data);
    }


    public static function checkNicknameAndEmail(string $table, string $name,  $data)
    {
        $db = Db::getInstanse();
        $sql = "SELECT * FROM $table WHERE $name= ?";
        $array = [$data];
        $res = $db->query($sql, $array);
    //    var_dump($res);

        if($res)
        {
            return $res;

        }else{
            return false;

        }

    }


    public static function CheckAuthUser(array $data)
    {
        if(empty($data['password'])){

            throw new ValidateRegistrateExamination('вы не передали пароль');

        }if(empty($data['email'])){

            throw new ValidateRegistrateExamination('вы не передали email');

        }if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){

            throw new ValidateRegistrateExamination('вы не правильно ввели email');

        }if(mb_strlen($data['password']) < 3){

            throw new ValidateRegistrateExamination('пароль должен буть 3 симболов');

        }if(!User::checkNicknameAndEmail( 'users', 'email', $data['email'])){

            throw new ValidateRegistrateExamination('такого пользователя не существует проверте email');

        }if(!(password_verify($data['password'], self::checkPassword($data['email'])[0]['password']))){
            throw new ValidateRegistrateExamination('не верный пароль');
        }


            return User::checkPassword($data['email'])[0];


    }


    public static  function checkPassword($email)
    {

        $db = Db::getInstanse();
        $sql = "SELECT * FROM `users` WHERE email= ?";
        $array = [$email];
        $res = $db->query($sql, $array);

        if($res){

            return $res;

        }else{
            return false;
        }

    }
}





?>