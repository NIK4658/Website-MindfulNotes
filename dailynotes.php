<?php
//Database Conection
require_once './database/bootstrap.php';

$templateParams["Type"] = "DailyNotes";
$templateParams["Contents"] = $dbh->getRandomQuotesWithData(5);
require 'base.php';
?>