<?php

require 'fbsdk/facebook.php';
 
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '791976157483674',
  'secret' => 'e47c42714668d553da78f5df1f985312',
));
 
//on logout page
setcookie('fbs_'.$facebook->getAppId(), '', time()-100, '/', 'http://freefood-weiqing.rhcloud.com');
session_destroy();
header('Location: http://freefood-weiqing.rhcloud.com');

?>