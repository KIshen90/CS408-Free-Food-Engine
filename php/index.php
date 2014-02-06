
<?php
require_once 'fbLogin.php';
require_once "inc/events.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      
      .main-wrapper{
        margin-top:100px;
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
    <?php if ($user): ?>

      <div class="navbar navbar-default navbar-fixed-top my-nav">
           <ul class="nav navbar-nav navbar-right my-nav-right">
            <li class="dropdown" id="user-li">

               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <span><img style="width:32px; height:32px; margin:0px; padding:2px;" class="img-rounded" src="https://graph.facebook.com/<?php echo $user; ?>/picture"><span><?php echo $user_profile['name']?> </span><b class="caret"></b></span>
               </a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Logout</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Separated link</a></li>
                </ul>

            </li>
           
           </ul>
      </div>
      <div class="container main-wrapper">
        <div class="row">
          <?php 
          $events = get_events_recent();
          //print_r($events);
            foreach($events as $event){
              ?>
              
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <div class="caption">
                      <h3><?php echo $event['event_name']?></h3>
                      <p>...</p>
                      <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                  </div>
                </div>
              
          <?php
            }
           ?>
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
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {

        $(".facebook").click(function(){
            
           window.location.replace("<?php echo $loginUrl; ?>");

        });

      });
    </script>
  </body>
</html>
