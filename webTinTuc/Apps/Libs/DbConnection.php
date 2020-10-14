<?php
// namespace Apps\Libs;
/**
 * class ket noi database
 * 
 * @date
 * @version
 * @author
 */
class Apps_Libs_DbConnection{
    protected $username = 'chinhnv';
    protected $password = '#Chinh11081997';
    protected $database = "tintuc";
    protected $host = 'localhost';
    protected $tableName;
    protected $queryParam = [];

    protected static $connectionInstance = null;


    /***
     * Apps_Libs_DbConnection constructor.
     * khoi tao ket noi khi duoc tao 1 doi tuong moi
     */
    public function __construct()
    {
        $this->connect();
    }


    /**
     * tao ket noi database
     * 
     * @return new PDOs
     */
    public function connect(){
        if(self::$connectionInstance === null){
            try{
                self::$connectionInstance = new PDO("mysql:host=$this->host;dbname= tintuc",
                $this->username,$this->password);
                self::$connectionInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo 'Connected successfully';
            }catch(Exception $e){
                echo "Connection failed".$e->getMessage();
            }
        }else{
            return self::$connectionInstance;
        }
    }

    /**
     * 
     * @param type $sql
     * @param type $param
     * @return type
     * 
     */

     public function query($sql,$param = []){
         $q = self::$connectionInstance->prepare($sql);
         if(is_array($param) && $param){
             $q->execute($param);
         }else{
             $q->execute();
             echo "execute success";
             die();
         }
         return $q;
     }

     /**
      * 
      */

      public function buildQueryParams($param){
          $defaul = [
              "select"=>"*",
              "where" => "",
              "other"=>"",
              "param"=>"",
              "fields"=>"",
              "value"=>[]
          ];
          $this->queryParam = array_merge($defaul,$param);
          return $this;
      }

      public function builCondition($condition){
          if(trim($condition)){
              return "where ".$condition;
          }
          return "";
      }

    /**
     * @return mixed
     * ham select all (lay tat ca du lieu trong bang)
     */
      public function select(){
        $sql = "select ".$this->queryParam["select"]." from ".$this->tableName.
        " ".$this->builCondition($this->queryParam["where"])." ".$this->queryParam["other"];
        $query =  $this->query($sql,$this->queryParam["param"]);
        // var_dump($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
      }


    /**
     * @return array|mixed
     * ham select 1 doi tuong(lay 1 doi tuong trong bang csdl)
     */
      public function selectOne(){
        $this->queryParam["other"] = "limit 1";
        $data = $this->select();
        if($data){
            return $data[0];
        }
        return [];
      }


    /**
     * @return false
     * ham insert du lieu vao bang trong csdl
     */
      public function insert(){
        $sql = "insert into ".$this->tableName." ".$this->queryParam["fields"];
        $result = $this->query($sql,$this->queryParam["value"]);
        if($result){
            return self::$connectionInstance->lastInsertId();
            echo "inserted success";
        }else{
            return false;
            echo "insert failed";
        }
      }


    /**
     * @return type
     *
     * ham update 1 doi tuong trong bang csdl
     */
      public function update(){
        $sql = "update ".$this->tableName." set ".$this->queryParam["value"].
        " ".$this->builCondition($this->queryParam["where"])." ".$this->queryParam["other"];
        return $this->query($sql);
    }


    /**
     * @return type
     * ham delete 1 doi tuong trong bang csdl
     */
    public function delete(){
        $sql = "delete from ".$this->tableName." ".$this->builCondition($this->queryParam["where"]).
        " ".$this->queryParam["other"];
        return $this->query($sql);
    }
}

?>