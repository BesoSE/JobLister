<?php 

session_start();

require_once 'system-helper.inc.php';



spl_autoload_register('myAutoLoader');

function myAutoLoader($className){

    $path='classes/';
    $extension='.class.php';


    include_once $path . $className . $extension;


}


?>