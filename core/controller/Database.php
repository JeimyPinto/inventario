<?php
class Database
{
	private static $db;
	private static $con;
	private $user = "root";
	private $pass = "";
	private $host = "localhost";
	private $ddbb = "inventiolite";

	public function __construct()
	{
	}

	public static function getCon()
	{
		if (self::$con == null && self::$db == null) {
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}

	public function connect()
	{
		$con = new mysqli($this->host, $this->user, $this->pass, $this->ddbb);

		if ($con->connect_error) {
			die("Error de conexión: " . $con->connect_error);
		}
		return $con;
	}
}
