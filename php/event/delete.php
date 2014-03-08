<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../inc/events.php";
$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
$event_id = $_GET['event_id'];
echo $event_id;
$query = "DELETE FROM event WHERE id='" . $event_id . "'";
echo $query;
mysql_query($query) or die("delete fail" . mysql_error());
?>
