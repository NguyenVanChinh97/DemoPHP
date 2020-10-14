<?php

class Apps_Models_Users extends Apps_Libs_DbConnection{
    protected $tableName = "users";
    function __construct()
    {
        parent::__construct();
        var_dump("------Models_Users---");
    }
    
}

?>