<?php
class BoxData
{
    public static $tablename = "box";
    public  $id = "";
    public  $name = "";
    public  $created_at = "";

    public function __construct()
    {
        $this->created_at = "NOW()";
    }

    public function add()
    {
        $sql = "INSERT INTO box (created_at) ";
        $sql .= "VALUES ($this->created_at)";
        return Executor::execute($sql);
    }

    public static function delById($id)
    {
        $sql = "DELETE FROM " . self::$tablename . " WHERE id = $id";
        Executor::execute($sql);
    }

    public function del()
    {
        $sql = "DELETE FROM " . self::$tablename . " WHERE id = $this->id";
        Executor::execute($sql);
    }

    public function update()
    {
        $sql = "UPDATE " . self::$tablename . " SET name = \"$this->name\" WHERE id = $this->id";
        Executor::execute($sql);
    }

    public static function getById($id)
    {
        $sql = "SELECT * FROM " . self::$tablename . " WHERE id = $id";
        $query = Executor::execute($sql);
        $found = null;
        $data = new BoxData();
        while ($r = $query[0]->fetch_array()) {
            $data->id = $r['id'];
            $data->created_at = $r['created_at'];
            $found = $data;
            break;
        }
        return $found;
    }

    public static function getAll()
    {
        $sql = "SELECT * FROM " . self::$tablename;
        $query = Executor::execute($sql);
        $array = array();
        $cnt = 0;
        while ($r = $query[0]->fetch_array()) {
            $array[$cnt] = new BoxData();
            $array[$cnt]->id = $r['id'];
            $array[$cnt]->created_at = $r['created_at'];
            $cnt++;
        }
        return $array;
    }

    public static function getLike($q)
    {
        $sql = "SELECT * FROM " . self::$tablename . " WHERE name LIKE '%$q%'";
        $query = Executor::execute($sql);
        $array = array();
        $cnt = 0;
        while ($r = $query[0]->fetch_array()) {
            $array[$cnt] = new BoxData();
            $array[$cnt]->id = $r['id'];
            $array[$cnt]->created_at = $r['created_at'];
            $cnt++;
        }
        return $array;
    }
}
