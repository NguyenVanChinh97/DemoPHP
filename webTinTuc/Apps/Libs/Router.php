<?php
class Apps_Libs_Router{
    const PARAM_NAME ="r";
    const HOME_PAGE = "Home";
    const INDEX_PAGE = "index";

    public static  $sourcePath;

    public function __construct($sourcePath)
    {

        if($sourcePath){
            self::$sourcePath= $sourcePath;

        }
    }

    public function getGET($name=null){

        if($name !==null){
            return $_GET[$name];
        }
        return  $_GET;
    }

    public function getPOST($name=null){
        if($name !==null){
            return $_POST[$name];
        }
        return  $_POST;
    }

    public function router(){
        $url = $this->getGET(self::PARAM_NAME);
        if(!is_string($url) ||!$url||$url==self::INDEX_PAGE){
            $url = self::HOME_PAGE;
        }
        $path = self::$sourcePath."/".$url.".php";

        if(file_exists($path)){
            return include_once $path;
        }else{
            return $this->pageNotFound();
        }
    }

    public function pageNotFound(){
        echo "404 Page Not Found";
        die();
    }

    /**
     * Tao ra url , va mang truyen len url
     */
    public function createUrl($url,$param=[]){
        if ($url){
            $param[self::PARAM_NAME] = $url;
        }
        return $_SERVER['PHP_SELF'].'?'.http_build_query($param);
    }


    /**
     * Ham chuyen sang trang khac
     */
    public function redirect($url){
        $u = $this->createUrl($url);
        header("Location:$u");
    }

    /**
     * Ham chuyen ve trang Home
     */
    public function homePage(){
        $this->redirect(self::HOME_PAGE);
    }

    public function loginPage(){
        $this->redirect("Login");
    }
}
