<?php
include '../Apps/boostrap.php';


/**
 * Delete csdl
 */
//$a = new Apps_Models_Users();
//$a->buildQueryParams([
//    "where"=>"id = 10"
//])->delete();


/**
 * Insert csdl
 */
//$result = $a->buildQueryParams([
//    "fields"=>"(cate_id,name,description,content,created_by) values (?,?,?,?,?)",
//    "value"=>[ 1,"dan tri","bao moi hom nay",'dantri24h',1]
//    ])->insert();


/**
 * Update csdl
 */
//$a = new Apps_Models_Users();
//$mk = md5(123456);
//$result = $a->buildQueryParams([
//    "value"=>"userName = 'chinhAdmin' , password = '$mk' ",
//    "where"=>"id = 1"
//])->update();
//die();




$router = new Apps_Libs_Router(__DIR__);
$router->router();
?>