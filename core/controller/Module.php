<?php

class Module {
    public static $module;
    public static $view;
    public static $message;

    public static function setModule($module) {
        self::$module = $module;
    }

    public static function loadLayout() {
        include "core/modules/" . self::$module . "/view/layout.php";
    }

    // Validación del módulo
    public static function isValid() {
        $valid = false;
        $folder = "core/modules/" . self::$module;

        if (is_dir($folder)) {
            $valid = true;
        } else {
            self::$message = "<b>404 NOT FOUND</b> Module <b>" . self::$module . "</b> folder  !!";
        }

        return $valid;
    }

    public static function error() {
        echo self::$message;
        die();
    }
}
