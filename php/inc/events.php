<?php

	/*
	*	Returns the recent list of events
	*/
	function get_events_recent(){
		require "inc/database.php";
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE 1 ORDER BY event_time";
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	array_push($recent, $row);
	    }

	    return $recent;

	}


?>