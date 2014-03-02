<?php
	define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
    define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
    define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
    define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );
    date_default_timezone_set('America/New_York'); 

    if(isset($_POST['event_id']))
	{

   		update_event_like($_POST['event_id']);
	} 

	function update_event_like($event_id){


	}


?>