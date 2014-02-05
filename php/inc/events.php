<?php

	/*
	*	Returns the recent list of events
	*/
	function get_events_recent(){
		require(ROOT_PATH . "inc/database.php");

	    try {
	        $query = "SELECT * FROM event WHERE 1 ORDER BY event_time";
		    $result = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }

	    $recent = $results->fetchAll(PDO::FETCH_ASSOC);
	    $recent = array_reverse($recent);

	    return $recent;

	}
	

?>