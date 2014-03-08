<?php
require_once "../inc/events.php";
//echo "test";
if(isset($_GET['event_name'])&&isset($_GET['event_loc']))
	{
		//echo "test";
		search_events_recent_after_today($_GET['event_name'],$_GET['event_loc']);
   		
	} 

if(isset($_GET['search_event']))
	{
		//echo "test";
		search_events_recent_after_today_union($_GET['search_event'],$_GET['search_event'],$_GET['search_event']);
   		
	} 

if(isset($_GET['keyword']))
	{
		//echo "test";
		search_events_detail_recent_after_today($_GET['keyword']);
   		
	} 

?>
