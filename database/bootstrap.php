<?php
session_start();
require_once("database.php");
$dbh = new DatabaseHelper('address', 'username', 'password', 'database');
?>