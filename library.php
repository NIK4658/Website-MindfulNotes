<?php
//Database Conection
require_once './database/bootstrap.php';

$templateParams["Type"] = "Library";
$templateParams["Contents"] = $dbh->getAllBooks();
require 'base.php';
?>