<?php
	define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
    define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
    define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
    define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );
    date_default_timezone_set('America/New_York'); 

	if(isset($_POST['user_id']))
	{

   		create_event($_POST['user_id'],$_POST['event_name'],$_POST['event_time'],$_POST['event_location'],$_POST['event_detail'],$_POST['event_poster_url']);
	} 

	/*
	*	create a comment
	*/
	function create_event($user_id, $event_name, $event_time, $event_location, $event_detail, $event_poster_url){
		

		$posttime = date('Y-m-d H:i:s');
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
    	
	    echo $link;
	    try {
	    	
	        $query_insert = "INSERT INTO event (user_id, event_name, event_time, event_location, event_detail, event_poster_url, create_time) VALUES ('" . $user_id . "', '" . addslashes(htmlentities($event_name)) . "','" . $event_time . "','" . $event_location. "','" . addslashes(htmlentities($event_detail)). "','" . $event_poster_url. "','" . $posttime . "')" or die('insert fail');
        	mysql_query($query_insert) or die('Insert to messages failed');
        

	    } catch (Exception $e) {
	        echo "Data could not be insert into the database.";
	        exit;
	    }
	    

	}
	function update_event($event_id, $user_id, $event_name, $event_time, $event_location, $event_detail, $event_poster_url){
		

		$posttime = date('Y-m-d H:i:s');
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
    	
	    try {
	    	//$query_findevent_id = "SELECT event_id FROM event where user_id = '".$event_id."'"
	    	//$result = mysql_query($query_findevent_id) or die('Fail to query checkuser');
	    	//mysql_result($event_id, 0);
	    	$query_update = "UPDATE event SET event_name='" . addslashes(htmlentities($event_name)) . "', event_time='" . $event_time . "', event_location='" . $event_location . "', event_detail='" . addslashes(htmlentities($event_detail)) . "',event_poster_url='" . $event_poster_url . "',create_time='" . $posttime . "' WHERE event_id='" . $event_id . "'";
        	mysql_query($query_update) or die('Update fail');
	    } catch (Exception $e) {
	        echo "Data could not be insert into the database.";
	        exit;
	    }
	    

	}


	/*
	*	Returns the recent list of events orderd with creation time
	*/
	function get_events_recent_createtime_order(){
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE 1 ORDER BY create_time";
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	array_push($recent, $row);
	    }

	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	$recent[] = array(
	    			'event_id' => $row['id'],
	    			'user_id' => $row['user_id'],
	    			'event_name' => $row['event_name'],
	    			'event_time' => $row['event_time'],
	    			'event_location' => $row['event_location'],
	    			'event_detail' => $row['event_detail'],
	    			'event_poster_url' => $row['event_poster_url'],
	    			'event_likes' => $row['event_likes'],
	    			'event_comments' => $row['event_comments'],
	    			'create_time' => $row['create_time']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;

	}

	/*
	*	Returns the recent list of events after today's date orderd with creation time
	*/
	function get_events_recent_after_today_createtime_order(){
		$curtime = date('Y-m-d H:i:s');

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE event_time > '".$curtime."' ORDER BY create_time";
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	$recent[] = array(
	    			'event_id' => $row['id'],
	    			'user_id' => $row['user_id'],
	    			'event_name' => $row['event_name'],
	    			'event_time' => $row['event_time'],
	    			'event_location' => $row['event_location'],
	    			'event_detail' => $row['event_detail'],
	    			'event_poster_url' => $row['event_poster_url'],
	    			'event_likes' => $row['event_likes'],
	    			'event_comments' => $row['event_comments'],
	    			'create_time' => $row['create_time']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;

	}

	function get_total_num(){
		$curtime = date('Y-m-d H:i:s');
		$items_per_group = 5;
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT COUNT(*) FROM event WHERE event_time > '".$curtime."'";
		    $results = mysql_query($query) or die('query fail');
		    $total_records = mysql_fetch_array($results,MYSQLI_ASSOC);
			$total_groups = ceil(count($total_records)/$items_per_group);

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    return $total_groups;
	}


	/*
	*	get the event by id
	*/
	function get_event($event_id){
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE id = '".$event_id."' ORDER BY event_time";
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


	/*
	*	Returns the recent list of events
	*/
	function get_events_recent(){
		
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


	function get_events_byuser($user_id){
		
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE user_id='" . $user_id . "' ORDER BY event_time";
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

	/*
	*	Returns the recent list of events after today's date
	*/
	function get_events_recent_after_today(){
		$curtime = date('Y-m-d H:i:s');

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE event_time > '".$curtime."' ORDER BY event_time";
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


	/*
	*	Returns the recent list of events in json
	*/
	function get_events_recent_json(){
		
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

	    	$recent[] = array(
	    			'event_id' => $row['id'],
	    			'user_id' => $row['user_id'],
	    			'event_name' => $row['event_name'],
	    			'event_time' => $row['event_time'],
	    			'event_location' => $row['event_location'],
	    			'event_detail' => $row['event_detail'],
	    			'event_poster_url' => $row['event_poster_url'],
	    			'event_likes' => $row['event_likes'],
	    			'event_comments' => $row['event_comments'],
	    			'create_time' => $row['create_time']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;

	}


	/*
	*	Search the recent list of events after today's date
	*/
	function search_events_recent_after_today($event_name,$event_loc){
		$curtime = date('Y-m-d H:i:s');

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE event_name LIKE '%".$event_name."%' AND event_location LIKE '%".$event_loc."%' ORDER BY event_time";
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	$recent[] = array(
	    			'event_id' => $row['id'],
	    			'user_id' => $row['user_id'],
	    			'event_name' => $row['event_name'],
	    			'event_time' => $row['event_time'],
	    			'event_location' => $row['event_location'],
	    			'event_detail' => $row['event_detail'],
	    			'event_poster_url' => $row['event_poster_url'],
	    			'event_likes' => $row['event_likes'],
	    			'event_comments' => $row['event_comments'],
	    			'create_time' => $row['create_time']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;


	}


	/*
	*	Search the recent list of events after today's date with or option
	*/
	function search_events_recent_after_today_union($event_name,$event_loc,$event_detail){
		$curtime = date('Y-m-d H:i:s');

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE event_time > '".$curtime."' AND (event_name LIKE '%".$event_name."%' OR event_location LIKE '%".$event_loc."%' OR event_detail LIKE '%".$event_detail."%') ORDER BY event_time";
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	$recent[] = array(
	    			'event_id' => $row['id'],
	    			'user_id' => $row['user_id'],
	    			'event_name' => $row['event_name'],
	    			'event_time' => $row['event_time'],
	    			'event_location' => $row['event_location'],
	    			'event_detail' => $row['event_detail'],
	    			'event_poster_url' => $row['event_poster_url'],
	    			'event_likes' => $row['event_likes'],
	    			'event_comments' => $row['event_comments'],
	    			'create_time' => $row['create_time']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;


	}

	/*
	*	Search the recent list of events after today's date with or option
	*/
	function search_events_recent_after_today_union_norm($event_name,$event_loc,$event_detail){
		$curtime = date('Y-m-d H:i:s');

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE event_time > '".$curtime."' AND (event_name LIKE '%".$event_name."%' OR event_location LIKE '%".$event_loc."%' OR event_detail LIKE '%".$event_detail."%') ORDER BY event_time";
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

	/*
	*	Search the recent list of events after today's date
	*/
	function search_events_detail_recent_after_today($keyword){
		$curtime = date('Y-m-d H:i:s');

		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
	    
	    try {
	        $query = "SELECT * FROM event WHERE event_detail LIKE '%".$keyword."%' ORDER BY event_time";
		    $results = mysql_query($query) or die('query fail');

	    } catch (Exception $e) {
	        echo "Data could not be retrieved from the database.";
	        exit;
	    }
	    $recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	$recent[] = array(
	    			'event_id' => $row['id'],
	    			'user_id' => $row['user_id'],
	    			'event_name' => $row['event_name'],
	    			'event_time' => $row['event_time'],
	    			'event_location' => $row['event_location'],
	    			'event_detail' => $row['event_detail'],
	    			'event_poster_url' => $row['event_poster_url'],
	    			'event_likes' => $row['event_likes'],
	    			'event_comments' => $row['event_comments'],
	    			'create_time' => $row['create_time']

	    		);
	    }
	    $json = json_encode($recent);
        echo $json;
	    return $json;


	}
	// Return a time string
	function time2string($time) {
		$time = strtotime($time);
	    $time = time() - $time; // to get the time since that moment

	    $tokens = array (
	        31536000 => 'year',
	        2592000 => 'month',
	        604800 => 'week',
	        86400 => 'day',
	        3600 => 'hour',
	        60 => 'minute',
	        1 => 'second'
	    );

	    foreach ($tokens as $unit => $text) {
	        if ($time < $unit) continue;
	        $numberOfUnits = floor($time / $unit);
	        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	    }
	}

	function futureTime2String( $inTimestamp ) {
	  $inTimestamp = strtotime($inTimestamp);
	  $now = time();

	  if( abs( $inTimestamp-$now )<86400 ) {
	    $t = date('g:ia',$inTimestamp);
	    if( date('zY',$now)==date('zY',$inTimestamp) )
	      return 'Today, '.$t;
	    if( $inTimestamp>$now )
	      return 'Tomorrow, '.$t;
	    return 'Yesterday, '.$t;
	  }
	  if( ( $inTimestamp-$now )>0 ) {
	    if( $inTimestamp-$now < 604800 ) # Within the next 7 days
	      return date( 'l, g:ia' , $inTimestamp );
	    if( $inTimestamp-$now < 1209600 ) # Within the next 14, but after the next 7 days
	      return 'Next '.date( 'l, g:ia' , $inTimestamp );
	  } else {
	    if( $now-$inTimestamp < 604800 ) # Within the last 7 days
	      return 'Last '.date( 'l, g:ia' , $inTimestamp );
	  }
	 # Some other day
	  return date( 'l jS F, g:ia' , $inTimestamp );
	}


?>