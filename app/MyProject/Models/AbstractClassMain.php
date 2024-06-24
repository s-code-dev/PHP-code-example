<?php

namespace MyProject\Models;
use MyProject\Models\Db\Db;

/**
 * AbstractClassMain получить пользователя по id
 */

class AbstractClassMain{
  

    public static function getById(int $id): array
    {
        $pdo = $pdo = Db::getInstanse();
        $sql = 'SELECT * FROM `users` WHERE id = :id';
        $data = [':id'=> $id];
        $res = $pdo->query($sql, $data);

        if($res !== null){

            return $res;
        }



    }
}


?>