<?php
//get the user information from a userid
require_once 'database.php';
date_default_timezone_set('America/New_York'); 

function get_user_info($uid){
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM userinfo WHERE userid =" . $uid;
		    $results = mysql_query($query) or die($query);

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	    }
		$recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	array_push($recent, $row);
	    }

	    return $recent;

	}

	function get_user_info_json($uid){
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM userinfo WHERE userid =" . $uid;
		    $results = mysql_query($query) or die($query);

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	    }
		$recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	array_push($recent, $row);
	    }

	    return $recent;

	}


?>