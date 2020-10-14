<?php
class Apps_Models_Categories extends Apps_Libs_DbConnection{
    protected $tableName = "categories";
    public function __construct()
    {
        parent::__construct();
        var_dump("----chay vao categories");
    }

    function show(){
        var_dump("---chay duoc categories");
    }

}
?>