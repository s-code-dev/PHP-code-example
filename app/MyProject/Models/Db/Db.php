<?php

namespace MyProject\Models\Db;

use MyProject\Exceptions\DbException;

/**
 * Db класс подключения  БД
 */

class Db
{

    private $pdo;
    private static $connect;


    public function __construct()
    {


        $data = require __DIR__ .'/../../setings.php';

        try{

            $this->pdo = new \PDO($data['DB_DRIVER'].':host='.$data['DB_HOST'].';dbname='.$data['DB_NAME'], $data['DB_USER'], $data['DB_PASSWORD']);
            $this->pdo->exec('SET NAMES UTF8');

        }catch(\PDOException $e){
            throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }

    }

    public static function getInstanse()
    {
        if(self::$connect == null){
                self::$connect = new self;
        }

        return self::$connect;
    }

    public function query(string $sql, array $data)
    {    

        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($data);

        if($result == false){
            return null;
        }

        return $sth->fetchAll();

    }
    }

