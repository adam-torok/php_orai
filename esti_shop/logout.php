<?php
session_start();
//unset($_SESSION['user']);
session_destroy(); //munkamenet megsemmisítése
header("Location: index.php"); //átirányítás a kezdőlapra