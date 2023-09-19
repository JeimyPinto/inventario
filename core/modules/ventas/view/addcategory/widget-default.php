<?php

if (count($_POST) > 0) {
    $user = new CategoryData();
    $user->name = $_POST["name"];
    $user->add();

    echo "<script>window.location='index.php?view=categories';</script>";
}
