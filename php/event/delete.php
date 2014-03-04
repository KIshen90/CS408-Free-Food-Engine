<?php
require_once "../inc/events.php";
$event_id = $_GET['event_id'];
$query = "DELETE FROM event WHERE id='" . $event_id . "'";
mysql_query($query) or die("delete fail");
?>
