<?php require_once("../encode.inc.php"); $url=decode($_SERVER['QUERY_STRING']); header("Location: $url"); ?>