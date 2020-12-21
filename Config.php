<?php
class Config  
{
    private static $parameter;
    public static function get($nom,$defaultValue){
        if(isset(self::getParameter()[$nom])){
            $value = self::getParameter()[$nom];
        }else {
            $value = $defaultValue;
        }
        return $defaultValue;
    }

    private static function getParameter(){
        if(self::$parameter == null){
            $file = "prod.ini";
            if (!file_exists($file)) {
                $file = "dev.ini";
            }
            if (!file_exists($file)) {
                throw new Exception("No configuration file found");
            }else {
                self::$parameter = parse_ini_file($file);
            }
        }
        return self::$parameter;
    }
}

?>