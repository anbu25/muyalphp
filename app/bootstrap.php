<?php
    //DB Param
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'share_posts');

    //Load config file 
    require_once 'config/config.php';
    //Load libraries & also auto loading files.
/*    require_once 'libraries/core.php';
    require_once 'libraries/controller.php';
    require_once 'libraries/database.php';
*/
    //auto load function to load all the default libraries.
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });