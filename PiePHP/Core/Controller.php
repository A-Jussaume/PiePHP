<?php

namespace Core;

class Controller
{
    static $_render;
    
    public function __construct()
    {
        $request = new Request;
    }

    protected function render ($view, $scope = []) {

        extract($scope);

        $parameter = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View' , str_replace('Controller', "" ,basename(get_class($this))), $view]) . '.php';
        $parameter = str_replace("\\", "", $parameter);
        
        if(file_exists($parameter)) 
        {
            ob_start();
            include ($parameter);
            $view = ob_get_clean();
                  
            ob_start();
            include (implode (DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');

            self::$_render = ob_get_clean();
            echo self::$_render;        
        }
    }
}

?>
