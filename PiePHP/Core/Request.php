<?php
    namespace Core;

    class Request
    {
        public function __construct()
        {
            if(!empty($_GET))
            {
                foreach($_GET as $key => $get)
                {
                    $_GET[$key] = trim(stripslashes(htmlspecialchars($get)));
                }
            }
            if(!empty($_POST))
            {
                foreach($_POST as $key => $post)
                {
                    $_POST[$key] = trim(stripslashes(htmlspecialchars($post)));
                }
            }
        }
    }
?>