<?php
session_start();

// Eliminamos la variable de sesión 'user_id' si existe
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

// Destruimos la sesión
session_destroy();

// Redirigimos al usuario al índice
header('Location: ./');
exit();
