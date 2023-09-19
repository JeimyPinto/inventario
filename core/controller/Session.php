<?php

/**
 * 1 de agosto del 2013
 * Esta función contiene el nombre de los identificadores que se usarán como variables de sesión
 * y también los métodos correspondientes de establecimiento y obtención.
 **/

class Session
{
	public static function setUID($uid)
	{
		$_SESSION['user_id'] = $uid;
	}

	public static function unsetUID()
	{
		if (isset($_SESSION['user_id'])) {
			unset($_SESSION['user_id']);
		}
	}

	public static function issetUID()
	{
		return isset($_SESSION['user_id']);
	}

	public static function getUID()
	{
		return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	}
}
