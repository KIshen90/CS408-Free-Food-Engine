
<?php
require_once '../fbLogin.php';
require_once "../inc/events.php";
require_once "../inc/comment.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
?>

<?php




   $events = get_event($_GET['event_id']);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $events[0]['event_name']?><?php echo " ".$events[0]['event_location']?><?php echo " ".$events[0]['event_time']?></title>
    <?php
    if(!isset($_GET['event_id']))
    {
    //echo "test";
      die("no event id");
      
    } 

    ?>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/nav.css" rel="stylesheet">
    
    <style type="text/css">
      
      .main-wrapper{
        margin-top:10px;
        margin-left: auto;
        margin-right: auto;
        width:700px;
      }
      .side-bar{
        border-left:1px dotted #CCC;
        height:500px;
        padding:10px;
       
      }
      .event{
        margin-left:15px;
        margin-right:15px;
        border-bottom:1px solid #ddd;
        margin-bottom: 20px;
      }
      .event-list{
         
      }
      .event-icon{
        opacity: 0.5;
      }.event-icon:hover{
        cursor: pointer;
        opacity: 0.8;
      }
      .event-info{
        font-size: small;
        margin-bottom: 10px;
      }
      .event-info-text{
        margin-right:5px;
      }
      .panel{
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
      }
      .comment-box{
        padding:20px;
        width:80%;

      }
      .media-comment{
        border-bottom: #ccc dotted 1px;
        padding-bottom: 10px;
      }
    </style>

    <!-- Custom styles for this template -->
    <?php if ($user): ?>
    <?php else:?>
    <link href="../css/cover.css" rel="stylesheet">
    
    <?endif?>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=791976157483674";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <?php if ($user): ?>

           
          <div class="user-profile">

             <ul class="my-nav-right ">
              <li class="dropdown my-dropdown" id="user-li">

                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <span><img style="width:25px; height:25px; margin:0px; padding:0px; margin-right:4px;" class="img-rounded" src="https://graph.facebook.com/<?php echo $user; ?>/picture"><span><?php echo $user_profile['name']?> </span><b class="caret"></b></span>
                 </a>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="../logout.php">Logout</a></li>
                    <li class="create-event-btn"><a href="create.php">Create a event here</a></li>
                    

                    <li><a href="#">Separated link</a></li>
                  </ul>

              </li>
             
             </ul>

           </div>
          

      <div class="container main-wrapper">
        <div class="panel panel-default">
         <div class="panel-body">

          
          <div class="event-list">
            <div class="row">
          <?php 
         
          //print_r($events);
            foreach($events as $event){
              $comments = get_comments($event['id']);
              $num_comment = count($comments);
              ?>
              
                <!--<div class="col-sm-6 col-md-4">-->
                <div class="row event">
                 <!--<div class="thumbnail">-->
                    <div class="caption">
                    <a class="fb-share-button pull-right" data-href="https://freefood-weiqing.rhcloud.com/event/index.php?event_id=<?php echo $event['id']?>" data-type="button_count"></a>
                      
                      <div id="event-header"><h3><?php echo $event['event_name']?></h3>
                       
                        <?php 
                          for ($i = 1; $i <= intval($event['event_likes']); $i++) {
                              if($i == 10)break;
                              echo "<span id=\"pizza\"></span>";
                          }
                        ?>
                        <a class="event-info-text pull-right like-btn" style="color:#AAA; display:inline-block; cursor:pointer;" href="/event/like.php?event_id=<?php echo $event['id']?>&user_id=<?php echo $user?>">Like?(<?php echo $event['event_likes']?>)</a>
                       
                      </div>

                      <h5><?php echo "@" . futureTime2String($event['event_time'])?></h5>
                     
                      <p style="color:#999;"><?php echo $event['event_detail']?></p>
                      <div class="event-info">
                        <div id="location-map" class="result"><a href="" id="my_href"><img class="img-rounded" width="100%" height="250" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $event['event_location']?>%20purdue%22&markers=<?php echo $event['event_location']?>%20purdue%22&zoom=17&size=700x250&scale=2&maptype=roadmap&sensor=false" id="my_src"></a></div>
                         
                        <span class="glyphicon glyphicon-map-marker event-icon"></span>
                        <span class="event-info-text" style="color:#AAA"><?php echo $event['event_location']?></span>
                        <br>
                        <span class="glyphicon glyphicon-comment event-icon"></span>
                        <span class="event-info-text" style="color:#AAA"><?php echo $num_comment?></span>
                        <!--<span class="glyphicon glyphicon-heart event-icon" style="color:#EB3F3F;"></span>-->
                        <span class="time-str" style="font:small;color:#AAA;"><?php echo "Posted ".time2string($event['create_time'])." ago"?></span>
                        <!-- <span class="pull-right" style="color:#AAA;">Comment</span>-->
                      
                      </div>

                      <div class="row comment-box">
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

         </div>

        
         
         
        
      </div>
      </div>

    </div>
          
    <?php else: ?>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">FreeFood</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Free Food Engine</h1>
            <p class="lead">Free food engine stores information about free food that is available around Purdue campus in one easy to navigate web application.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default facebook"> Connect Facebook</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>&copy; FreeFoodEngine 2014</p>
            </div>
          </div>

        </div>

      </div>

    </div>
    <?php endif?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        var cur_user = "<?php echo $user_profile['name'] ?>";
        var cur_user_avatar = "https://graph.facebook.com/<?php echo $user; ?>/picture";

        var comment_selector;

        function addComment(content, user_id ,event_id){

                  jQuery.ajax({
                       type: "POST",
                       url: "../inc/comment.php",
                       data: { user_id: user_id, event_id: event_id, content:content},
                       cache: false,
                       success: function(response){
                       
                       $('.comment-input').val("");
                            
                           
                      }
                    });
            }

        $(".glyphicon-map-marker").click(function(){

          $(this).parent().find("#location-map").toggle();

        });

        $(".glyphicon-comment").click(function(){

          $(this).parent().parent().find(".comment-box").toggle();

        });
        $(".facebook").click(function(){
            
           window.location.replace("<?php echo $loginUrl; ?>");

        });
        $('.comment-input').keypress(function(event) {
                if(event.which == 13) {
                    event.preventDefault();
                    
                    if($(this).val()!=""){
                      var event_id = $(this).parent().find(".event-id-hidden").val();
                      var comment = $(this).val();
                      addComment($(this).val(),<?php echo $user?>,event_id,this);
                      
                      $(this).parent().parent().parent().before("<div class=\"media media-comment\"><a class=\"pull-left\" href=\"#\"><img class=\"media-object img-rounded\" style=\"width:30px; height:30px; margin:0px; padding:0px; margin-top:2px;\" src=\""+cur_user_avatar+"\" alt=\"...\"></a><div class=\"media-body\"><a>"+cur_user+": </a>"+comment+" <br> <span class=\"time-str\" style=\"font-size:small;color:#AAA;\">a few seconds ago</span></div></div>");
                    }
                }
        });

        $('.create-event-btn').click(function(){


        });

        $(".like-btn").click(function (event) 
        { 
           event.preventDefault(); 
           var selector = $(this);
           var url = $(this).attr('href');
            $.get(url, function(data) {
              selector.text(data);
            });

         });

        $(".fb-share-button").click(function (event) 
        { 
           event.preventDefault(); 
          

         });

    

      });
    </script>
  </body>
  </html>
