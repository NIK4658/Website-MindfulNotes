<?php
//Database Conection
require_once './database/bootstrap.php';

$templateParams["Type"] = "Book";
$templateParams["Contents"] = $dbh->getQuotesFromBookID($_GET["id"]);
require 'base.php';
?>