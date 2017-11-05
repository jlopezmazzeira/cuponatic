<?php
namespace App\Lib;

use FluentPDO,
    PDO;

class Database{
    public static function StartUp(){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=cuponatic;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return new FluentPDO($pdo);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}