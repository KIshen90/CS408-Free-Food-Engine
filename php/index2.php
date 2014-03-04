
<?php
require_once 'fbLogin.php';
require_once "inc/events.php";
require_once "inc/comment.php";
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
   $total = get_total_num();
          $total = intval($total);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Free Food Engine</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">
    
    <style type="text/css">
      
      .main-wrapper{
        margin-top:10px;
        margin-left: auto;
        margin-right: auto;
        max-width:700px;
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
      .event-title{
                
        color: #333;
        text-decoration: none

      }
    </style>

    <!-- Custom styles for this template -->
    <?php if ($user): ?>
    <?php else:?>
    <link href="css/cover.css" rel="stylesheet">
    
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

                 <a href="user/index.php?user_id=<?php echo $user; ?>" class="dropdown-toggle" data-toggle="dropdown">
                 <span><img style="width:25px; height:25px; margin:0px; padding:0px; margin-right:4px;" class="img-rounded" src="https://graph.facebook.com/<?php echo $user; ?>/picture"><span><?php echo $user_profile['name']?> </span><b class="caret"></b></span>
                 </a>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="logout.php">Logout</a></li>
                    <li class="create-event-btn"><a href="event/create.php">Create a event here</a></li>
                    

                    <li><a href="#">Separated link</a></li>
                  </ul>

              </li>
             
             </ul>

           </div>
          
     
      <header class="hero hero-standalone layout-single-column hero-standalone-underline">
      <h1 class="hero-title">Where is free food?</h1>
      <p class="hero-description">Free food information around Purdue University Campus.</p>
      <a class="fb-share-button" data-href="http://freefood-weiqing.rhcloud.com" data-type="button_count"></a>
                        
      </header>

      <div class="container main-wrapper span6">
        <div class="panel panel-default">
         <div class="panel-body">

           <form class="search-form" role="search">
            <div class="form-group">
              <input type="text" class="myinput my-search" placeholder="Search">
            </div>
           
          </form>

          <div class="event-list">
           

         </div>

         <button type="button" style="padding:5px;" class="form-control btn btn-default btn-lg btn-load">
           Load More...
        </button>

        
         
         
        
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

              <img class="btn btn-lg btn-default facebook" src= "facebook_login.png"> </img>

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
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {

        var track_load = 0; //total loaded record group(s)
        var loading  = false; //to prevents multipal ajax loads
        var total = <?php echo $total?>;
        $('.event-list').load("event/ajax_load.php?group_no="+track_load,  function() {track_load++;});

        var cur_user = "<?php echo $user_profile['name'] ?>";
        var cur_user_avatar = "https://graph.facebook.com/<?php echo $user; ?>/picture";

        var comment_selector;

        function addComment(content, user_id ,event_id){

                  jQuery.ajax({
                       type: "POST",
                       url: "inc/comment.php",
                       data: { user_id: user_id, event_id: event_id, content:content},
                       cache: false,
                       success: function(response){
                       
                       $('.comment-input').val("");
                            
                           
                      }
                    });
            }

        function addEvent(user_id, event_name, event_time, event_location, event_detail, event_poster_url){

                  jQuery.ajax({
                       type: "POST",
                       url: "inc/event.php",
                       data: { user_id: user_id, event_name: event_name, event_time: event_time, event_location: event_location, event_detail: event_detail, event_poster_url: event_poster_url},
                       cache: false,
                       success: function(response){
                       
                       
                      
                      }
                    });
            }


        $(document).on('click','.glyphicon-map-marker', function(){

          $(this).parent().find("#location-map").toggle();

        });

        $(document).on('click','.glyphicon-comment', function(){

          $(this).parent().parent().find(".comment-box").toggle();

        });

        $(".facebook").click(function(){
            
           window.location.replace("<?php echo $loginUrl; ?>");

        });

        $(document).on('keypress', '.comment-input', function(event){
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
      

         $('.my-search').keypress(function(event) {
                if(event.which == 13) {
                    event.preventDefault();
                    
                    if($(this).val()!=""){
                        window.location.replace("https://freefood-weiqing.rhcloud.com/event/search.php?search_event="+$(this).val());
                    }
                }
        });

        $('.create-event-btn').click(function(){


        });


        $(".fb-share-button").click(function (event) 
        { 
           event.preventDefault(); 
          

         });
        $(document).on('click', '.like-btn', function (event){

          event.preventDefault(); 
           var selector = $(this);
           var url = $(this).attr('href');
            $.get(url, function(data) {
              selector.text(data);
            });

        });

        $(".btn-load").click(function (event){

          event.preventDefault(); 
           $.get('event/ajax_load.php?group_no='+track_load, function(data){
                    if(data == "")$(".btn-load").text("No More Events");          
                    $(".event-list").append(data); //append received data into the element
 
                    track_load++; //loaded group increment
                    //loading = false; 
                    if(track_load >= total)$(".btn-load").text("No More Events");
                
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                    
                    alert(thrownError); //alert with HTTP error
                    //$('.animation_image').hide(); //hide loading image
                    //loading = false;
                
                });

        });

    

      });
    </script>
  </body>
  </html>
