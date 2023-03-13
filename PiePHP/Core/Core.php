<?php

namespace Core;

class Core
{
    public function run()
    {
        include "src/routes.php";
        // echo __CLASS__ . "[OK]" . PHP_EOL . "<br><br>";

        $base_uri = str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]);
        $url = "/" . str_replace($base_uri, "", $_SERVER['REQUEST_URI']);
        $route = Router::get($url);
        // var_dump($route);

        if ($route == NULL)
        {
            echo "404";
            return;
        }

        if (method_exists("Controller" . "\\" . ucfirst($route["controller"]) . "Controller", $route['action'] . "Action")) 
        {
            $Controller = "Controller" . "\\" . ucfirst($route["controller"]) . "Controller";
            $Action = $route["action"] . "Action";

            $controller = new $Controller;
            $controller->$Action();
        }
    }

        // $base_uri = str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]);
        // $route = str_replace($base_uri, "", $_SERVER['REQUEST_URI']);

        // $route = explode("/", $route);

        // $Controller = $route[0];
        // $Controller = "Controller" . "\\" . ucfirst($Controller) . "Controller";

        // if (class_exists($Controller)) {
        //     if (isset($route[0]) && isset($route[1])) {
        //         $Action = $route[1];
        //         $Action = $Action . "Action";

        //         if (method_exists($Controller, $Action)) {
        //             $controller = new $Controller();
        //             $controller->$Action();
        //         } else {
        //             echo "404 not found";
        //         }
        //     } elseif (isset($route[0]) && !isset($route[1])) {

        //         $controller = new $Controller();
        //         $controller->indexAction();
        //     } else {
        //         echo "404 not found";
        //     }
        // } elseif ($route[0] == "") {
        //     $App = "Controller" . "\\" . "AppController";
        //     $app = new $App();
        //     $app->indexAction();
        // } else {
        //     echo "404 not found";
        // }
    // }   
}
