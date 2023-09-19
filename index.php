<?php
// Define la constante ROOT si no se ha definido previamente
if (!defined("ROOT")) {
    define("ROOT", "slidle");
}

// Incluye el archivo de autoloading (autoload.php)
include "core/autoload.php";

// Carga el módulo "ventas" utilizando la clase Core
Core::loadModule("ventas");
