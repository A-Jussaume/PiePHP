<?php

namespace Core;

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
    self::$routes [$url] = $route;
    }

    public static function get($url)
    {   
        if(isset(self::$routes[$url]))
        {
            return self::$routes[$url];       }    
        // retourne un tableau associatif contenant
        // - le controller a instancier
        // - la methode du controller a appeler 
        }
}

?>