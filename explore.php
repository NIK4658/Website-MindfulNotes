<?php
//Database Conection
require_once './database/bootstrap.php';

$templateParams["Type"] = "Explore";
$templateParams["Contents"] = $dbh->getAllQuotes();
require 'base.php';
?>