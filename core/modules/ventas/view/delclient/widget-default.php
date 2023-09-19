<?php

$client = PersonData::getById($_GET["id"]);
$client->del();
Core::redirect("./index.php?view=clients");

?>