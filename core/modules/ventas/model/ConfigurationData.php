<?php
class ConfigurationData {
    public static $tablename = "configuration";
    public $created_at;
    public $name;
    public $id;
    public $lastname;
    public $email;
    public $password;
    public $val;
    public function __construct(){
        $this->created_at = "NOW()";
    }

    public function add(){
        $sql = "INSERT INTO user (name,lastname,email,password,created_at) ";
        $sql .= "VALUES (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->password\",$this->created_at)";
        Executor::execute($sql);
    }

    public static function delById($id){
        $sql = "DELETE FROM ".self::$tablename." WHERE id = $id";
        Executor::execute($sql);
    }

    public function del(){
        $sql = "DELETE FROM ".self::$tablename." WHERE id = $this->id";
        Executor::execute($sql);
    }

    public function update(){
        $sql = "UPDATE ".self::$tablename." SET val=\"$this->val\" WHERE id = $this->id";
        Executor::execute($sql);
    }

    public static function getById($id){
        $sql = "SELECT * FROM ".self::$tablename." WHERE id = $id";
        $query = Executor::execute($sql);
        $found = null;
        $data = new ConfigurationData();
        while($r = $query[0]->fetch_array()){
            $data->id = $r['id'];
            $data->name = $r['name'];
            $data->lastname = $r['lastname'];
            $data->email = $r['email'];
            $data->password = $r['password'];
            $data->created_at = $r['created_at'];
            $found = $data;
            break;
        }
        return $found;
    }

    public static function getByMail($mail){
        $sql = "SELECT * FROM ".self::$tablename." WHERE email=\"$mail\"";
        $query = Executor::execute($sql);
        $array = array();
        $cnt = 0;
        while($r = $query[0]->fetch_array()){
            $array[$cnt] = new ConfigurationData();
            $array[$cnt]->id = $r['id'];
            $array[$cnt]->name = $r['name'];
            $array[$cnt]->lastname = $r['lastname'];
            $array[$cnt]->email = $r['email'];
            $array[$cnt]->password = $r['password'];
            $array[$cnt]->created_at = $r['created_at'];
            $cnt++;
        }
        return $array;
    }

    public static function getAll(){
        $sql = "SELECT * FROM ".self::$tablename;
        $query = Executor::execute($sql);
        $array = array();
        $cnt = 0;
        while($r = $query[0]->fetch_array()){
            $array[$cnt] = new ConfigurationData();
            $array[$cnt]->id = $r['id'];
            $array[$cnt]->short = $r['name'];
            $array[$cnt]->name = $r['name'];
            $array[$cnt]->kind = $r['kind'];
            $array[$cnt]->val = $r['val'];
            $cnt++;
        }
        return $array;
    }

    public static function getLike($q){
        $sql = "SELECT * FROM ".self::$tablename." WHERE name LIKE '%$q%'";
        $query = Executor::execute($sql);
        $array = array();
        $cnt = 0;
        while($r = $query[0]->fetch_array()){
            $array[$cnt] = new ConfigurationData();
            $array[$cnt]->id = $r['id'];
            $array[$cnt]->name = $r['name'];
            $array[$cnt]->mail = $r['mail'];
            $array[$cnt]->password = $r['password'];
            $array[$cnt]->created_at = $r['created_at'];
            $cnt++;
        }
        return $array;
    }
}
