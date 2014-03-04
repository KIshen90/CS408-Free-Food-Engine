<?php
define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );
$curtime = date('Y-m-d H:i:s');

$link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('connect to sql fail');
    	mysql_select_db('freefood') or die('Select DB freefood fail.'); 
    	
//sanitize post value
$group_number = filter_var($_GET["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
//echo "test";
//throw HTTP error if group number is not valid
if(!is_numeric($group_number)){
    header('HTTP/1.1 500 Invalid number!');
    exit();
}
$items_per_group = intval(5);
//get current starting point of records
$position = ($group_number * $items_per_group);
//echo "test";
$query = "SELECT * FROM event WHERE event_time > '".$curtime."' ORDER BY event_time ASC LIMIT ".$position.",". $items_per_group;
$results = mysql_query($query) or die('query fail');
//Limit our results within a specified range. 
//echo "test";
$recent = array();

	    while($row = mysql_fetch_array($results,MYSQLI_ASSOC)){

	    	array_push($recent, $row);
	    }

?>

<?php
require_once '../fbLogin.php';
require_once "../inc/events.php";
require_once "../inc/comment.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
?>

    <?php if ($user): ?>

          

   

          
            <div class="row">
          <?php 
          $events = $recent;
          //print_r($events);
            foreach($events as $event){
              $comments = get_comments($event['id']);
              $num_comment = count($comments);
              ?>
              
                <!--<div class="col-sm-6 col-md-4">-->
                <div class="row event">
                 <!--<div class="thumbnail">-->
                    <div class="caption">
                      <div id="event-header"><h3><a class="event-title" href="event/index.php?event_id=<?php echo $event['id']?>"><?php echo $event['event_name']?></a></h3>
                       
                        <?php 
                          for ($i = 1; $i <= intval($event['event_likes']); $i++) {
                              if($i == 10)break;
                              echo "<span id=\"pizza\"></span>";
                          }
                        ?>
                        <a class="event-info-text pull-right like-btn" style="color:#AAA; display:inline-block; cursor:pointer;" href="/event/like.php?event_id=<?php echo $event['id']?>&user_id=<?php echo $user?>">Like?(<?php echo $event['event_likes']?>)</a>
                       
                      </div>

                      <h5><?php echo "@" . futureTime2String($event['event_time'])?></h5>
                     
                      <p style="color:#999;"><?php 
                      $string = $event['event_detail'];
                      $string = strip_tags($string);

                      if (strlen($string) > 500) {

                          // truncate string
                          $stringCut = substr($string, 0, 500);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="event/index.php?event_id='.$event['id'].'">Read More</a>'; 
                      }
                      echo $string;
                      

                      ?></p>
                      <div class="event-info">
                        <div style="display:none;" id="location-map" class="result"><a href="" id="my_href"><img class="img-rounded" width="100%" height="250" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $event['event_location']?>%20purdue%22&markers=<?php echo $event['event_location']?>%20purdue%22&zoom=17&size=700x250&scale=2&maptype=roadmap&sensor=false" id="my_src"></a></div>
                         
                        <span class="glyphicon glyphicon-map-marker event-icon"></span>
                        <span class="event-info-text" style="color:#AAA"><?php echo $event['event_location']?></span>
                        <br>
                        <span class="glyphicon glyphicon-comment event-icon"></span>
                        <span class="event-info-text" style="color:#AAA"><?php echo $num_comment?></span>
                        <!--<span class="glyphicon glyphicon-heart event-icon" style="color:#EB3F3F;"></span>-->
                        <span class="time-str" style="font:small;color:#AAA;"><?php echo "Posted ".time2string($event['create_time'])." ago"?></span>
                        <!--
                        <a class="fb-share-button" data-href="http://freefood-weiqing.rhcloud.com/event/index.php?event_id=<?php echo $event['id']?>" data-type="icon_link"></a>
                        -->
                       <!-- <span class="pull-right" style="color:#AAA;">Comment</span>-->
                      
                      </div>

                      <div class="row comment-box" style="display:none;">
                        <?php  if($num_comment>0):
                        ?>
                        <div class="media ">

                         

                          <?php 
                          //$reversed = array_reverse($comments);
                          foreach($comments as $comment){
                            $comment_user = get_user_info($comment['user_id']);
                            ?>
                          <div class="media media-comment">
                            <a class="pull-left" href="#">
                             <img class="media-object img-rounded" style="width:30px; height:30px; margin:0px; padding:0px; margin-top:2px;" src="<?php echo $comment_user[0]['avatar_url'] ?>" alt="...">
                            </a>
                            <div class="media-body">
                              <a><?php echo $comment_user[0]['username']?>:</a>
                              <?php echo $comment['content']?>
                              <br> <span class="time-str" style="font-size:small;color:#AAA;"><?php echo time2string($comment['create_time'])." ago"?></span>
                            </div>
                          </div>
                          <?php }?>

                         <div class="media comment-input-div">
                            <a class="pull-left" href="#">
                              <img class="media-object img-rounded" style="width:30px; height:30px; margin:0px; padding:0px; margin-top:2px;" src="https://graph.facebook.com/<?php echo $user; ?>/picture" alt="...">
                            </a>
                            <div class="media-body">
                              <form class="comment-form">
                                <input type="text" class="form-control comment-input" placeholder="Write a comment...">
                                <input type="hidden" name="event-id" class="event-id-hidden" value="<?php echo $event['id']?>">
                              </form>
                            </div>
                          </div>

                        </div>
                        <?php else:?>
                          <div class="media comment-input-div">
                            <a class="pull-left" href="#">
                              <img class="media-object img-rounded" style="width:30px; height:30px; margin:0px; padding:0px; margin-top:2px;" src="https://graph.facebook.com/<?php echo $user; ?>/picture" alt="...">
                            </a>
                            <div class="media-body">
                              <form class="comment-form">
                                <input type="text" class="form-control comment-input" placeholder="Write a comment...">
                                <input type="hidden" name="event-id" class="event-id-hidden" value="<?php echo $event['id']?>">
                              </form>

                            </div>
                          </div>
                        <?php endif?>
                        
                      </div>
                      
                    </div>
                 <!--</div>-->
                </div>
              
            <?php
              }
            ?>
          </div>


        
         
    <?php endif?>
