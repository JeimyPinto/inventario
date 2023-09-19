<?php

//define('LBROOT', getcwd()); // LegoBox Root ... the server root
require_once("core/controller/Database.php");

if (Session::getUID() == "") {
	$user = $_POST['mail'] ?? '';
	$pass = sha1(md5($_POST['password'] ?? ''));

	$base = new Database();
	$con = $base->connect();

	$sql = "SELECT * FROM user WHERE (email = ? OR username = ?) AND password = ? AND is_active = 1";
	$stmt = $con->prepare($sql);
	$stmt->bind_param("sss", $user, $user, $pass);
	$stmt->execute();
	$result = $stmt->get_result();

	$found = false;
	$userid = null;

	while ($r = $result->fetch_assoc()) {
		$found = true;
		$userid = $r['id'];
	}

	if ($found == true) {
		session_start();
		$_SESSION['user_id'] = $userid;
		// setcookie('userid', $userid);
		// print $_SESSION['userid'];
		echo "Cargando ... $user";
		echo "<script>window.location='index.php?view=home';</script>";
	} else {
		echo "<script>window.location='index.php?view=login';</script>";
	}
} else {
	echo "<script>window.location='index.php?view=home';</script>";
}
