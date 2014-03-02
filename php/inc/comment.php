<?php
	define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
    define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
    define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
    define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );
    date_default_timezone_set('America/New_York'); 

	if(isset($_POST['content']))
	{

   		create_comment($_POST['content'],$_POST['event_id'],$_POST['user_id']);
	} 

	/*
	*	create a comment
	*/
	function create_comment($content,$event_id,$user_id){
		

		$posttime = date('Y-m-d H:i:s');
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
    	
	    echo $link;
	    try {
	    	
	        $query_insert = "INSERT INTO comment (content, create_time, user_id, event_id) VALUES ('" . $content . "', '" . $posttime . "','" . $user_id . "','" . $event_id . "')" or die('insert fail');
        	mysql_query($query_insert) or die('Insert to messages failed');
        

	    } catch (Exception $e) {
	        echo "Data could not be insert into the database.";
	        exit;
	    }
	    

	}

	//get comment by user id
	function get_comment_by_user(){
		//require "inc/database.php";
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 

	}

	/*
	*	Returns the comments by event_id
	*/
	function get_comments($event_id){
		//require "inc/database.php";
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM comment WHERE event_id =" . $event_id . " ORDER BY create_time";
		    $results = mysql_query($query) or die($query);

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

	/*
	*	Returns the comments by event_id in json
	*/
	function get_comments_json($event_id){
		//require "inc/database.php";
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	       $query = "SELECT * FROM comment WHERE event_id =" . $event_id . "ORDER BY create_time";
		   $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	$recent[] = array(
	    			'name' => $row['event_name']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;

	}



?>