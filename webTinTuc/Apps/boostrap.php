<?php

// spl_autoload_register(function($class_name){
//     var_dump($class_name);
//     // die('chay vao day');
// });
function __autoload($class_name){
    $exp = str_replace('_','/',$class_name);
    $path = str_replace('Apps',"",dirname(__FILE__));
    include_once $path.$exp.'.php';

}

?>