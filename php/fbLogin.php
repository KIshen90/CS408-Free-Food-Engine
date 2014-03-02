<?php


require 'fbsdk/facebook.php';
require "inc/user.php";

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '791976157483674',
  'secret' => 'e47c42714668d553da78f5df1f985312',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    $friends = $facebook->api('/me/friends');
    
    if(!isset($link)){
      require_once "inc/database.php";
      $link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
      mysql_select_db('freefood') or die('Select DB freefood fail.'); 
    }
      //check if user logged in
      if($user){ 
        //debug
        //echo $user . "\n";

        $query = "SELECT * FROM userinfo WHERE userid='" . $user . "'";
        $result = mysql_query($query) or die('query fail');

        $user_avatar = "https://graph.facebook.com/".$user."/picture";
        //echo mysql_num_rows($result);
        if(mysql_num_rows($result) == 0){
            $query_insert = "INSERT INTO userinfo (userid, username, avatar_url, email) VALUES ('" . $user. "','" . $user_profile['name'] . "','". $user_avatar . "','". $user_profile['email'] . "')" or die('insert fail');
            mysql_query($query_insert) or die('Insert to userinfo failed');
            //$_SESSION['userid_google'] = mysql_insert_id();
        }else{//echo "user already exist";
          $row = mysql_fetch_array($result);
          $query_update = "UPDATE userinfo SET avatar_url='" . $user_avatar . "', username='" . $user_profile['name'] ."'WHERE userid='" . $user . "'";
          mysql_query($query_update) or die('update fail' . mysql_error());
          //$_SESSION['userid_google'] = $row['userid'];
          //echo "user google";
          //echo $_SESSION['userid_google'];
        }
      }

  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_stream, email,friends_about_me,friends_education_history,friends_hometown,friends_location,friends_work_history,read_stream'));
}



?>