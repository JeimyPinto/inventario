<?php
require_once "Database.php";
class Executor {

    public static function execute($sql) {
        $con = Database::getCon();
        $result = $con->query($sql);

        if ($result === false) {
            throw new Exception("Error en la consulta SQL: " . $con->error);
        }

        return [$result, $con->insert_id];
    }
}
