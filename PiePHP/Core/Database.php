<?php
     
namespace Core;

class Database
{
    public static function database()
    {
        try 
        {
            $_db = new \PDO("mysql:host=localhost;dbname=PiePHP;charset=UTF8", "aurelien", "root", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $_db;
        } 
        catch (\Exception $e) 
        {
            die("Erreur : " . $e->getMessage());
        }
    }
}

?>
