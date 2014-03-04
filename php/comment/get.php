<?php
require_once "../inc/comment.php";
//echo "test";
if(isset($_GET['event_id']))
	{
		//echo "test";
		get_comments_json($_GET['event_id']);
   		
	} 


?>