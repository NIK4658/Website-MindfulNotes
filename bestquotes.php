<?php
//Database Conection
require_once './database/bootstrap.php';

$templateParams["Type"] = "BestQuotes";
$templateParams["Contents"] = $dbh->getBestQuotes();
require 'base.php';
?>