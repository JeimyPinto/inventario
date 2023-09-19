<?php

class Core {

    public static function loadModule($module) {
        if (!isset($_GET['module'])) {
            Module::setModule($module);
            include "core/modules/" . $module . "/init.php";
        } else {
            Module::setModule($_GET['module']);
            if (Module::isValid()) {
                include "core/modules/" . $_GET['module'] . "/init.php";
            } else {
                Module::Error();
            }
        }
    }

    public static function redirect($url) {
        echo "<script>window.location=\"$url\";</script>";
        exit;
    }
}
