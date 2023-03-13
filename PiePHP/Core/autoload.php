<?php

spl_autoload_register(function ($class)
{
    $str_class = str_replace("\\", "/", $class);

    $Core = $str_class . ".php";
    $Controllers_Models_View = "src/" . $str_class . ".php";  

    if (file_exists($Core))
    {
        include $Core; 
    }
    if (file_exists($Controllers_Models_View))
    {
        include $Controllers_Models_View;
    }
})

?>