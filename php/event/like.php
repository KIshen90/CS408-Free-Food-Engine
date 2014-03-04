<?php
	define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
    define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
    define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
    define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );
    date_default_timezone_set('America/New_York'); 

    if(isset($_GET['event_id']) && isset($_GET['user_id']))
	{

   		update_event_like($_GET['event_id'],$_GET['user_id']);
	} 

	function update_event_like($event_id,$user_id){

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
    	
    	$unsafe_variable = $event_id;
		$safe_variable = mysql_real_escape_string($unsafe_variable);
	    
		$unsafe_variable = $user_id;
		$safe_variable2 = mysql_real_escape_string($unsafe_variable);
	    

	    try {
	        $query = "SELECT * FROM like_rel WHERE event_id = '" . $safe_variable. "' AND user_id = '". $safe_variable2. "'" ;
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }

	    if(mysql_num_rows($results) == 0){
        	
	      $query_insert = "INSERT INTO like_rel (user_id, event_id) VALUES ('" . $safe_variable2 . "','" . $safe_variable . "')" or die('insert fail');
	      mysql_query($query_insert) or die('update fail' . mysql_error());
	      
	      $query_get = "SELECT * FROM event WHERE id='" . $safe_variable . "'";
    	  $result_get = mysql_query($query_get) or die('query fail');
    	  	
    	  	if(mysql_num_rows($result_get) == 0){
		       
		    }else{//echo "user already exist";
		      $row = mysql_fetch_array($result_get);
		      $like_num = intval($row['event_likes']);
		      $like_num++;
		      $query_update =  $query_update = "UPDATE event SET event_likes='" . $like_num . "' WHERE id='".$safe_variable."'";
      	  	  mysql_query($query_update) or die('update fail' . mysql_error());
     		  echo "Liked!(".$like_num.")";
		    }
	      
	     
	    }else{
	    	$query_get = "SELECT * FROM event WHERE id='" . $safe_variable . "'";
    	 	$result_get = mysql_query($query_get) or die('query fail');
    	 	if(mysql_num_rows($result_get) == 0){
    	 	  
		       
		    }else{
		      $row = mysql_fetch_array($result_get);
		      $like_num = intval($row['event_likes']);
		   	}
	    	echo "Already liked event!(".$like_num.")";
	      
	      
	    }

	}


?>