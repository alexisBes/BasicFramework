<?php
require_once 'Config.php';

abstract class Model {
    private $db;

    protected function request($sql, $param = NULL){
        if($param == NULL)
        {
            $result = $this->getDB()->query($sql);
        }else {
            $result = $this->getDB()->prepare($sql);
            $result->execute($param);
        }
        return $result;
    }

    private static function getDB(){
        if(self::$db == null){
            $dsn = Config::get("info");
            $user = Config::get("user");
            $password = Config::get("password");

            self::$bdd = new PDO($dsn,$user, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }
}

?>