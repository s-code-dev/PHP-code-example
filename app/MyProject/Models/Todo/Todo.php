<?php

namespace MyProject\Models\Todo;

use MyProject\Models\Db\Db;
use MyProject\Exceptions\ValidateRegistrateExamination;
use MyProject\Models\AbstractClassMain;

/**
 * Todo  класс для работы с таблицей todo в БД
 */

class Todo extends AbstractClassMain
{


    public static function getAffairsIfId( int $idUser)
    { 
        $db = Db::getInstanse();
        $sql = "SELECT * FROM `todo` WHERE `user_id`= ?";
        $array = [$idUser];
        $res = $db->query($sql, $array);
        

        if($res){

            return $res;

        }else{
            
            return null;

        }


    }

    public static function deleteCase(int $id): bool
    {
        $db = Db::getInstanse();
        $sql = 'DELETE FROM `todo` WHERE id = ?';
        $arr = [$id];
        $db->query($sql, $arr);

        return true;
        

    }

    public static function addCaseData(array $data)
    {
        
        $db = Db::getInstanse();
        $sql = 'INSERT INTO `todo` (`user_id`, `case`) VALUES (?, ?)';
        $arr = [$data['user_id'], $data['case']];
        $db->query($sql, $arr);

        return true;
        
    }


}







?>